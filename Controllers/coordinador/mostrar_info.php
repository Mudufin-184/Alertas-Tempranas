<?php
require_once('../../Models/validarSesion.php');
require_once("../../Models/conexionDB.php");
require_once("../../Models/consultasCoordinador.php");



session_start();
function cargarCasos(){

    $id_usuario = $_SESSION['id'];
    $objConsultas = new ConsultasCoordinador();
    $result = $objConsultas->consultarCasosReg($id_usuario);

    if (!isset($result)) {
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
                    <td class="detalles"><a href="../../Views/coordinador/mostrarDetalle.php?id='. $f['identificador_caso'].'" ><i class="fa-solid fa-eye"></i></a></td>
                  </tr>

            ';
        }
    }
}

function cargarCasosAsignados(){

    $id_usuario = $_SESSION['id'];
    $objConsultas = new ConsultasCoordinador();
    $result = $objConsultas->consultarCasosAsig($id_usuario);

    if (!isset($result)) {
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
                    <td>'.$f['estado'].'</td>
                    <td>'.$f['fecha'].'</td>
                    <td>
                    <a class="detalles1" href="../../Views/coordinador/mostrarCasoAsignado.php?id='. $f['identificador_caso'].'" ><i class="fa-solid fa-eye"></i></a>
                    <a class="detalles2" href="../../Views/coordinador/editarCaso.php?id='. $f['identificador_caso'].'"><i class="fa-solid fa-pencil"></i></a></td>
                  </tr>

            ';
        }
    }
}



