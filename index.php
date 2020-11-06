<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    // importar la funcion del TareaModel
    use models\TareaModel as TareaModel;
    require_once("models/TareaModel.php");
    $model = new TareaModel();  //crear el objeto model, q se ocupara para llamar a la funcion
    $tareas = $model->getAllTareas();
    //echo json_encode($tareas);  //esta linea entrega la base de datos en formato JSON, como si fuera una API
    print_r($tareas);
    /* Imprimir el arreglo asociativo
    Array ( 
            [0] => Array ( [id] => 1 , [nombre] => Tarea #1 , [descripcion] => progra ) 
            [1] => Array ( [id] => 3 , [nombre] => tarea #3 , [descripcion] => asd ) 
        )

    */
    $buscar = $model->buscarTarea(1);  
    print_r($buscar);
    echo count($buscar);

    $model->eliminarTarea(5);

    $model->editarTarea(4,["nombre"=>"BD","descripcion"=>"estudiar bd"]);


    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
    <h4 class="center">CRUD TAREAS</h4>
        <div class="row">
            <div class="col l4 m4 s12">
                <h5 class="center">Nueva Tarea</h5>
                <form action="controllers/ControlInsert.php" method="post">
                    <div class="input-field">
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    
                    <div class="input-field">
                        <input id="descripcion" type="text" name="descripcion">
                        <label for="descripcion">Descripcion</label>
                    </div>
                    
                    <button class="btn">Guardar Tarea</button>
                </form>

                <p>
                    <?php
                        session_start();
                        if (isset($_SESSION["respuesta"])) {
                        echo $_SESSION["respuesta"]; 
                        unset($_SESSION["respuesta"]);  // elimina los datos de la variable al actualizar la pagina
                        }
                    ?>
                </p>
            </div>

            <div class="col l8 m8 s12">
            <h5 class="center">Listado de Tarea</h5>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Tarea</th>
                        <th>Descripcion</th>
                        <th></th>
                    
                    <?php foreach ($tareas as $item) {  ?>
                        </tr>
                            <td><?=$item["id"]?></td>
                            <td><?=$item["nombre"]?></td>
                            <td><?=$item["descripcion"]?></td>
                            <td>
                                <button class="btn-floating waves-effect orange"><i class="material-icons">edit</i></button>
                                <button class="btn-floating waves-effect red"><i class="material-icons">delete</i></button>
                            </td>
                        <tr>
                    <?php } ?>
                    
        
                </table> 

            </div>
            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</body>
</html>