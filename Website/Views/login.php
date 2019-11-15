<?php
require_once "../Models/database.php";
require_once "../Controllers/SessieController.php";

session_start();

if (isset($_SESSION['mail'])):
    header("Location: ../Views/home.php");
    die();
endif;

$db = new Database();
$login = new SessieController();

if (isset($_POST['loginSubmit'])) {
    $login->inlogAuthenticeren();
}

$foutMeldingClass = isset($_SESSION["error_login"]) ? $_SESSION["error_login"] : '';
?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon%20(1).ico">

        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/theme.css">

    <div class="container-fluid">
    <div id="login-container" class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

        <div id="form-container" class="container">
            <div class="container">
                <div class="text-center">
                    <img src="../img/icons8-bicycle-filled-75.png">
                </div>
                <form method="post" action="">
                    <div>
                        <?php echo $foutMeldingClass;
                        unset($foutMeldingClass); ?>
                    </div>
                    <input type="text" name="email" placeholder="E-mailadres">
                    <input type="password" name="password" placeholder="Wachtwoord">
                    <input type="submit" value="Login" name="loginSubmit">
                </form>
            </div>
        </div>
    </div>
    </div>

<?php include "footer.php"; ?>