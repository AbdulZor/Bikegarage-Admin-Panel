<?php


class Stallingen extends Database
{
    function getGegevenPerStalling($stalling)
    {
        return $this->query
        (
            "SELECT id_stalling, COUNT(p.id_sensor) AS 'vrije_plekken', p.id_stalling 
                FROM Parkeerplaats p 
                WHERE p.bezet = 0 AND p.id_stalling = $stalling"
        );
    }
}