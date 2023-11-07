!
<?php 


require 'bd.php';

$bd = conexionBD('mysql:dbname=restaurante;host=127.0.0.1',"root","");
$idCategoria = $_SESSION['idCategoria'];


session_start(); 

if (isset($_POST['agregarCarrito'])) {
    $nombreProducto = $_POST['nombreProducto'];

    // Verificar si el carrito ya existe en la sesión
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    // Verificar si el producto ya está en el carrito

    if (array_key_exists($nombreProducto, $_SESSION['carrito'])) {

        // Si el producto ya está en el carrito, incrementa la cantidad
        $_SESSION['carrito'][$nombreProducto]++;
        
    } else {
        // Si el producto no está en el carrito, añádelo con cantidad 1

        $_SESSION['carrito'][$nombreProducto] = 1;
        
    }

    // Redirige de vuelta al catálogo de productos o a la página del carrito
    
    header('Location: productos.php'); 
    exit();
}

?>