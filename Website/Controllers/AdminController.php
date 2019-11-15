<?php

/**
 * Class AdminController
 * Deze class is de controller die requests vanuit de adminview behandelt
 */
class AdminController extends Database
{
    /**
     * @return array|bool alle admingegevens in een array
     */
    function getAdminGegevens()
    {
        $adminGegevens = $this->query("SELECT email FROM Admin");
        return $adminGegevens;
    }

    /**
     * verwijderd de admin die als parameter gegeven wordt
     * @param $email string is de email van de admin die verwijderd moet worden
     */
    function deleteAdmin($email)
    {
        $this->query("DELETE FROM Admin WHERE email = '$email'");
    }

    /**
     * maakt een nieuwe admin account aan
     * @param $email string is de email van de nieuwe admin
     * @param $wachtwoord string is het wachtwoord van de nieuwe admin
     */
    function addAdmin($email, $wachtwoord)
    {
        $this->query("INSERT INTO Admin (email, wachtwoord) VALUES ('$email', '$wachtwoord')");
    }

    /**
     * @param $email string is de email die waarnaar gecheckt wordt
     * @return array|bool de gegevens van de gebruiker als die bestaat
     */
    function checkAdminExists($email)
    {
        $gegevens = $this->query("SELECT email FROM Admin WHERE email = '$email'");
        return $gegevens;
    }
}
