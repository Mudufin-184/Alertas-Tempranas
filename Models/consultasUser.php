<?php
    class ConsultasUser{

        public function registrarUserExt($identificacion, $nombre, $email, $telefono, $claveMD, $rol){


            $objConexion = new Conexion();
            $conexion = $objConexion->getConexion();

            $consultar = "SELECT * FROM usuarios WHERE documento = :identificacion AND email=:email";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':identificacion', $identificacion);
            $result->bindParam(':email', $email);
            
            $result->execute();

            $f = $result->fetch();
            if ($f) {
                echo "<script> alert('Este usuario ya esta registrado, Por favor inicie sesion')</script>";
                echo "<script> location.href='../Views/Extras/iniciarSesion.html'</script>";
            }else {

                $registrar = "INSERT INTO usuarios(documento,nombre,email,telefono,clave,rol) VALUES (:identificacion, :nombre, :email, :telefono, :claveMD, :rol)";


                $result = $conexion->prepare($registrar);


                $result->bindParam(':identificacion', $identificacion);
                $result->bindParam(':nombre', $nombre);
                $result->bindParam(':email', $email);
                $result->bindParam(':telefono', $telefono);
                $result->bindParam(':claveMD', $claveMD);
                $result->bindParam(':rol', $rol);

                // ejecutamos la funcion
                $result->execute();
                echo "<script> alert('Su cuenta ha sido creada exitosamente')</script>";
                echo "<script> location.href='../Views/extras/iniciarSesion.php'</script>";
            }
            
        }
    }
