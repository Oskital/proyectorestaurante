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
$idCategoria = $_SESSION['idCategoria'];



mostrarProductos($bd,$idCategoria);
?>

<br><br>

<a href="ver_carrito.php">Ver Carrito</a>
<a href="categorias.php">Categorias</a>

<br><br>

<div>

            <form action="http://localhost/Actividades/ProyectoRestaurante/cerrarsesion.php" method="POST">
            <input type="submit" name="Enviar" value="Cerrar sesión">
            </form>
            </div>
</body>
</html>


