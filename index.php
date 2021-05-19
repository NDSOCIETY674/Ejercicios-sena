<?
    //Se incluye la configuracion de la base de datos (conexion a mysql)
    require('./models/db_config.php'); // -> path de la ubicacion del archivo a incluir
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
            include('./components/head.controller.php'); // -> path de la ubicacion del archivo a incluir
        ?>
    </head>
    <body>
        <div class="container vh-100">
            <div class="row justify-contnet-center h-100">
                <div class="col-md-12 align-self-start text-center mt-5">
                    <!--Boton para redireccionar al crear un nuevo producto-->
                    <a href="./view/view_create_product.php" class="btn btn-outline-success mb-4">
                        Crear producto
                        <i class="fas fa-plus"></i>
                    </a>
                    <?php
                        // Componente que trae la logica de la tabla donde muestra los productos
                        include('./components/tables.component.php'); // -> path de la ubicacion del archivo a incluir
                    ?>
                </div>
            </div>
        </div>

        <?php
            //Se incluye un componente para no repetir e volver a traer los scripts de bootstrap
            include('./components/footer.controller.php'); // -> path de la ubicacion del archivo a incluir
        ?>
    </body>
</html>