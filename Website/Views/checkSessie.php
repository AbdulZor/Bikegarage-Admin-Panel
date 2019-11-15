<?php
require_once '../Models/database.php';
require_once '../Controllers/SessieController.php';

$instance = new SessieController();
$instance->checkSessie();
