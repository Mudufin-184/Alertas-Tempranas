<?php

// session_start();

if (!isset($_SESSION["aut"])) {
    echo '
    <script>
        alert("Por favor inicia sesión")
        location.href="../../Views/extras/iniciarSesion.php";
    </script>
    ';
}

if ($_SESSION["rol"] != "bienestar") {
    echo '
    <script>
        alert("Tu rol no tiene permiso para entrar a esta página")
        location.href="../../Views/extras/iniciarSesion.php";
    </script>
    ';
}