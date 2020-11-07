<?php

namespace controllers;
require_once("../models/TareaModel.php");
use models\TareaModel as TareaModel;

class ControlTabla{
    public $bt_edit;
    public $bt_delete;

    public function __construct(){
        $this->bt_edit = $_POST["bt_edit"];
        $this->bt_delete = $_POST["bt_delete"];
    }

    public function procesar(){
        if (isset($this->bt_edit)) {
            // echo "editar el ID $this->bt_edit";
            session_start();
            $_SESSION["editar"] = "ON";  //activo una sesion para al presionar el boton de editar cambie a ON
                                        // y asi poder preguntar en el index, si la sesion existe ,la muestra
            $modelo = new TareaModel();    
            $tarea = $modelo->buscarTarea($this->bt_edit); //buscar la tarea por el id, cuando apretamos el boton
            $_SESSION["tarea"] = $tarea[0];   // es posicion 0 ya q es solo 1 tarea q estoy apretando

            header("Location: ../index.php");
        } else {
            //echo "eliminar el ID $this->bt_delete";
            $modelo = new TareaModel();
            $modelo->eliminarTarea($this->bt_delete);
            header("Location: ../index.php");
        }
    }
}

$obj = new ControlTabla();
$obj->procesar();