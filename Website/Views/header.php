<?php
session_start();
require_once "../Models/database.php";
require_once "../Controllers/HeaderController.php";
$database = new Database();
$headerController = new HeaderController();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Meta info -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login URBAN13.">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/theme.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/js/mdb.min.js"></script>
    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon%20(1).ico">

    <!-- Title -->
    <title>Login | URBAN13</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light container-fluid justify-content-left">
    <a class="navbar-brand" href="home.php">
        <img src="../img/apple-touch-icon-180x180.png" alt="Logo">
    </a>
    <ul class="navbar-nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="resultaten.php">Statistieken</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin.php">Admins</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="uitlog.php">Log out</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="dropdown">
            <?php
            $fietsenDieWegMoeten = $headerController->haalLangstaandeFietsen();
            $i = 0;
            foreach ($fietsenDieWegMoeten as $item) {
                $i++;
            }
            ?>
            <a href="" class="dropdown-toggle" data-toggle="dropdown"><img
                        src="../img/alarm.png" name=" notificaties" alt="Notificaties"
                >
                <div class="aantalMeldingen"><?= $i ?></div>
            </a>
            <ul class="dropdown-menu dropdown-menu-right p-3">
                <div class="notify-drop-title border-bottom border-dark">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 h4">Langstaande Fietsen</div>
                    </div>
                </div>
                <div class="drop-content">
                    <?php
                    $kleurZone = "";
                    foreach ($fietsenDieWegMoeten as $item) {
                        $i++;
                        if ($item->kleur == 'ROOD') {
                            $kleurZone = "text-danger";
                        } else if ($item->kleur == 'GEEL') {
                            $kleurZone = "text-warning";
                        } else if ($item->kleur == 'BLAUW') {
                            $kleurZone = "text-primary";
                        } else if ($item->kleur == 'GROEN') {
                            $kleurZone = "text-success  ";
                        } else if ($item->kleur == 'GRIJS') {
                            $kleurZone = "text-secondary";
                        }
                        ?>
                        <li>
                            <div class="col-md-12 col-sm-12 col-xs-12 border-bottom bg-dark text-light">
                                <?php echo "<div>Sensor: &nbsp;&nbsp;&nbsp;" . $item->id_sensor . "</div>"; ?>
                                <?php echo "<div>Stalling:&nbsp;&nbsp;&nbsp;" . $item->id_stalling . "</div>"; ?>
                                <?php echo "<div class='$kleurZone'>Zone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class=''>" . $item->id_blok . "</span></div>"; ?>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                    </li>
                </div>
            </ul>
        </li>
</nav>