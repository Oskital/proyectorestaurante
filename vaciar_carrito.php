<?php
session_start();

if (isset($_POST['vaciarCarrito'])) {
    unset($_SESSION['carrito']);
}

// Redirige al usuario de vuelta a la página del carrito o a donde desees
header('Location: ver_carrito.php'); 
exit();
?>
