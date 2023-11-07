<?php
require 'bd.php';


if (isset($_POST['guardarCarrito'])) {
    // Verificar si el carrito existe en la sesión y no está vacío
    $idPedido=0;
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        try {
            $bd = conexionBD('mysql:dbname=restaurante;host=127.0.0.1',"root","");

            $idPedido = obtenerNuevoIDPedido($bd);
                $fechaActual = date('Y-m-d H:i:s');
                $sql = "INSERT INTO tabla_pedidos (ID_PEDIDO, RESTAURANTE, ESTADO, FECHA, TABLA_RESTAURANTES_ID_RESTAURANTE) VALUES ('$idPedido', 1,0,'$fechaActual',1)";
                $añadirPedido = $bd->query($sql);
            // Iterar a través de los productos en el carrito y guardarlos en la base de datos
            foreach ($_SESSION['carrito'] as $idProducto => $cantidad) {
                // Realiza una consulta SQL para guardar los datos del carrito en la base de datos
                $sql = "INSERT INTO tabla_detalles_pedidos (TABLA_PEDIDOS_ID_PEDIDO, TABLA_PRODUCTOS_ID_PRODUCTO, CANTIDAD) VALUES ('$idPedido','$idProducto','$cantidad')";
                $añadirDetallesPedido = $bd->query($sql);
                
            }

            // Limpia el carrito después de guardar los datos en la base de datos
            $_SESSION['carrito'] = array();

            // Redirige a una página de confirmación o a donde desees
            header('Location: confirmacion.php');
            exit();
        } catch (PDOException $e) {
            echo 'Error al guardar los datos del carrito: ' . $e->getMessage();
        }
    } else {
        echo 'El carrito está vacío. No se han guardado datos.';
    }


}



?>
