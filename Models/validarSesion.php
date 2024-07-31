<?php

class ValidarSesion{

    public function iniciarSesion($emailUser, $claveUser){

        // creamos objeto de la conexión

        $objConexion =new Conexion();

        $conexion = $objConexion ->getConexion();

        $consulta = "SELECT * FROM usuarios WHERE email=:emailUser";

        $result=$conexion-> prepare($consulta);

        $result->bindParam(':emailUser', $emailUser);

        $result -> execute();

// validacion de email 
        if ($f= $result->fetch()) {
            // Validacion de clave
            if($f['clave']==$claveUser){
                // Iniciamos sesion 
                session_start();
                // Creamos variables de sesion globales 
                $_SESSION['id'] = $f['id'];
                $_SESSION['email'] = $f['email'];
                $_SESSION['rol'] = $f['rol'];
                $_SESSION['aut'] = "SI";

                // Validamos el rol para el redireccionamiento
                switch ($f['rol']) {
                    case 'instructor':
                        echo"<script> alert('Bienvenido Instructor') </script>";
                        echo"<script> location.href='../Views/instructor/index.php' </script>";
                        break;

                    case 'coordinadorAcademico':
                        echo"<script> alert('Bienvenido Coordinador Academico') </script>";
                        echo"<script> location.href='../Views/coordinador/index.php' </script>";
                        break;
                    
                    case 'coordinadorFormacion':
                        echo"<script> alert('Bienvenido Coordinador de Formación') </script>";
                        echo"<script> location.href='../Views/coordinador/index.php' </script>";
                        break;
                    
                    case 'bienestar':
                        echo"<script> alert('Bienvenido bienestar') </script>";
                        echo"<script> location.href='../Views/Bienestar/index.php' </script>";
                        break;

                    default:
                    echo"<script> alert('Su cuenta no tiene un rol asignado') </script>";
                    echo"<script> location.href='../Views/extras/iniciarSesion.php' </script>";
                        break;
                }



            }else{
                echo"<script> alert('La clave es incorrecta :)') </script>";
            echo"<script> location.href='../Views/extras/iniciarSesion.php' </script>";
            }
        } else{
            echo"<script> alert('El email no existe en la base de datos, Registrese :)') </script>";
            echo"<script> location.href='../Views/extras/registroUsuario.php' </script>";
        }
    }
}