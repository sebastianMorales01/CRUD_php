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

    public function getAllTareas(){  // hay q llamar a esta funcion desde el index, para q cargue todo
        $stm = Conexion::conector()->prepare("SELECT * FROM tareas");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC); //entrega toda la info de la BD, 
                                                  //Lo hace como arreglo asociativo
    }

    public function buscarTarea($id){
        $stm = Conexion::conector()->prepare("SELECT * FROM tareas WHERE id=:A");
        $stm->bindParam(":A",$id); 
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function eliminarTarea($id){
        $stm = Conexion::conector()->prepare("DELETE FROM tareas WHERE id=:A");
        $stm->bindParam(":A",$id); 
        return $stm->execute();  //NO se ocupa el fetchAll ya q no retornamos la info, solo la actualizamos
    }

    public function editarTarea($id, $data) { //$data=["nombre"=>valor1, "descripcion"=>valor]
        $stm = Conexion::conector()->prepare("UPDATE tareas SET nombre=:A, descripcion=:B WHERE id=:C");
        $stm->bindParam(":A", $data['nombre']);
        $stm->bindParam(":B", $data['descripcion']);
        $stm->bindParam(":C", $id);
        return $stm->execute();
    }


}

?>