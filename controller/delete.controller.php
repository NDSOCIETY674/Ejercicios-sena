<?php
//Instancio el archivo para la conexion a la base de datos
require('../models/db_config.php');
// instancio la clase de conexion
$con = New Conexion();
    //Verifico que se haya posteado el formulario
    if (isset($_POST['delete'])) {
        //Atrapo la variable por el parametro get
        $id_p = $_GET['id'];

        //Estructuro la consulta de tipo delete para la eliminacion de registo del producto x

        $stmt_delete = $con->query("DELETE FROM productos WHERE id_p = '$id_p'" /* -> elimino donde (WHERE) se el id que proporcione al momento de la peticion */);

        //Si se ejecuta la consulta
        if ($stmt_delete) {
            ?>
                <script>
                //Solo realizara un scrip el cual redireccionara al index para volver a cargar los datos
                    location.href ='../index.php';
                </script>
            <?php
        }
        
    }

?>