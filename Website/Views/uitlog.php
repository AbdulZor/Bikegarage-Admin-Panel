<?php
require_once '../Models/database.php';
require_once '../Controllers/SessieController.php';

session_start();

$instance = new SessieController();
$instance->uitloggen();
