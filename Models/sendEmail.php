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
                <!DOCTYPE html>
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Contraseña provisional</title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <style>
    /* Estilos globales */
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #fafafa;
        border: 3px, #000;
    }
    </style>
</head>
<body>
    <!--[if mso]>
    <table cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;">
    <tr>
    <td>
    <![endif]-->
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="margin: auto;">
        <tr>
            <td class="esd-email-paddings" valign="top" style="padding: 20px;">
                <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="padding: 20px;">
                    <tr>
                        <td class="esd-structure es-p20t es-p20r es-p20l" align="center" style="padding: 20px;">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" valign="top" style="padding-top: 20px; padding-bottom: 20px;">
                                        <a href="#" style="text-decoration: none;"><img src="https://i.ibb.co/CKsRJ1y/logo-sena-verde-complementario-png-2022.png" alt="Logo" style="display: block; width: 155px;"></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20r es-p20l" align="center" style="padding: 20px;">
                            <h1 style="color: #00324d; margin: 0;">Contraseña provisional</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20r es-p20l" align="center" style="padding: 20px;">
                            <img src="https://i.ibb.co/JKc1MxD/coworking-open-lock.png" alt="Icono" style="display: block; width: 50px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20r es-p20l" align="center" style="padding: 20px;">
                            <p style="color: #385c57; margin: 0;">Has solicitado restablecer tu contraseña en Alertas Tempranas. Aquí está tu nueva clave generada:</p>
                            <p style="color: #385c57; margin: 0;">Esta contraseña es provisional, por favor recuerda cambiarla al iniciar sesión.</p>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p30r es-p30l" align="center" style="padding: 20px;">                           
                            <h1 style="color: #39a900; margin: 0;">'.$newPass.'</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20r es-p20l" align="center" style="padding: 20px;">
                            <a href="http://10.175.144.39:8081/synchronize/login" style="background: #39a900; color: #ffffff; text-decoration: none; padding: 15px 30px; border-radius: 5px;">Iniciar Sesión</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20r es-p20l" align="center" style="padding: 20px;">
                            <p >Si no solicitaste este cambio, por favor ignora este mensaje.</p>
                            <p >Gracias,</p>
                            <p >El equipo de Alertas Tempranas</p>
                        </td>   
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--[if mso]>
    </td>
    </tr>
    </table>
    <![endif]-->
</body>
</html>
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

