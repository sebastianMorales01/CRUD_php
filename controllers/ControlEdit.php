<?php

namespace controllers;

use models\TareaModel as TareaModel;

require_once("../models/TareaModel.php");

class ControlEdit{
    public $id;
    public $nombre;
    public $descripcion;

    public function __construct(){
        $this->id = $_POST["id"];
        $this->nombre = $_POST["nombre"];
        $this->descripcion = $_POST["descripcion"];
    }

    public function editar(){
        session_start();
        if ($this->nombre == "" || $this->descripcion == "") {
            $_SESSION["error_edit"] = "Completa todos los campos";
            header("Location: ../index.php");
            return;
        }

        $data = ["nombre" => $this->nombre, "descripcion" => $this->descripcion];  //es lo q necesita la funcion editar
        $modelo = new TareaModel();  //hay q llamar al tareaModel

        $count = $modelo->editarTarea($this->id, $data);  //se ocupa el count para ver si se edita o no
        if ($count == 1) {
            $_SESSION["ok_edit"] = "Tarea Actualizada";
        } else {
            $_SESSION["error_edit"] = "Error en la BD";
        }
        header("Location: ../index.php");
    }
}

$obj = new ControlEdit();
$obj->editar();