<?php
// include_once('database/Conectar.php');
class IntervalosDao
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = Conectar::conexion();
    }
    public function select_intervalos()
    {
        try {
        $sql = "SELECT texto,idIntervalo FROM intervalos";
        $consulta = $this->conexion->prepare($sql);
        $valor_devuelto = $consulta->execute();
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $intervalos[] = $fila;
        }
        $consulta->closeCursor();
        $this->cerrar_conexion();
    } catch (PDOException $e) {
        echo "<br>Error:" . $e->getMessage();
        echo "<br>Código del error:" . $e->getCode();
        echo "<br>Fichero error:" . $e->getFile();
        echo "<br>Línea del error:" . $e->getLine();
        exit;
    }
        return $intervalos;
    }
    private function cerrar_conexion()
    {
        $this->conexion = NULL;
    }
}
