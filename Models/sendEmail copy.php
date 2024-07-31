<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

class GenerarClave
{
    public function enviarClave($emailUser, $documento)
    {
        $f = null;

        $objConexionBd = new Conexion();

        $conexion = $objConexionBd->getConexion();

        // Cambia 'documento' a 'id' o el nombre correcto de la columna
        $consultarUser = "SELECT * FROM usuarios WHERE documento = :documento AND email = :email";

        $result = $conexion->prepare($consultarUser);

        $result->bindParam(":documento", $documento);
        $result->bindParam(":email", $emailUser);

        $result->execute(); // Agregar esta línea para ejecutar la consulta
        $f = $result->fetch(); // Fetch después de execute

        if ($f) {
            // Generate a random password
            $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $longitud = 8;
            $newPass = substr(str_shuffle($caracteres), 0, $longitud);
            $passMd5 = md5($newPass);
        
            // Update user's password in the database
            $actualizarClave = "UPDATE usuarios SET clave = :passMd5 WHERE documento = :documento";
            $result = $conexion->prepare($actualizarClave);
        
            $result->bindParam(":passMd5", $passMd5);
            $result->bindParam(":documento", $documento);

            $result->execute();

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';                       //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = 'loviingstore753@gmail.com';            //SMTP username
                $mail->Password = 'xkzv fgqu nkqx uhso';                  //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                // Emisor
                $mail->setFrom('loviingstore753@gmail.com', 'Soporte Alertas Tempranas');

                // Receptor
                $emailFor = $f["email"];
                $mail->addAddress($emailFor);          //Add a recipient

                //Content
                $mail->isHTML(true);                                     //Set email format to HTML
                $mail->CharSet = 'UTF-8';

                $mail->Subject = 'Nueva clave generada';

                $mail->Body = '
                <div style="font-family: Arial, sans-serif; color: #39A900; max-width: 600px; margin: 0 auto;">
                    <h2>Recuperación de contraseña en Alertas Tempranas</h2>
                    <p>Hola,</p>
                    <p>Has solicitado restablecer tu contraseña en Alertas Tempranas. Aquí está tu nueva clave generada:</p>
                    <p><strong>Tu nueva clave generada: <span style="color: #39A900;">'.$newPass.'</span></strong></p>
                    <p>Si no solicitaste este cambio, por favor ignora este mensaje.</p>
                    <p>Gracias,</p>
                    <p>El equipo de Alertas Tempranas</p>
                </div>
                ';

                $mail->send();
                echo '
                <script>
                    alert("correo enviado")
                    location.href="../Views/extras/iniciarSesion.php"
                </script>
                ';
            } catch (Exception $e) {
                echo "Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            // USUARIO NO ENCONTRADO >:C
            echo '
            <script>
                alert("El usuario no se encuentra en el sistema")
                location.href="../Views/Extras/iniciarSesion.php"
            </script>
            ';
        }
    }
}

