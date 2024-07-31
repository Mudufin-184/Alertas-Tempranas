<?php
    // IMPORTAMOS LAS DEPENDECIAS 
    require_once("../Models/ConexionDB.php");
    require_once("../Models/consultasUser.php");
    

    $identificacion = $_POST['documentolUser'];
    $nombre = $_POST['nombreUser'];
    $email = $_POST['emailUser'];
    $telefono = $_POST['telefonoUser'];
    $clave = $_POST['claveUser'];
    $claveB=$_POST['clave_vefificarUser'];
    $rol = $_POST['rolUser'];


    // Verficamos que las claves coincidan
    if ($clave ==$claveB) {
        // Encriptamos las contraseñas
       $claveMD = md5($clave);

        // creamos el objeto a partir de la clase consultas
        // para enviar los valores a un a funcion especifica

        $objConsultas =new ConsultasUser();
        $result = $objConsultas->registrarUserExt($identificacion, $nombre, $email,$telefono, $claveMD, $rol);
    } else{
        echo "<script> alert('Las contraseñas no coinciden')</script>";
        echo "<script> location.href='../Views/extras/registrarse.php'</script>";
    }


?>

