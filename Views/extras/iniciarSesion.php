<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <section id="login">
    <div class="cont-general">
     
      <div class="container cont-inicio-sesion">
        <div class="cont-info-sena">
            <img src="img/logoSena.png" alt="logo sena">
            <h2>Centro de Diseño y Metrología</h2>               
        </div>
        <div class="heading"><h1>Iniciar Sesión</h1></div>
        <form class="form" action="../../Controllers/iniciarSesion.php" method="post">
          <input placeholder="Correo" id="emailUser" name="emailUser" type="email" class="input" required="" />
          <input placeholder="Contraseña" id="claveUser" name="claveUser" type="password" class="input"
            required="" />
          <br><br>
          <span class="forgot-contraseña"><a href="recuperarClave.php">¿Olvidó su Contraseña?</a></span>
          <span class="forgot-contraseña vinculos1"><a href="registrarse.php">Registrarse</a></span>
          <button type="submit" class="login-button">INGRESAR</button>
        </form>
      </div>
    </div>

  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>

</html>