<?php

require_once('../../Models/ConexionDB.php');
require_once('../../Models/consultasBienestar.php');

session_start();

// Campos del aprendiz
$id_encargado = $_POST["id_encargado"];
$estrategia = $_POST["estrategia"];
$id_caso = $_POST['id_caso'];
$aspectos_extras = $_POST['aspectos_extras'];
$estado = $_POST['estado'];
$fecha = date('Y-m-d');


$objConsultas = new ConsultasBienestar();
$result = $objConsultas->editarCaso($estrategia, $aspectos_extras, $estado, $id_encargado, $id_caso, $fecha);


