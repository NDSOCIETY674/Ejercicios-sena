<!--Instancia y componente para mostrar de forma grafica las consultas de la base de datos-->
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Tools</th>
        </tr>
    </thead>
    <?php
        //Como ya se incluye en el index.php el archivo de conexion solo instanciamos la clase para tener la conexion de la base de datos
        $con = New Conexion(); // INSTANCIA POO -> Programacion Orientada a Objetos

        //instanciamos la query o consulta mysql con la extension mysqli en la clase de Conexion()
        $stmt = $con->query(
            'SELECT * FROM `productos`' // -> consulta que trae todos los productos
        );

        //Bucle que recorrera segun la consulta y combertirla en arrable para llamar las posiciones
        while ($row = mysqli_fetch_array($stmt) ) {     
    ?>
        <tbody>
            <tr>
                <th scope="row">
                    <?php
                        //Traera el id del producto
                        echo $row['id_p'];
                    ?>
                </th>
                <td>
                    <?php 
                        //Traera el nombre del producto
                        echo $row['producto'];
                    ?>
                </td>
                <td>
                    <?php 
                        //Traera la cantidad del producto
                        echo $row['cantidad'];
                    ?>
                </td>
                <td>
                    <a class="btn btn-outline-link" href="./view/view_produc.php?id=<?php echo $row['id_p']; // -> para ver el producto unico se manda como parametro el id por la URL o metodo GET ?>">
                        <i class="far fa-eye"></i>
                    </a>
                    <!--Al eliminar un objeto se instancia un formulario para el posteo de la solicitud-->
                    <form action="./controller/delete.controller.php?id=<?php echo $row['id_p']; // -> Se manda como parametro el id para eliminarlo segun su indicativo en la base de datos ?>" method="post">
                        <button class="btn btn-danger text-right" type="submit" name="delete">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    <?php
        // Fin del while (Bucle para recorrer la data)
        }
    ?>
</table>
