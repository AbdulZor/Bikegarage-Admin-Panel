<?php
require_once "header.php";
require_once "checkSessie.php";
?>

    <div class="container mt-5">
        <div class="row">
            <div class="container-fluid col-md-12 text-light">
                Dit is een beheerpagina waar de admins de parkeergarage kunnen beheren en alle soorten gegevens
                kunnen bekijken. Dit zijn o.a rapportages over de fietsenstallingen, lege plaatsen en defecte
                sensoren.
                <br><br>
                Deze website is alleen beschikbaar voor beheerders van de parkeergarage en kunnen uitsluitend
                inloggen met inloggevens die zij toegerijkt hebben door de UvA.
            </div>
        <div class="row justify-content-center rounded mt-3 w-50 mx-auto">
            <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                <div class="carousel-innerw">
                    <div class="carousel-item active">
                        <img class="d-block rounded" src="../img/ingangStalling.png" alt="First slide" style="width: 800px; height: 500px;">
                        <div class="carousel-caption d-none d-md-block text-white">
                            <h5>Ingang van de stalling</h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block rounded" src="../img/plattegrondBlokken.png" alt="Second slide" style="width: 800px; height: 500px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block rounded" src="../img/stalling.png" alt="Third slide" style="width: 800px; height: 500px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php require_once "footer.php" ?>