<?php

// Verifico si el formulario fue posteado
if (isset($_POST['envio_edit'])) {
    
    $prod_new = $_POST['produc_name']; // -> capruto el nuevo nombre del producto

    $count_new = $_POST['cantidad_name']; // -> capturo la nueva contidad del producto

    //Extructuro la consulta sql tipo UPDATE para actualizar el producto respectivo segun el id
    $stmt = $con->query("UPDATE productos SET producto = '$prod_new', cantidad = '$count_new' WHERE id_p = '$id_p' /* -> se actualiza segun el id proporcionado en el archivo incluido */");
    
    //validar si se ejecuto o no la consulta
    if ($stmt) {
        ?>
        <!--Si se ejecuta la consulta exitosamente mostrara un mensaje al usuario-->
        <div class="alert alert-success" role="alert">
            Se actualizo su producto exitosamente
        </div>
        <?php
    }else{
        //Si no se ejecuta la consulta exitosamente mostrara un mensaje de error al usuario
        ?>
        <div class="alert alert-danger" role="alert">
            Lo sentimos hubo un error en el sistema
        </div> 
      <?php
    }

}

?>