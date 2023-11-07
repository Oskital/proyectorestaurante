<?php

                require 'bd.php';
                $bd = conexionBD('mysql:dbname=restaurante;host=127.0.0.1',"root","");



                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['categoria'])) {
                    $nombreCategoria = $_POST['categoria'];

                    $idCategoria=consultarCategoria($bd,$nombreCategoria);

                    $url = "productos.php?ID_CATEGORIA='{$idCategoria}'";
                    header("Location:$url");
                    
                }

                
                


?>