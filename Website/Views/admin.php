<?php
include_once "header.php";
require_once "checkSessie.php";
require_once "../Models/database.php";
require_once "../Controllers/AdminController.php";


$database = new Database();
$adminController = new AdminController();

$foutMeldingAdminToevoegen = "";

if (isset($_POST['voegToeButton'])) {
    if ($_POST['newEmail'] != null && $_POST['newWachtwoord'] != null) {
        $data = $adminController->checkAdminExists($_POST['newEmail']);
        if ($data == null) {
            $adminController->addAdmin($_POST['newEmail'], $_POST['newWachtwoord']);
        } else {
            $foutMeldingAdminToevoegen = "Gebruiker bestaat al!";
        }
    }else
        $foutMeldingAdminToevoegen = "Vul alle velden in!";
}
?>
<script src="js/admin.js"></script>
<div class="container">
    <div class="container bg-light py-1 mt-5 pb-3 rounded">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="lead">
                <th>Gebruikers</th>
            <tr>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $gebruikers = $adminController->getAdmingegevens();
            foreach ($gebruikers as $gebruiker):
                ?>
                <tr>
                    <td class="email-column" data-email="<?= $gebruiker->email ?>"><?= $gebruiker->email ?></td>
                    <td>
                        <button class="btn btn-outline-danger verwijderAdmin-button"
                                data-toggle="modal" data-target="#exampleModalCenter">
                            Verwijder
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php

            if (isset($_POST['email'])) {
                $adminController->deleteAdmin($_POST['email']);
            }
            ?>
            </tbody>
        </table>
        <div class="d-inline-flex">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#voegAdminModal">Voeg admin
                toe
            </button>
            <label class="flex-row bg-danger text-white ml-2 mt-2" id="foutMeldingAdminToevoegen">
                <?php
                echo $foutMeldingAdminToevoegen;
                $foutMeldingAdminToevoegen = "";
                ?>
            </label>
        </div>

        <!-- Modal van adminVerwijderen-->
        <div class="modal fade" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Verwijder gebruiker</h5>
                    </div>
                    <div class="modal-body">
                        Weet je zeker dat je de gebruiker wilt verwijderen?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                        <button type="submit" class="btn btn-primary delete-admin" name="verwijderAdmin" data-email="">
                            Verwijder
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal van adminToevoegen-->
        <form method="post" action="">
            <div class="modal fade" id="voegAdminModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title font-weight-bold">Voeg Admin Toe</h4>
                            <button type="button" class="close" data-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <label>Email</label>
                                <input type="email" class="form-control" name="newEmail">
                            </div>

                            <div class="md-form mb-4">
                                <label>Wachtwoord</label>
                                <input type="password" class="form-control" name="newWachtwoord">

                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" value="Voeg toe" name="voegToeButton">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php include "footer.php"; ?>
