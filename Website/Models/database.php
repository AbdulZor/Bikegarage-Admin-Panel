<?php

require_once '../../Config.php';

class Database
{
    private $servername = Config::SERVERNAME;
    private $dBUsername = Config::DBUSERNAME;
    private $dBPassword = Config::DBPASSWORD;
    private $dBName = Config::DBNAME;
    private $pdo = null;
    private $stmt = null;

    /**
     * database constructor.
     * The constructor, will automatically connect to the database when the object is created.
     */
    function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . $this->servername . ";dbname=" . $this->dBName . ";charset=utf8",
                $this->dBUsername, $this->dBPassword, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    /**
     * The destructor, will automatically close the database connection when the object is destroyed.
     */
    function __destruct()
    {
        if ($this->stmt !== null) {
            $this->stmt = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }

    /**
     * Runs a select query on the database and returns the results.
     * @param $sql string - de query die uitegevoerd moet worden
     * @param $cond $cond - de parameters die meegegeven worden indien nodig voor een sql query
     * @return array|bool
     */
    function query($sql, $cond=null)
    {
        $resultaten = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);  // prepared de sql querry
            $this->stmt->execute($cond); // execute de query
            $resultaten = $this->stmt->fetchAll(); // haal alle gegevens als objecten op
        } catch (Exception $ex) {
            die($ex->getMessage()); // geeft fout terug indien fout opgetreden is
        }
        $this->stmt = null;
        return $resultaten; // geef de resultaten terug
    }
}