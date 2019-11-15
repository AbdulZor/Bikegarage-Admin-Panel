<?php

include_once "database.php";
include_once '../../Config.php';

class FietsPlaatsData extends Database
{
    function fetchStatistieken(){
        return $this->query("select * from parkeerplaatsevent;", null);
    }

    /**
     *
     * @param $queryOutput
     */
    function readyForDownload($queryOutput){
        //TODO: check of de mode een extra 'b' nodig heeft.
        //maak een file handle aan (open een file). mode 'w' maakt het bestand aan als het er niet is.
        $handle = fopen("../downloads/fietsstalling.csv", 'w');
        //decode(encode()) is mijn gekozen manier om stClass dat je krijgt uit querys om te zetten naar arrays.
        $arrayOfRows = json_decode(json_encode($queryOutput), true);
        //Doe de colomnamen er bij. Er moet tenminste een 'row' zijn daarvoor.
        if(count($arrayOfRows) >= 1){
            fputcsv($handle, array_keys($arrayOfRows[0]));
        }
        foreach ($arrayOfRows as $row) {
            fputcsv($handle, $row);
        }
        //de file handle afsluiten. Helpt RAM vrij te maken. Niet noodzakelijk.
        fclose($handle);
    }

    /**
     * Geeft terug hoeveel sensors aangaven dat er een plek bezet raakte per dag.
     */
    function fetchBezetPerDag(){
        return array_reverse($this->query('select count(*) data, date_format(toevoeg_moment, "%d %M %Y") label, date(toevoeg_moment) fix from parkeerplaatsevent where bezet = 1 group by fix, label order by fix desc limit 14;', null));
    }
    function fetchNietBezetPerDag(){
        return array_reverse($this->query('select count(*) data, date_format(toevoeg_moment, "%d %M %Y") label, date(toevoeg_moment) fix from parkeerplaatsevent where bezet = 0 group by fix, label order by fix desc limit 14;', null));
    }
}


function gegevenPerStalling($stalling)
{
    $stallingData = $this->query("SELECT id_stalling, COUNT(p.id_sensor) AS 'vrije_plekken' 
                                            FROM Parkeerplaats p WHERE p.bezet = 0 AND p.id_stalling = $stalling");
    if ($stallingData[0]->vrije_plekken === 0) {
        echo "<p class='bg-light'>stalling: $stalling VOL</p>";
    } else {
        echo "<p class='bg-light'>stalling : $stalling  <br>vrije plekken: " . $stallingData[0]->vrije_plekken . "</p>";
    }
}