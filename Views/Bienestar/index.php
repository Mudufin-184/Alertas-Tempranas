<?php
// Enlazamos las dependencias
require_once("../../Models/conexionDB.php");
require_once("../../Controllers/bienestar/seguridadAccesoBienestar.php");
require_once("../../Controllers/bienestar/mostrar_info.php");
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

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700|Poppins:300,300i,400,400i,500,500,600,600,700,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">

  <!-- Template Main CSS File --> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link href="assets/css/style.css" rel="stylesheet">

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
        <?php cargarPerfilBienestar(); ?>
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
          <i class="fa-solid fa-route"></i><span>Registro de Casos </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ruta-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="registrarAprendiz.php">
              <i class="fa-solid fa-circle"></i><span>Registrar Nuevo Caso</span>
            </a>
          </li>
          <li>
            <a href="consultarAprendiz.php">
              <i class="fa-solid fa-circle"></i><span>Consultar Registros Hechos</span>
            </a>
          </li>
        </ul>
      </li><!-- End Ruta de atencion Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#seguimiento-nav" data-bs-toggle="collapse" href="index.php">
          <i class="fa-regular fa-pen-to-square"></i><span> Consulta de Casos Asignados </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="seguimiento-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="consultarSeguimiento_Filtro.php">
              <i class="fa-solid fa-circle"></i><span>Mis Casos Asignados</span>
            </a>
          </li>
        </ul>
      </li><!-- End Ruta de atencion Nav -->


    </ul>

  </aside><!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Casos Asignados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
      <div class="col-lg-12">
        <div class="card tabla-consultar">
          <div class="card-body tabla-consultar">
            <h5 class="card-title">Consultar Casos Asignados</h5>
            <table id="TableSynchronize" class="table table-striped">
              <thead>
                <tr>
                  <th>Ficha</th>
                  <th>Nombres</th>
                  <th>Motivo</th>
                  <th>Categoria</th>
                  <th>Estado</th>
                  <th>Fecha Asignación</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php cargarCasosAsignados(); ?>
              </tbody>
            </table><!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.flash.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
  $(document).ready(function() {
      $('#TableSynchronize').DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
          ],
          columnDefs: [{
              targets: -1,  // Aquí se define la columna "Acciones" como la última columna
              orderable: false, // Evita que se ordene la columna de "Acciones"
              searchable: false // Evita que se busque en la columna de "Acciones"
          }],
          language: {
              url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
          },
          lengthMenu: [5, 10, 25, 50, 75, 100] // Filtro de cantidad de registros
      }).buttons().container().appendTo('#TableSynchronize_wrapper .col-md-6:eq(0)');
  });
</script>


</body>

</html>
