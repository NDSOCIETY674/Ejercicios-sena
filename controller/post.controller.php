<?php

//INSTANCIA QUE VALIDA SI EL FORMULATIO FUE POSTEADO
if (isset($_POST['envio'] /* -> variable para la validacion */)) {
    
    $prod_new = $_POST['produc_name']; // -> captura del campo de nombre del producto

    $count_new = $_POST['cantidad_name']; // -> captura del campo de cantidad del producto

    if ($prod_new === "" || $count_new === "" /* -> valida si ingresa algun valor o esta vacio */) {
        ?>
        <!--Si es vacio retornara al usuario una alerta para que complete los campos-->
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Tranquilo sin afanes!</strong> revisa te hace falta un campo.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        // Retorna el proceso y invalida el formulario
        return;
    }

    // Variable que almacena la consulta y la ejecuta
    $stmt = $con->query("INSERT INTO productos (producto, cantidad) VALUES ('$prod_new', '$count_new') /* -> consulta de tipo insert a la tabla producto donde instancia el nombre y la cantidad */");

    if ($stmt /* -> si se ejecuta la consulta con exito retornara una alerta al usuario indicando que salio exitoso el proceso */) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Se creo con exito!</strong> el producto <?php echo $prod_new ?> con la cantidad de <?php echo $count_new?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
    }else{
        //Retornara una alerta al usuario indicandole que fallo la consulta
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hubo un error!</strong> lo sentimos no podemos completar tu transaccion :(.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
    }
    
}


?>