function cargarDetalles() {
    $id_caso = $_GET['id'];

    $objConsultas = new ConsultasCoordinador();
    $result = $objConsultas->consultarCasosDet($id_caso);
    // echo'<script>alert("'.$result.'")</script>';
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

function cargarInfoDetalles() {
    $id_caso = $_GET['id'];

    $objConsultas = new ConsultasCoordinador();
    $result = $objConsultas->consultarInfoDet($id_caso);
    // echo'<script>alert("'.$result.'")</script>';
        foreach ($result as $f) {
            echo '
            <div class="col-md-4">
                <label class="modal-detalles" for="">Ficha:</label>'.$f['ficha'].' <br>
                <label class="modal-detalles" for="">Nombre:</label>'.$f['nombre'].' '.$f['apellido'].' <br>
                <label class="modal-detalles" for="">Telefono:</label>'.$f['telefono'].' <br>
              </div>
              <div class="col-md-4">
                <label class="modal-detalles" for="">Email:</label>'.$f['email'].' <br>
                <label class="modal-detalles" for="">Programa:</label>'.$f['programa'].'<br>
                <label class="modal-detalles" for="">Categoria:</label>'.$f['categoria'].' <br>
              </div>
              <div class="col-md-4">
                <label class="modal-detalles" for="">Nombre de quien registro:</label>'.$f['nombre_usuario'].' <br>
                <label class="modal-detalles" for="">Fecha Creacion:</label>'.$f['fecha'].'<br>
                <label class="modal-detalles" for="">Motivo:</label>'.$f['descripcion'].'<br>
              </div>
              <div class="col-md-12">
                <label class="modal-detalles" for=""><button class="form-button"><a href="'.$f['soporte'].'" download style= "color:white; ">Descargar Soporte</a></button> <br>
              </div>
            ';
        }
}

function cargarCasoEdit() {
  $id_caso = $_GET['id'];

  $objConsultas = new ConsultasCoordinador();
  $encargados = $objConsultas->CargarEncargado();
  $result = $objConsultas->consultarCasoEdit($id_caso);

  foreach ($result as $f) {
      if ($f['estado'] != "Finalizado") {
          $encargadoOptions = '<option value="' . $f['id_encargado'] . '">' . $f['nombre_encargado'] . '</option>';
          foreach ($encargados as $encargado) {
              $encargadoOptions .= '<option value="' . $encargado['id'] . '">' . $encargado['nombre'] . '</option>';
          }

          echo '
          <form action="../../Controllers/bienestar/registrar_Seguimiento.php" class="form" method="post">
              <!-- progress bar -->
              <div class="progressbar">
                  <div class="progress" id="progress"></div>
                  <div class="progress-step progress-step-active">
                      <i class="fa-solid fa-folder-open"></i>
                  </div>
                  <div class="progress-step">
                      <i class="fa-solid fa-pen-to-square"></i>
                  </div>
                  <div class="progress-step">
                      <i class="fa-solid fa-circle-check"></i>
                  </div>
              </div>
  
              <!-- Formulario 1 -->
              <div class="card form-step form-step-active">
                  <div class="card-body">
                      <input type="hidden" name="id_caso" value="' . $id_caso . '">
                      
                      <!-- Multi Columns Form -->
                      <div class="row g-3 formulario">
                          <h5>Paso 1: Información Aprendiz</h5>
                          
                          <!-- Numero de Identificación -->
                          <div class="col-md-6 campo">
                              <label for="identificacion">Numero de Identificación:</label> <br>
                              <input type="text" placeholder="Ej: 123456" id="identificacion" class="input disabled-field" name="identificacion" value="' . $f['documento'] . '" readonly>
                          </div>
                          
                          <!-- Nombre del aprendiz -->
                          <div class="col-md-6 campo">
                              <label for="aprendiz_Nom">Nombre Del Aprendiz:</label> <br>
                              <input type="text" placeholder="Ej: Daniel Andres" id="aprendiz_Nom" class="input disabled-field" name="nombre" value="' . $f['nombre'] . '" readonly>
                          </div>
                          
                          <!-- Apellidos del aprendiz -->
                          <div class="col-md-6 campo">
                              <label for="aprendiz_Ape">Apellidos Del Aprendiz:</label> <br>
                              <input type="text" placeholder="Ej: Rodriguez Lopez" id="aprendiz_Ape" class="input disabled-field" name="apellido" value="' . $f['apellido'] . '" readonly>
                          </div>
  
                          <!-- Email del aprendiz -->
                          <div class="col-md-6 campo">
                              <label for="aprendiz_Email">Email Del Aprendiz:</label> <br>
                              <input type="email" placeholder="Ej:daniel@gmail.com" id="aprendiz_Email" class="input disabled-field" name="email" value="' . $f['email'] . '" readonly>
                          </div>
  
                          <!-- Telefono del aprendiz -->
                          <div class="col-md-6 campo">
                              <label for="aprendiz_Telefono">Telefono Del Aprendiz:</label> <br>
                              <input type="number" placeholder="Ej:3214565342" id="aprendiz_Telefono" class="input disabled-field" name="telefono" value="' . $f['telefono'] . '" readonly>
                          </div>
  
                          <!-- Ficha del aprendiz -->
                          <div class="col-md-6 campo">
                              <label for="aprendiz_Ficha">Ficha:</label> <br>
                              <input type="text" placeholder="Ej:2692926" id="aprendiz_Ficha" class="input disabled-field" name="ficha" value="' . $f['ficha'] . '" readonly>
                          </div>
  
                          <!-- Programa del aprendiz -->
                          <div class="col-md-12 campo">
                              <label for="aprendiz_Programa">Programa:</label> <br>
                              <input type="text" placeholder="Ej:Análisis y desarrollo de software" id="aprendiz_Programa" class="input disabled-field" name="programa" value="' . $f['programa'] . '" readonly>
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
                          <h5>Paso 2: Información Del Motivo</h5>
                          
                          <!-- Categoria -->
                          <div class="col-md-6 campo">
                              <label for="motivo_categoria">Categoria:</label> <br>
                              <select id="motivo_categoria" name="categoria" class="select disabled-field" required disabled>
                                  <option value="' . $f['categoria'] . '">' . $f['categoria'] . '</option>
                                  <option value="economicos">Economicos</option>
                                  <option value="laborales">Laborales</option>
                                  <option value="familiares">Familiares</option>
                                  <option value="salud">Salud</option>
                                  <option value="sociales">Sociales</option>
                                  <option value="academiacos">Academicos</option>
                                  <option value="calidad">Calidad del Programa</option>
                                  <option value="condiciones">Condiciones Institucionales</option>
                              </select>
                          </div>
  
                          <!-- Nombre del encargado -->
                          <div class="col-md-6 campo">
                              <label for="id_encargado">Encargado:</label> <br>
                              <select name="id_encargado" id="encargado" class="select" required>
                                  ' . $encargadoOptions . '
                              </select>
                          </div>
  
                          <!-- Descripción del motivo -->
                          <div class="col-md-6 campo">
                              <label for="motivo_Descripcion">Motivo:</label> <br>
                              <textarea rows="3" placeholder="Ej:2692926" id="motivo_Descripcion" class="input disabled-field" name="motivo" readonly>' . $f['descripcion'] . '</textarea>
                          </div>
  
                          <!-- Estado -->
                          <div class="col-md-6 campo">
                              <label for="estado">Estado:</label> <br>
                              <select id="estado" name="estado" class="select" required>
                                  <option value="' . $f['estado'] . '">' . $f['estado'] . '</option>
                                  <option value="En espera">En espera</option>
                                  <option value="En proceso">En proceso</option>
                                  <option value="Finalizado">Finalizado</option>
                              </select>
                          </div>
  
                          <!-- Estrategia del motivo -->
                          <div class="col-md-6 campo">
                              <label for="estrategia">Estrategia:</label> <br>
                              <textarea rows="3" placeholder="Ej:Asignación de apoyo económico temporal" id="estrategia" class="input dark-content" name="estrategia">' . $f['estrategia'] . '</textarea>
                          </div>

                          <!-- Aspectos Extras -->
                          <div class="col-md-6 campo">
                              <label for="aspectos_extras">Aspectos Extras:</label> <br>
                              <textarea rows="3" placeholder="Ej:Subsidio mensual por tres meses" id="aspectos_extras" class="input dark-content" name="aspectos_extras">' . $f['aspectos_extras'] . '</textarea>
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
              </div>
          </form>
          ';
      } else {
          echo "<script>alert('No se puede modificar debido a que el caso se encuentra Finalizado')</script>";
          echo "<script>location.href='../../Views/coordinador/consultarSeguimiento_Filtro.php'</script>";
      }
  }
}


function cargarSeguimiento(){

  $id_caso = $_GET['id'];
  $objConsultas = new ConsultasCoordinador();
  $result = $objConsultas->consultarSegumientoCaso($id_caso);

  if (!isset($result)) {
      // Result vacio o tabla vacia
      echo "<h2>No hay seguimientos registrados</h2>";
  } else {
      // Result con datos o tabla con datos
      foreach ($result as $f) {
          // Pintamos el Html dentro del echo
          echo '

                <tr>
                  <td>'.$f['fecha'].'</td>
                  <td>'.$f['estrategia'].' </td>
                  <td>'.$f['nombre_encargado'].'</td>
                  <td>'.$f['aspectos_extras'].'</td>
                  <td>'.$f['estado'].'</td>

                  
                </tr>

          ';
      }
  }
}


function cargarCasosTotales(){


  $objConsultas = new ConsultasCoordinador();
  $result = $objConsultas->consultarCasos();

  if (!isset($result)) {
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
                  <td>'.$f['estado'].'</td>
                  <td>'.$f['fecha'].'</td>
                  <td>
                  <a class="detalles1" href="../../Views/coordinador/mostrarCasoAsignado.php?id='. $f['identificador_caso'].'" ><i class="fa-solid fa-eye"></i></a>
                  <a class="detalles2" href="../../Views/coordinador/editarCaso.php?id='. $f['identificador_caso'].'"><i class="fa-solid fa-pencil"></i></a></td>
                </tr>

          ';
      }
  }
}
function cargarPerfilCordinador()
{
  $idUsuarios = $_SESSION["id"];

  $objConsultasAdmin = new ConsultasCoordinador();

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