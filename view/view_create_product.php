<?
    // Se instancia el archivo de conexion
    require('../models/db_config.php'); // -> path del archivo a incluir
    //Instancia de la clase de conexion POO -> Programacion Orientada a Objetos
    $con = New Conexion();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vecino S.A.S | APP</title>
        <?php
            //Se incluye un componente para no repetir e volver a traer los styles de bootstrap
            include('../components/head.controller.php');
        ?>
    </head>
    <body>
        <div class="container vh-100">
            <div class="row justify-contnet-center h-100">
                <div class="col-md-6 align-self-center">
                    <a href="../index.php" class="btn btn-outline-link p-0 mb-5">
                        <i class="fas fa-arrow-left fa-2x"></i>
                    </a>
                    <form method="post">
                        <div class="mb-3">
                            <label for="producto" class="form-label">Ingrese el nombre del producto</label>
                            <input type="text" class="form-control" id="producto" placeholder="EJ: arroz..." name="produc_name">
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Ingrese la cantidad del producto</label>
                            <input type="number" class="form-control" id="cantidad" placeholder="ingrese la cantidad de su producto..." name="cantidad_name">
                        </div>
                        <button class="btn btn-success btn-block w-100 mb-3" type="submit" name="envio">
                            Crear
                        </button>
                    </form>
                </div>
                <div class="col-md-6 align-self-center">
                    <?php  
                        //Archivo que prosesa el formulario al momento de ser enviado
                        include('../controller/post.controller.php');
                    ?>
                </div>
            </div>
        </div>

        <?php
            //Se incluye un componente para no repetir e volver a traer los scripts de bootstrap
            include('../components/footer.controller.php');
        ?>
    </body>
</html>