<?php

require_once('../../Models/ConexionDB.php');
require_once('../../Models/consultasBienestar.php');
require_once('../../Models/validarSesion.php');

// Campos del aprendiz
$tipo_documento_Aprendiz = $_POST["tipo_documento_aprendiz"]; // Nuevo campo
$identificacion = $_POST["identificacion"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$programa = $_POST["programa"];
$ficha = $_POST["ficha"];

// Campos del caso
$categoria = $_POST["categoria"];
$id_encargado = $_POST["id_encargado"];
$motivo = $_POST["motivo"];

$fecha = date('Y-m-d');

$estado = "En espera";

// ARCHIVO SOPORTE
$rutaArchivo = "../../Uploads/Casos/".$_FILES['soporte']['name'];
$resultado = move_uploaded_file($_FILES['soporte']['tmp_name'], $rutaArchivo);

session_start();
$id_usuario = $_SESSION['id'];

$objConsultas = new ConsultasBienestar();
$result = $objConsultas->registrarRuta($tipo_documento_Aprendiz, $identificacion, $nombre, $apellido, $telefono, $email, $programa, $ficha, $id_usuario, $categoria, $fecha, $id_encargado, $motivo, $estado, $rutaArchivo);

?>
