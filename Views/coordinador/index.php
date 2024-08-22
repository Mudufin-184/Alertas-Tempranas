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

  <title>AlertasTempranas</title>
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
          <i class="fa-regular fa-pen-to-square"></i><span>Consulta de Casos Asignados</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="seguimiento-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="consultarSeguimiento_Filtro.php">
              <i class="fa-solid fa-circle"></i><span>Mis Casos Asignados</span>
            </a>
          </li>
          <li>
            <a href="consultarSeguimientoTotal.php">
              <i class="fa-solid fa-circle"></i><span>Consulta General de Casos</span>
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
          <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">


      <!-- TABLA CONSULTAR -->
      <div class="row">
        <div class="col-lg-12">

          <div class="card tabla-consultar">
            <div class="card-body tabla-consultar">
              <h5 class="card-title">Consultar Casos Asignados</h5>
              <table id="TableSynchronize" class="table datatable">
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
                <?php
                cargarCasosTotales();

                ?>
                                             
                </tbody>
              </table>

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
          dom: 'Bfltip', // Configuración del diseño de elementos
          buttons: [
              {
                  extend: 'pdf',
                  text: ' PDF', // Texto en español
                  exportOptions: {
                      columns: [1, 2, 3, 4, 5, 6, 7] // Especifica las columnas que deseas incluir en el PDF
                  },
                  customize: function (doc) {
                      doc.content.splice(0, 1, {
                          text: 'Informe de Todos los Casos Asignados',
                          style: 'title'
                      });

                      var dataTableContent = {
                          table: {
                              headerRows: 1,
                              body: []
                          },
                          layout: 'lightHorizontalLines'
                      };

                      var tableRows = $('#TableSynchronize').DataTable().rows().data();
                      tableRows.each(function (index, rowData) {
                          var dataRow = [];
                          $(rowData).each(function () {
                              dataRow.push({ text: this });
                          });
                          dataTableContent.table.body.push(dataRow);
                      });

                      doc.content.push(dataTableContent);
                  }
              },
              {
                  extend: 'excel',
                  text: 'Excel', // Texto en español
                  exportOptions: {
                      columns: [1, 2, 3, 4, 5, 6, 7]
                  }
              },
              {
                  extend: 'print',
                  text: 'Imprimir', // Texto en español
                  exportOptions: {
                      columns: [1, 2, 3, 4, 5, 6, 7]
                  }
              },
              {
                  extend: 'copy',
                  text: 'Copiar', // Texto en español
                  exportOptions: {
                      columns: [1, 2, 3, 4, 5, 6, 7]
                  }
              },
              {
                  extend: 'csv',
                  text: '  CSV', // Texto en español
                  exportOptions: {
                      columns: [1, 2, 3, 4, 5, 6, 7]
                  }
              }
          ],
          columnDefs: [{
              targets: -1,  // Última columna
              orderable: false, // Desactiva la ordenación
              searchable: false // Desactiva la búsqueda
          }],
          language: {
              url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json" // URL para la localización en español
          },
          lengthMenu: [[5, 10, 25, 50, 75, 100], [5, 10, 25, 50, 75, 100]], // Menú de longitud personalizado
          pageLength: 10, // Longitud de página inicial
          dom: '<"top"fBl>rt<"bottom"ip>', // Diseño de los elementos en la tabla
      }).buttons().container().appendTo('#TableSynchronize_wrapper .col-md-6:eq(0)');
  });
</script>

</body>

</html>