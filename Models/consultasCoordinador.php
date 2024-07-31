
<?php
class ConsultasCoordinador {
    public function registrarRuta($identificacion, $nombre, $apellido, $telefono, $email, $programa, $ficha, $id_usuario, $categoria, $fecha, $id_encargado, $motivo, $estado, $rutaArchivo){

        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();


        $registrarAprendiz = "INSERT INTO aprendiz( documento, nombre, apellido, email, telefono, programa, ficha, id_usuario) Values (:identificacion, :nombre, :apellido, :email, :telefono, :programa, :ficha, :id_usuario)";

        $result1 = $conexion->prepare($registrarAprendiz);

        $result1->bindparam(':identificacion', $identificacion);
        $result1->bindparam(':nombre', $nombre);
        $result1->bindparam(':apellido', $apellido);
        $result1->bindparam(':email', $email);
        $result1->bindparam(':telefono', $telefono);
        $result1->bindparam(':programa', $programa);
        $result1->bindparam(':ficha', $ficha);
        $result1->bindparam(':id_usuario', $id_usuario);

        $result1->execute();

        $id_aprendiz = $conexion->lastInsertId();


        $registrarCaso = "INSERT INTO casos(descripcion, categoria, soporte, fecha, estado, id_aprendiz, id_usuario, id_encargado) Values (:motivo, :categoria, :rutaArchivo, :fecha, :estado, :id_aprendiz, :id_usuario, :id_encargado)";

        $result2 = $conexion->prepare($registrarCaso);

        $result2->bindparam(':motivo', $motivo);
        $result2->bindparam(':categoria', $categoria);
        $result2->bindparam(':rutaArchivo', $rutaArchivo);
        $result2->bindparam(':fecha', $fecha);
        $result2->bindparam(':estado', $estado);
        $result2->bindparam(':id_aprendiz', $id_aprendiz);
        $result2->bindparam(':id_usuario', $id_usuario);
        $result2->bindparam(':id_encargado', $id_encargado);

        $result2->execute();

        echo"<script> alert('El  caso ha sido registrado;)') </script>";
        echo"<script> location.href='../../Views/coordinador/index.php' </script>";

        
    }


    public function consultarCasosReg($id_usuario){


        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        


        $consultar= "SELECT c.id as identificador_caso, a.id as id_aprendiz, a.ficha, a.nombre, a.apellido, c.descripcion , c.categoria, c.id_encargado, u.nombre AS nombre_encargado FROM casos c JOIN aprendiz a ON c.id_aprendiz = a.id JOIN usuarios u ON c.id_encargado = u.id WHERE c.id_usuario=  :id_usuario ";

        $result= $conexion->prepare($consultar);

        $result->bindparam(':id_usuario', $id_usuario);

        $result->execute();
        
        $f= [];

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }

