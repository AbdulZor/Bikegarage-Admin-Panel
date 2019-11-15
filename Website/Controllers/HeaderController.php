<?php
class HeaderController extends Database
{
    /**
     * kijkt naar de huidige datum dag - tijd en kijkt naar een verschil(INTERVAL) van 3 dagen
     * @return array|bool de fietsen die langer dan 3 dagen achter elkaar geparkeerd zijn
     */
    function haalLangstaandeFietsen(){
        $resultaat = $this->query("SELECT * 
                          FROM Parkeerplaats p
                          INNER JOIN Blok b ON b.id_blok = p.id_blok 
                          WHERE p.bezet_datum <= (NOW() - INTERVAL 1 MONTH)");
        return $resultaat;
    }
}