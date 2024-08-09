<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/registrarse.css">
</head>

<body>
<section id="login">
  <div class="cont-general">
    <div class="container cont-inicio-sesion">
      <div class="cont-info-sena">
        <img src="img/logoSena.png" alt="logo sena">
        <h2>Centro de Diseño y Metrología</h2>               
      </div>
      <div class="heading"><h1>Registrarse</h1></div>
      <form class="form" action="../../Controllers/registrarUsuario.php" method="post">
        <div class="row">
          <div class="col-sm-12">
            <input placeholder="Documento" id="documentolUser" name="documentolUser" type="number" class="input" required="" />
          </div>
          <div class="col-sm-12">
            <input placeholder="Nombre" id="nombreUser" name="nombreUser" type="text" class="input" required="" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <input placeholder="Correo" id="emailUser" name="emailUser" type="email" class="input" required="" />
          </div>
          <div class="col-sm-6">
            <input placeholder="Telefono" id="telefonoUser" name="telefonoUser" type="number" class="input" required="" />
          </div>
          <div class="col-sm-6">
            <select placeholder="Seleccione..." name="rolUser" id="rolUser" class="input">
              <option value="instructor">Instructor</option>
              <option value="bienestar">Bienestar</option>
              <option value="coordinadorAcademico">Coordinador Academico</option>
              <option value="coordinadorFormacion">Coordinador Formacion</option>
            </select>
          </div>
        </div>
        <div class="row">        
          <div class="col-sm-6">
            <input placeholder="Contraseña" id="claveUser" name="claveUser" type="password" class="input" required="" />
          </div>      
          <div class="col-sm-6">
            <input placeholder="Verificar Contraseña" id="clave_vefificarUser" name="clave_vefificarUser" type="password" class="input" required="" />
          </div>
          <div class="col-sm-12 vinculos">
            <span class="vinculos1"><a href="recuperarClave.php">¿Olvidó su Contraseña?</a></span>
            <span class="vinculos2"><a href="iniciarSesion.php">Iniciar Sesión</a></span>
          </div>
          <div class="col-sm-12">
            <button type="submit" class="login-button">REGISTRAR</button>
          </div>
        </div>
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