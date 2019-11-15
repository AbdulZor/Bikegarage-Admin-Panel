<?php

//TODO Verplaats deleteCSV hier naartoe.
//TODO Verplaats readyCSV hier naartoe.
class ResultatenController extends FietsPlaatsData
{
    function maakCsvReady(){
        $this->readyForDownload($this->fetchStatistieken());
    }

    function verwijderCsv(){
        unlink("../downloads/fietsstalling.csv");
    }
}