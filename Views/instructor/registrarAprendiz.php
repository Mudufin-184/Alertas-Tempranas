<?php

session_start();

require_once("../../Models/conexionDB.php");
require_once("../../Controllers/instructor/seguridadAccesoInstructor.php");
require_once("../../Controllers/instructor/mostrar_info.php");

require_once ("../../Controllers/modelo_grafico.php");

$modelo = new ModeloGrafico();
$datos = $modelo->obtenerDatosGrafico($_SESSION["id"]); 

$casosEnEspera = $datos['casosEnEspera'];
$casosEntregados = $datos['casosEntregados'];
$casosEnProceso = $datos['casosEnProceso'];
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
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                  <!-- Tipo de Documento -->
                  <div class="col-md-6 campo">
                      <label for="tipo_documento">Tipo de Documento:</label> <br>
                      <select id="tipo_documento" class="input" name="tipo_documento">
                        <option value="CC">Cédula de ciudadanía</option>
                        <option value="TI">Tarjeta de identidad</option>
                        <option value="CE">Cédula de extranjería</option>
                      </select>
                    </div>
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
                    <div class="col-md-12 campo">
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
                      <select id="aprendiz_Programa" class="input" name="programa">
                        <option value="Análisis y Desarrollo de Software">Análisis y Desarrollo de Software</option>
                        <option value="ASEGURAMIENTO_METROLOGICO_INDUSTRIAL">Aseguramiento Metrológico Industrial</option>
                        <option value="DESARROLLO_CREATIVO_PRODUCTOS_INDUSTRIA">Desarrollo Creativo de Productos para la Industria</option>
                        <option value="DESARROLLO_COMPONENTES_MECANICOS">Desarrollo de Componentes Mecánicos</option>
                        <option value="DESARROLLO_ADAPTACION_PROTESIS_ORTESIS">Desarrollo y Adaptación de Prótesis y Órtesis</option>
                        <option value="DISENO_INTEGRACION_AUTOMATISMOS_MECATRONICOS">Diseño e Integración de Automatismos Mecatrónicos</option>
                        <option value="CONTROL_SEGURIDAD_DIGITAL">Control de la Seguridad Digital</option>
                        <option value="DIBUJO_MECANICO">Dibujo Mecánico</option>
                        <option value="MODELADO_3D_INDUSTRIA">Modelado 3D para la Industria</option>
                        <option value="MODELADO_DIGITAL_PRODUCTOS_INDUSTRIALES">Modelado Digital de Productos Industriales</option>
                        <option value="PROGRAMACION_SOFTWARE">Programación de Software</option>
                      </select>
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