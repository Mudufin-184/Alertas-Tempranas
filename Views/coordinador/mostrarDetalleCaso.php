<?php
// Enlazamos las dependencia

require_once("../../Models/conexionDB.php");
// require_once("../../Controllers/coordinador/seguridadAccesoCoordinador.php");
require_once("../../Controllers/coordinador/mostrar_info.php");
require_once("../../Models/consultasCoordinador.php");
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
  <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.3/b-3.0.1/b-html5-3.0.1/b-print-3.0.1/datatables.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
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

        <?php
        cargarPerfilCordinador();
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
            <a href="registrarAprendiz.php">
              <i class="fa-solid fa-circle"></i><span>Registrar Casos</span>
            </a>
          </li>
          <li>
            <a href="consultarAprendiz.php">
              <i class="fa-solid fa-circle"></i><span>Consultar Registros</span>
            </a>
          </li>
        </ul>
      </li><!-- End Ruta de atencion Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#seguimiento-nav" data-bs-toggle="collapse" href="index.php">
          <i class="fa-regular fa-pen-to-square"></i><span>Gestión Seguimiento</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="seguimiento-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="consultarSeguimiento_Filtro.php">
              <i class="fa-solid fa-circle"></i><span>Consultar Casos Asignados</span>
            </a>
          </li>
          <li>
            <a href="consultarSeguimientoTotal.php">
              <i class="fa-solid fa-circle"></i><span>Consultar Trazabilidad</span>
            </a>
          </li>
        </ul>
      </li><!-- End Ruta de atencion Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Información Casos Asignados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php">Gestión Seguimiento</a></li>
          <li class="breadcrumb-item "><a href="consultarSeguimiento_Filtro.php">Consultar</a></li>
          <li class="breadcrumb-item active">Detalle</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">


      <!-- TABLA CONSULTAR -->
      <div class="row">
        <div class="col-lg-12">

          <div class="card ">
            <div class="card-detalle">
              <h3 class="titulo">Detalle del Caso</h3>
              <div class="row">
              <?php
                    cargarInfoDetalles();  
                  ?>
              
              </div>
            </div>
            <div class="card-detalle1 ">
            <div class="card tabla-consultar">
            <div class=" tabla-consultar">
              <h3 class="titulo">Historial Seguimiento</h3>
              <table id="TableSynchronize" class="table datatable">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Estrategia</th>
                    <th>Nombre Encargado</th>
                    <th>Aspectos Extras</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                cargarSeguimiento()

                ?>
                                             
                </tbody>
              </table>

              <!-- End Table with stripped rows -->

            </div>
          </div>
                

              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
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



  <script>
    $(document).ready(function () {
        // Inicializa DataTables con la configuración necesaria
        $('#TableSynchronize').DataTable({
            buttons: [
                'copy','excel','pdf','print' // Define los botones de descarga
            ],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todo"]], // Define las opciones de cantidad de entradas por página
            pageLength: 10, // Establece la cantidad de entradas por página predeterminada
            dom: '<"top"fBlS>rt<"bottom"ip>', // Define la disposición de los elementos de DataTables (botones)
            language: {
                lengthMenu: 'Mostrar _MENU_ registros', // Cambia el texto del filtro de cantidad de entradas por página
                search: 'Buscar:', // Cambia el texto del buscador
                info: 'Mostrando _START_ a _END_ de _TOTAL_ entradas', // Cambia el texto de información sobre la paginación
            }
        });
    });
  </script>

<script>
function cargarDetallesModal(id_caso) {
    fetch('../../Controllers/instructor/mostrar_info.php?id=' + id_caso)
        .then(response => response.text())
        .then(data => {
            document.getElementById('modal-body-content').innerHTML = data;
        })
        .catch(error => console.error('Error al cargar los detalles:', error));
}
</script>
  
  <!-- Biblioteca jsPDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
  
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.15/jspdf.plugin.autotable.min.js"></script> -->
  
  
  <!-- Biblioteca SheetJS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
 
  <!-- Vendor JS Files -->
  <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.3/b-3.0.1/b-html5-3.0.1/b-print-3.0.1/datatables.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
    
  <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>