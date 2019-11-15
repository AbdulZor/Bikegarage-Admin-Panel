<?php


class SessieController extends Database
{
    function inlogAuthenticeren()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $emailCheck = $this->query("SELECT email FROM Admin WHERE email = ? ", [$email]);
        //checkt of de ingevoerde waarde ook een mail is
        if ($emailCheck != null) {
            # PRDO QUERY
            $gebruikers = $this->query("SELECT email FROM Admin WHERE email = ? AND wachtwoord = ?"
                , [$email, $password]
            );

            if ($gebruikers != null) {
                $_SESSION["mail"] = $email;
                header("Location: ../Views/home.php");
            } else {
                $_SESSION["error_login"] = "Onjuiste wachtwoord";
                header("Location: ../Views/login.php");
            }

        } else {
            $_SESSION["error_login"] = "Onjuiste mail";
            header("Location: ../Views/login.php");
        }
    }
    function uitloggen()
    {
        unset($_SESSION['mail']);
        unset($_SESSION['error_login']);
        header("Location: ../Views/login.php");
        die();
    }
    function checkSessie()
    {
        if (!isset($_SESSION['mail']) || empty($_SESSION['mail'])) {
            header("Location: ../Views/login.php");
            die();
        }
    }
}