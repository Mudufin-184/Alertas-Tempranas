<?php
// IMPORTAMOS LAS DEPENDENCIAS
require_once("../Models/ConexionDB.php");
require_once("../Models/consultasUser.php");

$tipoDocumento = $_POST['tipoDocumentoUser'];
$identificacion = $_POST['documentoUser'];
$nombre = $_POST['nombreUser'];
$email = $_POST['emailUser'];
$telefono = $_POST['telefonoUser'];
$clave = $_POST['claveUser'];
$claveB = $_POST['clave_verificarUser'];
$rol = $_POST['rolUser'];

// Verificamos que las claves coincidan
if ($clave == $claveB) {
    // Encriptamos las contraseñas
    $claveMD = md5($clave);

    // Creamos el objeto a partir de la clase consultas para enviar los valores a una función específica
    $objConsultas = new ConsultasUser();
    $result = $objConsultas->registrarUserExt($tipoDocumento, $identificacion, $nombre, $email, $telefono, $claveMD, $rol);

    if ($result) {
        echo "<script> alert('Usuario registrado con éxito')</script>";
        echo "<script> location.href='../Views/extras/iniciarSesion.php'</script>";
    } else {
        echo "<script> alert('Error al registrar el usuario')</script>";
        echo "<script> location.href='../Views/extras/registrarse.php'</script>";
    }
} else {
    echo "<script> alert('Las contraseñas no coinciden')</script>";
    echo "<script> location.href='../Views/extras/registrarse.php'</script>";
}
?>
