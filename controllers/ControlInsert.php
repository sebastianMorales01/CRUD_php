<?php

namespace controllers;

require_once("../models/TareaModel.php"); //cuando reqiero otro archivo 

use models\TareaModel as TareaModel;


class ControlInsert{
    public $nombre;
    public $descripcion;

    public function __construct() {
        $this->nombre = $_POST["nombre"];
        $this->descripcion = $_POST["descripcion"];
    }  
        
    public function guardarTarea(){
        session_start();
        if ($this->nombre=="" || $this->descripcion=="") {
            $_SESSION["respuesta"] = "campos vacios";
            header("Location: ../index.php");
            return;
        }

        $model = new TareaModel();  // generar la importacion , q es donde necesitamos
                                    // enviar los datos del formulario para q se inserten
            
        $count = $model->insertar(    //generar un arreglo asociativo con los datos obtenidos en el constructor
            ["nombre"=>$this->nombre,"descripcion"=>$this->descripcion]
        );
        if ($count == 1) {
            $_SESSION["respuesta"] = "Tarea Creada";
        }else{
            $_SESSION["respuesta"] = "Hubo un error a nivel de BD";
        }
        header("Location: ../index.php");
        
    }
}

$obj = new ControlInsert();
$obj->guardarTarea();
