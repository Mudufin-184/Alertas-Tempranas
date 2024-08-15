
<?php
class ConsultasInstructor {
    public function registrarRuta($tipo_documento, $identificacion, $nombre, $apellido, $telefono, $email, $programa, $ficha, $id_usuario, $categoria, $fecha, $id_encargado, $motivo, $estado, $rutaArchivo){

        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();

        // Consulta actualizada con los nombres correctos de las columnas
        $registrarAprendiz = "INSERT INTO aprendiz(tipo_documento_aprendiz, documento, nombre, apellido, email, telefono, programa, ficha, id_usuario) 
                              VALUES (:tipo_documento, :identificacion, :nombre, :apellido, :email, :telefono, :programa, :ficha, :id_usuario)";

        $result1 = $conexion->prepare($registrarAprendiz);

        $result1->bindparam(':tipo_documento', $tipo_documento);
        $result1->bindparam(':identificacion', $identificacion); // Aquí corresponde a la columna `documento`
        $result1->bindparam(':nombre', $nombre);
        $result1->bindparam(':apellido', $apellido);
        $result1->bindparam(':email', $email);
        $result1->bindparam(':telefono', $telefono);
        $result1->bindparam(':programa', $programa);
        $result1->bindparam(':ficha', $ficha);
        $result1->bindparam(':id_usuario', $id_usuario);

        $result1->execute();

        $id_aprendiz = $conexion->lastInsertId();

        $registrarCaso = "INSERT INTO casos(descripcion, categoria, soporte, fecha, estado, id_aprendiz, id_usuario, id_encargado) 
                          VALUES (:motivo, :categoria, :rutaArchivo, :fecha, :estado, :id_aprendiz, :id_usuario, :id_encargado)";

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

        echo "<script> alert('El caso ha sido registrado') </script>";
        echo "<script> location.href='../../Views/instructor/index.php' </script>";
    }


    public function consultarCasosReg($id_usuario){
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();
    
        // Modificamos la consulta para incluir el nombre y apellido del encargado
        $consultar= "SELECT 
                        c.id as identificador_caso, 
                        a.id as id_aprendiz, 
                        a.ficha, 
                        a.nombre, 
                        a.apellido, 
                        c.descripcion, 
                        c.categoria, 
                        u.nombre AS nombre_encargado
                    FROM casos c 
                    JOIN aprendiz a ON c.id_aprendiz = a.id 
                    JOIN usuarios u ON c.id_encargado = u.id 
                    WHERE c.id_usuario= :id_usuario";
    
        $result = $conexion->prepare($consultar);
        $result->bindParam(':id_usuario', $id_usuario);
        $result->execute();
    
        $f = [];
    
        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
    
        return $f;
    }

    public function consultarCasosDet($id_caso){
        $objConexion = new Conexion();
        $conexion = $objConexion->getConexion();
    
        $consultar = "SELECT a.ficha, a.nombre, a.apellido, a.telefono, a.email, a.programa, c.categoria, c.estado, u.nombre AS nombre_encargado, c.fecha, c.descripcion 
                      FROM casos c 
                      JOIN aprendiz a ON c.id_aprendiz = a.id 
                      JOIN usuarios u ON c.id_encargado = u.id 
                      WHERE c.id = :id_caso";
    
        $result = $conexion->prepare($consultar);
        $result->bindparam(':id_caso', $id_caso);
        $result->execute();
        
        $f = array();
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
