<?php

namespace models;

require_once("Conexion.php");  //cuando reqiero otro archivo 

class TareaModel{
    public function insertar($data){    //$data --> es un arreglo asociativo que contiene los atributos de la tabla
        $stm = Conexion::conector()->prepare("INSERT INTO tareas VALUES(null,:A,:B)");
        $stm->bindParam(":A",$data["nombre"]);  //definir q es A y de donde lo obtengo
        $stm->bindParam(":B",$data["descripcion"]);
        return $stm->execute();
    }
}

?>