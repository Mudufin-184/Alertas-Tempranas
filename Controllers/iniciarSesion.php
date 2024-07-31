<?php 
require_once("../Models/conexionDB.php");
require_once('../Models/validarSesion.php');

if (!isset($_POST["emailUser"]) || !isset($_POST["claveUser"])) {
    // Manejar el caso cuando "emailUser" o "claveUser" no están definidos
    echo 'Email o clave no definidos';
    return;
}

$emailUser = $_POST["emailUser"];
$claveUser = md5($_POST["claveUser"]);

$objValidarSesion = new ValidarSesion();

$move = $objValidarSesion->iniciarSesion($emailUser, $claveUser);

