<?php
require_once ('../Models/conexionDB.php');
require_once('../Models/sendEmail.php');

$emailUser = $_POST["emailUser"];
$documento = $_POST["documento"];

$objGenerar = new GenerarClave();
$move = $objGenerar->enviarClave($emailUser, $documento);