<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12">
                <h5>CRUD TAREAS</h5>
                <form action="controllers/ControlInsert.php" method="post">
                    <input type="text" name="nombre" placeholder="nombre">
                    <br>
                    <input type="text" name="descripcion" placeholder="descripcion">
                    <br><br>
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

            </div>
            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</body>
</html>