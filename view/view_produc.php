<?
    //Se instancia el archivo de conexion
    require('../models/db_config.php');
    //Atrapo el parametro por la url (GET)
    $id_p = $_GET['id'];
    //Instancio la clase conexion
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
                <div class="col-md-12 align-self-center text-right">
                    <a href="../index.php" class="btn btn-outline-link p-0">
                        <i class="fas fa-arrow-left fa-2x"></i>
                    </a>
                </div>
                    <?php
                        //Instancio la consulta para traer los datos segun el id proporcionado
                        $stmt = $con->query("SELECT * FROM productos WHERE id_p = $id_p" /* -> consulta que devolvera solo un objeto segun el id proporcionado */) or die(mysqli_error());
                        
                        //Bucle que recorrera segun la consulta y combertirla en arrable para llamar las posiciones
                        while ($row = mysqli_fetch_array($stmt)) {
                            ?>
                            <div class="col-md-6">
                                <h2 class="mb-3">Vecinos S.A.S</h2>

                                <h4 class="mb-3">
                                Nombre del producto: <?php echo $row['producto'] // -> Mostrara el nombre del producto ?>
                                </h4>

                                <h4>
                                Cantidad del producto: <?php echo $row['cantidad'] // -> Mostrara la cantidad del producto ?>
                                </h4>

                            </div>
                            <div class="col-md-6">
                                <!--Formulario para procesar la edicion de un registro-->
                                <form action="#" method="post">
                                        <div class="mb-3">
                                            <label for="producto" class="form-label">Ingrese el nombre del producto</label>
                                            <input type="text" class="form-control" id="producto" placeholder="EJ: arroz..." name="produc_name" value="<?php echo $row['producto'] // -> mustra y tiene como valor principal el que trae de la base de datos si no se cambia ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cantidad" class="form-label">Ingrese el nombre del producto</label>
                                            <input type="number" class="form-control" id="cantidad" placeholder="ingrese la" name="cantidad_name" value="<?php echo $row['cantidad'] // -> mustra y tiene como valor principal el que trae de la base de datos si no se cambia ?>">
                                        </div>
                                        <!--Boton que hara el posteo del fomulario-->
                                        <button class="btn btn-warning btn-block w-100 mb-3" type="submit" name="envio_edit">
                                            Editar
                                        </button>
                                </form>
                                <!--Al eliminar un objeto se instancia un formulario para el posteo de la solicitud-->
                                <form action="../controller/delete.controller.php?id=<?php echo $id_p // -> Se manda como parametro el id para eliminarlo segun su indicativo en la base de datos ?>" method="post">
                                    <button class="btn btn-danger text-right" type="submit" name="delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                                <?php include('../controller/edit.controller.php') // Instancia del archivo para el control del formulario ?>
                            </div>
                            <?php
                        }
                    ?>
            </div>
        </div>

        <?php
            //Se incluye un componente para no repetir e volver a traer los scripts de bootstrap
            include('../components/footer.controller.php');
        ?>
    </body>
</html>