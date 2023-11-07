
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <?php require 'bd.php'; 

    $bd = conexionBD('mysql:dbname=restaurante;host=127.0.0.1',"root","");
    
    ?>

    <style>

    div {
        text-align: center;
    }

    </style>
</head>




        <body> 
            <div>
        <h2>Selecciona una categoría:</h2>
    <form method="POST" action="http://localhost/Actividades/ProyectoRestaurante/consultar_categoria.php">
        <button type="submit" name="categoria" value="Carnes">Carne</button>
        <button type="submit" name="categoria" value="Pescados">Pescado</button>
        <button type="submit" name="categoria" value="Verduras">Verduras</button>
        <button type="submit" name="categoria" value="Bebidas">Bebidas</button>
    </form>
            </div>
            <br><br>
            <div>

            <form action="http://localhost/Actividades/ProyectoRestaurante/cerrarsesion.php" method="POST">
            <input type="submit" name="Enviar" value="Cerrar sesión">
            </form>
            </div>
           



        </body>




</html>
