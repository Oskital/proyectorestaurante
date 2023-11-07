<?php
session_start();

require 'bd.php';

// Conecta a la base de datos
$bd = conexionBD('mysql:dbname=restaurante;host=127.0.0.1',"root","");


// Obtiene las credenciales del formulario
if(isset($_POST["Enviar"])){

    $usuario = $_POST["usuario"];
    $clave = $_POST["pw"];

    // Consulta SQL

    $numFilas = consultarUsuario($_POST["usuario"],$_POST["pw"],$bd);



    // Consulta la base de datos para verificar las credenciales
    if ($numFilas > 0) {
        // Credenciales válidas
        
        
        $carrito= array();
        $_SESSION['correoUsuario'] = $usuario."@gmail.com";
        $_SESSION['carrito'] = $carrito;
        

        header("Location: categorias.php"); // Redirige a la página principal



        
    } else {
        // Credenciales inválidas
        
        header("Location: login.html");
        
    }

    


}





   



?>