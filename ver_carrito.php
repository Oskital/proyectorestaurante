<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

require 'bd.php';
$bd = conexionBD('mysql:dbname=restaurante;host=127.0.0.1',"root","");
$nombreProducto="";
// Verificar si el carrito existe en la sesión
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    // Itera a través de los productos en el carrito y muestra su información
    foreach ($_SESSION['carrito'] as $nombreProducto => $cantidad) {
        // Realiza una consulta SQL o accede a la base de datos para obtener los detalles del producto
        // Supongamos que obtienes el nombre del producto de la base de datos y lo almacenas en $nombreProducto
        
        // Muestra el nombre del producto
        echo 'Nombre del producto: ' . $nombreProducto .' // Cantidad: ' . $cantidad . '<br>';
        
        // Aquí puedes mostrar más detalles del producto si es necesario
    }
} else {
    // Si el carrito está vacío, muestra un mensaje adecuado
    echo 'El carrito está vacío.';
}

?>
<br>
<a href="productos.php">Catálogo <?php echo $nombreProducto?></a>
<br><br>
<a href="categorias.php">Categorias</a>
<br><br>

<form method="post" action="guardar_carrito.php">
    <input type="submit" name="guardarCarrito" value="Tramitar pedido">
</form>
<br><br>
<form action="vaciar_carrito.php" method="post">
    <input type="submit" name="vaciarCarrito" value="Vaciar Carrito">
</form>

</body>
</html>