        return $f;


    }


    public function consultarCasosAsig($id_usuario){


        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        


        $consultar= "SELECT c.id as identificador_caso, a.id as id_aprendiz, a.ficha, a.nombre, a.apellido, c.descripcion , c.categoria, c.fecha, c.estado FROM casos c JOIN aprendiz a ON c.id_aprendiz = a.id JOIN usuarios u ON c.id_encargado = u.id WHERE c.id_encargado=:id_usuario ";

        $result= $conexion->prepare($consultar);

        $result->bindparam(':id_usuario', $id_usuario);

        $result->execute();
        
        $f= [];

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }

        return $f;


    }


    public function consultarCasosDet($id_caso){
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        $consultar= "SELECT a.ficha, a.nombre, a.apellido, a.telefono, a.email, a.programa, c.categoria, u.nombre AS nombre_encargado, c.estado, c.fecha, c.descripcion FROM casos c JOIN aprendiz a ON c.id_aprendiz = a.id JOIN usuarios u ON c.id_encargado = u.id WHERE c.id = :id_caso";

        $result= $conexion->prepare($consultar);

        $result->bindparam(':id_caso', $id_caso);

        $result->execute();
        
        $f= array();

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }

        return $f;


    }

    public function consultarInfoDet($id_caso){
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        $consultar= "SELECT a.ficha, a.nombre, a.apellido, a.telefono, a.email, a.programa, c.categoria, u.nombre AS nombre_usuario, c.estado, c.fecha, c.descripcion, c.soporte FROM casos c JOIN aprendiz a ON c.id_aprendiz = a.id JOIN usuarios u ON c.id_usuario = u.id WHERE c.id = :id_caso";

        $result= $conexion->prepare($consultar);

        $result->bindparam(':id_caso', $id_caso);

        $result->execute();
        
        $f= array();

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }

        return $f;


    }

    public function CargarEncargado(){
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        $consultar= "SELECT id, nombre, rol FROM usuarios WHERE rol = 'bienestar' OR rol= 'coordinadorFormacion'OR rol= 'coordinadorAcademico' ";

        $result= $conexion->prepare($consultar);

        $result->execute();

        $f= null;

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }

        return $f;

    }


    public function ConsultarCasoEdit($id_caso){

        $objConexion = new Conexion();

        $conexion = $objConexion->getConexion();

        $consultar="SELECT a.documento, a.nombre, a.apellido, a.email, a.telefono, a.programa, a.ficha, 
       c.descripcion, c.categoria, c.soporte, c.id_encargado, ue.nombre AS nombre_encargado, 
       c.id AS id_caso, c.estado, s.estrategia, s.aspectos_extras 
        FROM casos c 
        LEFT JOIN aprendiz a ON c.id_aprendiz = a.id 
        LEFT JOIN usuarios ue ON c.id_encargado = ue.id 
        LEFT JOIN seguimiento_casos s ON c.id = s.id_caso 
        WHERE c.id = :id_caso 
        AND (s.id = (
            SELECT MAX(s2.id)
            FROM seguimiento_casos s2
            WHERE s2.id_caso = c.id
        ) OR s.id IS NULL);";

        $result= $conexion->prepare($consultar);

        $result->bindParam(':id_caso', $id_caso);

        $result->execute();
        
        $f= null;

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }

        return $f;


    }


    public function editarCaso($estrategia, $aspectos_extras, $estado, $id_encargado,$id_caso, $fecha){

        $objConexion = new Conexion();

        $conexion = $objConexion->getConexion();
        

        $editar= "UPDATE casos SET  estado=:estado WHERE id=:id_caso";

        $result1=$conexion-> prepare($editar);

        $result1->bindParam(':id_caso', $id_caso);
        $result1->bindParam(':estado', $estado);

        $result1->execute();


        $registrar= "INSERT INTO seguimiento_casos(estrategia, id_caso, id_encargado, aspectos_extras, fecha) VALUES (:estrategia, :id_caso, :id_encargado, :aspectos_extras, :fecha)";

        $result2=$conexion-> prepare($registrar);

        $result2->bindParam(':estrategia', $estrategia);
        $result2->bindParam(':id_caso', $id_caso);
        $result2->bindParam(':id_encargado', $id_encargado);
        $result2->bindParam(':aspectos_extras', $aspectos_extras);
        $result2->bindParam(':fecha', $fecha);
        $result2->execute();
        echo"<script>alert('Se agregó el respectivo seguimiento al caso :)')</script>";
        echo"<script> location.href='../../Views/coordinador/consultarSeguimiento_Filtro.php' </script>";

    }

    public function consultarSegumientoCaso($id_caso){
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        $consultar= "SELECT s.id, s.estrategia, s.id_caso, s.id_encargado, s.aspectos_extras, s.fecha, c.estado, u.nombre AS nombre_encargado FROM seguimiento_casos s JOIN casos c ON s.id_caso = c.id JOIN usuarios u ON s.id_encargado= u.id WHERE s.id_caso = :id_caso";

        $result= $conexion->prepare($consultar);

        $result->bindparam(':id_caso', $id_caso);

        $result->execute();
        
        $f= array();

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }

        return $f;


    }

    public function consultarCasos(){


        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        


        $consultar= "SELECT c.id as identificador_caso, a.id as id_aprendiz, a.ficha, a.nombre, a.apellido, c.descripcion , c.categoria, c.fecha, c.estado FROM casos c JOIN aprendiz a ON c.id_aprendiz = a.id JOIN usuarios u ON c.id_encargado = u.id";

        $result= $conexion->prepare($consultar);

        $result->execute();
        
        $f= [];

        while($resultado = $result->fetch()){
            $f[] = $resultado;
        }

        return $f;


    }

    public function consultarUsers()
    {

        $sql = "SELECT * FROM usuarios";

        $objConexionBd = new Conexion();

        $conexion = $objConexionBd->getConexion();

        $result = $conexion->prepare($sql);

        $result->execute();

        $f = $result->fetchAll();

        return $f;
    }
    public function consultarUser($idUsuario)
    {

        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        $sql = "SELECT * FROM usuarios WHERE id = :idUsuario";

        $result = $conexion->prepare($sql);

        $result->bindParam(":idUsuario", $idUsuario);

        $result->execute();

        $f = $result->fetch();

        return $f;
    }



}
