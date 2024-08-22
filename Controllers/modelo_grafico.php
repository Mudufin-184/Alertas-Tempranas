<?php
require_once __DIR__."/../Models/conexionDB.php";

class ModeloGrafico {
    public function obtenerDatosGrafico($idUsuario) {
        $con = new conexion();
        $conexion = $con->getConexion();

        $sql = "SELECT 
                    COUNT(CASE WHEN estado = 'En espera' THEN 1 END) AS casosEnEspera,
                    COUNT(CASE WHEN estado = 'Finalizado' THEN 1 END) AS casosEntregados,
                    COUNT(CASE WHEN estado = 'En proceso' THEN 1 END) AS casosEnProceso 
                FROM casos 
                WHERE id_usuario = :idUsuario";

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'casosEnEspera' => $result['casosEnEspera'] ?? 0,
            'casosEntregados' => $result['casosEntregados'] ?? 0,
            'casosEnProceso' => $result['casosEnProceso'] ?? 0,
        ];
    }
}
?>