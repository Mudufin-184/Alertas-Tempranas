<?php
require_once('../../Models/validarSesion.php');
require_once('../../Models/consultasInstructor.php');
// session_start();
function cargarCasos(){
  $id_usuario = $_SESSION['id'];
  $objConsultas = new ConsultasInstructor();
  $result = $objConsultas->consultarCasosReg($id_usuario);

  if (!isset($result) || empty($result)) {
      // Result vacio o tabla vacia
      echo "<h2>No hay casos registrados</h2>";
  } else {
      // Result con datos o tabla con datos
      foreach ($result as $f) {
          // Pintamos el Html dentro del echo
          echo '
          <tr>
              <td>'.$f['ficha'].'</td>
              <td>'.$f['nombre'].' '.$f['apellido'].'</td>
              <td>'.$f['descripcion'].'</td>
              <td>'.$f['categoria'].'</td>
              <td>'.$f['nombre_encargado'].'</td>
              <td class="detalles"><a href="../../Views/instructor/mostrarDetalle.php?id='. $f['identificador_caso'].'" ><i class="fa-solid fa-eye"></i></a></td>
          </tr>';
      }
  }
}



function cargarDetalles() {
  $id_caso = $_GET['id'];

  $objConsultas = new ConsultasInstructor();
  $result = $objConsultas->consultarCasosDet($id_caso);

  foreach ($result as $f) {
      echo '
      <div class="col-md-4">
          <label class="modal-detalles" for="">Ficha:</label>'.$f['ficha'].' <br>
          <label class="modal-detalles" for="">Nombre:</label>'.$f['nombre'].' '.$f['apellido'].' <br>
          <label class="modal-detalles" for="">Telefono:</label>'.$f['telefono'].' <br>
          <label class="modal-detalles" for="">Estado:</label>'.$f['estado'].'<br>
      </div>
      <div class="col-md-4">
          <label class="modal-detalles" for="">Email:</label>'.$f['email'].' <br>
          <label class="modal-detalles" for="">Programa:</label>'.$f['programa'].'<br>
          <label class="modal-detalles" for="">Categoria:</label>'.$f['categoria'].' <br>
      </div>
      <div class="col-md-4">
          <label class="modal-detalles" for="">Nombre del encargado:</label>'.$f['nombre_encargado'].' <br>
          <label class="modal-detalles" for="">Fecha:</label>'.$f['fecha'].'<br>
          <label class="modal-detalles" for="">Motivo:</label>'.$f['descripcion'].'<br>         
      </div>
      ';
  }
}


function cargarPerfilInstructor()
{
  $idUsuarios = $_SESSION["id"];

  $objConsultasAdmin = new ConsultasInstructor();

  $f = $objConsultasAdmin->consultarUser($idUsuarios);

  echo '
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">' . $f["nombre"] .', '.$f["rol"].  '</span>
            
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>' . $f["nombre"] . '</h6>
              <span>' . $f["rol"] . '</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="userProfileAdmin.php">
                <i class="bi bi-person"></i>
                <span>Mi perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Configuración</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>¿Necesitas Ayuda?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../../Controllers/cerrarSesion.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Sesión</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
    ';
}