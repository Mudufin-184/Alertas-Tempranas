<?php
class ConsultasUser {

    public function registrarUserExt($tipoDocumento, $identificacion, $nombre, $email, $telefono, $claveMD, $rol) {
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        // Verificar si el usuario ya está registrado
        $consultar = "SELECT * FROM usuarios WHERE documento = :identificacion AND email = :email";
        $result = $conexion->prepare($consultar);
        $result->bindParam(':identificacion', $identificacion);
        $result->bindParam(':email', $email);

        $result->execute();

        $f = $result->fetch();
        if ($f) {
            echo "<script> alert('Este usuario ya está registrado, Por favor inicie sesión')</script>";
            echo "<script> location.href='../Views/Extras/iniciarSesion.html'</script>";
        } else {
            // Insertar el nuevo usuario
            $registrar = "INSERT INTO usuarios(tipo_documento, documento, nombre, email, telefono, clave, rol) 
                          VALUES (:tipoDocumento, :identificacion, :nombre, :email, :telefono, :claveMD, :rol)";

            $result = $conexion->prepare($registrar);

            $result->bindParam(':tipoDocumento', $tipoDocumento);
            $result->bindParam(':identificacion', $identificacion);
            $result->bindParam(':nombre', $nombre);
            $result->bindParam(':email', $email);
            $result->bindParam(':telefono', $telefono);
            $result->bindParam(':claveMD', $claveMD);
            $result->bindParam(':rol', $rol);

            // Ejecutar la consulta
            $result->execute();
            echo "<script> alert('Su cuenta ha sido creada exitosamente')</script>";
            echo "<script> location.href='../Views/extras/iniciarSesion.php'</script>";
        }
    }
}
?>
