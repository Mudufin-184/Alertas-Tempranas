<?php
require_once("../../Models/conexionDB.php");
require_once("../../Controllers/instructor/seguridadAccesoInstructor.php");
require_once("../../Controllers/instructor/mostrar_info.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">AlertasTempranas</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <!-- <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a> End Notification Icon -->

          <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul>End Notification Dropdown Items -->

         <!-- </li>End Notification Nav -->

        <!-- <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

         <!--   <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

         <!-- </li>End Messages Nav -->

        <?php
        cargarPerfilInstructor();
        ?>

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ruta-nav" data-bs-toggle="collapse" href="index.php">
          <i class="fa-solid fa-route"></i><span>Ruta Atención</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ruta-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="consultarAprendiz.php">
            <i class="fa-solid fa-circle"></i><span>Consultar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Ruta de atencion Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

    <?php

require_once("../../Models/conexionDB.php");
require_once("../../Models/consultasInstructor.php");

$objConsultas = new ConsultasInstructor();

$encargados = $objConsultas->CargarEncargado();

    ?>

      <form action="../../Controllers/instructor/registrar_caso.php" class="form" method="post" enctype="multipart/form-data" >
        <!-- progress bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div class="progress-step progress-step-active">
                <i class="fa-solid fa-folder-open"></i>
            </div>
            <div class="progress-step" >
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
            <div class="progress-step">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
    
        <!-- Formulario 1 -->
        <div class="card form-step form-step-active">
            <div class="card-body">
              
                <!-- Multi Columns Form -->
                <div class="row g-3 formulario">
                  <h5>Paso 1: Información Aprendiz</h5>
                    <!-- Numero de Identificación -->
                    <div class="col-md-6 campo">
                      <label for="identificacion">Numero de Identificación:</label> <br>
                      <input type="text" placeholder="Ej: 123456" id="identificacion" class="input" name="identificacion">
                    </div>
                    <!-- Nombre del aprendiz -->
                    <div class="col-md-6 campo">
                      <label for="aprendiz_Nom">Nombre Del Aprendiz:</label> <br>
                      <input type="text" placeholder="Ej: Daniel Andres" id="aprendiz_Nom" class="input" name="nombre">
                    </div>
                    <!-- Apellidos del aprendiz -->
                    <div class="col-md-6 campo">
                      <label for="aprendiz_Ape">Apellidos Del Aprendiz:</label> <br>
                      <input type="text" placeholder="Ej: Rodriguez Lopez" id="aprendiz_Ape" class="input" name="apellido">
                    </div>

                   <!-- Email del aprendiz -->
                    <div class="col-md-6 campo">
                      <label for="aprendiz_Email">Email Del Aprendiz:</label> <br>
                      <input type="email" placeholder="Ej:daniel@gmail.com"  id="aprendiz_Email" class="input" name="email">
                    </div>


                    <!-- Telefono del aprendiz -->
                    <div class="col-md-6 campo">
                      <label for="aprendiz_Telefono">Telefono Del Aprendiz:</label> <br>
                      <input type="number" placeholder="Ej:3214565342"  id="aprendiz_Telefono" class="input" name="telefono">
                    </div>

                    <!-- ficha del aprendiz -->
                    <div class="col-md-6 campo">
                      <label for="aprendiz_Ficha">Ficha:</label> <br>
                      <input type="text" placeholder="Ej:2692926"  id="aprendiz_Ficha" class="input" name="ficha">
                    </div> 

                    <!-- Programa del aprendiz -->
                    <div class="col-md-12 campo">
                      <label for="aprendiz_Programa">Programa:</label> <br>
                      <input type="text" placeholder="Ej:Análisis y desarrollo de software"  id="aprendiz_Programa" class="input" name="programa">
                    </div>
                    
                   <div class="text-center">
                      <button type="button" class="form-button btn-next">Siguiente</button>
                    </div>
                </div>
              </div>
          </div>
    
        <!-- Formulario 2 -->
        <div class="card form-step">
            <div class="card-body">
                <!-- Multi Columns Form -->
                <div class="row g-3 formulario">
                  <h5>Paso 2: Información Del Motivo </h5>
                   <!-- Categoria -->
                   <div class="col-md-6 campo">
                      <label for="motivo_categoria">Categoria:</label> <br>
                      <select id="motivo_categoria" name="categoria" class="select" required>
                        <option >Seleccione un Motivo...</option>
                        <option value="economicos">Economicos</option>
                        <option value="laborales">Laborales</option>
                        <option value="familiares">Familiares</option>
                        <option value="salud">Salud</option>
                        <option value="sociales">Sociales</option>
                        <option value="academiacos">Academicos</option>
                        <option value="calidad">Calidad del Programa</option>
                        <option value="condiciones">Condiciones Institucionales </option>
                      </select>
                    </div>
                    <!-- soporte -->
                    <div class="col-md-6 campo">
                      <label for="soporte">Soporte:</label> <br>
                      <input type="file" id="soporte" class="input" name="soporte" >
                    </div> 
                    <!-- Nombre del encargado -->
                    <div class="col-md-6 campo">
                      <label for="id_encargado">Encargado:</label> <br>
                      <select name="id_encargado" id="encargado" class="select" required>
                        <option value="">Seleccione un encargado</option>
                        <?php
                        foreach ($encargados as $encargado) {
                            echo '<option value="' . $encargado['id'] . '">' . $encargado['nombre'] . ' - ('.$encargado['rol'].')</option>';
                        }
                      
                        ?>
                      </select>
                    </div>
                    
                    <!-- Descricpion del motivo -->
                    <div class="col-md-6 campo">
                      <label for="motivo_Descripcion">Motivo:</label> <br>
                      <textarea rows="3"   placeholder="Ej:2692926"  id="motivo_Descripcion" class="input" name="motivo"> </textarea>
                    </div>

                  
                  
                  <!-- Botones -->
                    <div class="text-center">
                        <button type="button" class="form-button-sec btn-prev">Anterior</button>
                        <button type="submit" class="form-button btn-next">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Paso Final -->
        <div class="card form-step">
            <div class="card-body">
              <div class="final">
              <img src="assets/img/finalizar.svg" alt="finalizar" class="Wcompletado">
                <div>
              <h5 class="card-title">Completado!!</h5>
                <div>Ha completado todos los pasos correctamente.</div>
              </div>
              
            </div>
        </div>
    </form>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>