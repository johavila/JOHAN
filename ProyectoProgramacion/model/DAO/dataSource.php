<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/model/db.php";

class DataSource{
    public function __construct(){}
    
    public function select($conexion, $sql = "", $values = array()){
        if(!$sql == null){
            $consulta = $conexion->prepare($sql);
            $consulta->execute($values);
            $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $tabla_datos;
        }
        return null;
    }
    
    public function update($conexion, $sql = "", $values = array()){
        if(!$sql == null){
            $consulta = $conexion->prepare($sql);
            $consulta->execute($values);
            return 1;
        }
        return 0;
    }
}
?>