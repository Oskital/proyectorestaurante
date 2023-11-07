<?php







session_start();
    function conexionBD($cadena_conexion,$administrador,$pw){
        
        $bd= new PDO($cadena_conexion,$administrador,$pw);
        return $bd;

    }

    function consultarUsuario ($usuario,$clave,$bd) {

        $sql = "SELECT COUNT(*) FROM restaurante.tabla_restaurantes WHERE NOMBRE='{$usuario}' AND CLAVE='{$clave}'";
        $existeLogin=$bd->query($sql);
        $numFilas = $existeLogin->fetchColumn();

        return $numFilas;
    }

    function consultarCategoria($bd, $nombreCategoria) {
        $sql = "SELECT ID_CATEGORIA FROM restaurante.tabla_categorias WHERE NOMBRE = '$nombreCategoria'";
        $idCategorias = $bd->query($sql);
        $idCategoria = $idCategorias->fetchColumn();
    
        // Guarda el resultado en una variable de sesión
        $_SESSION['idCategoria'] = $idCategoria;
    
        return $idCategoria;
    }

    function mostrarProductos($bd, $idCategoria) {
        $sql = "SELECT NOMBRE, ID_PRODUCTO FROM restaurante.tabla_productos WHERE TABLA_CATEGORIAS_ID_CATEGORIA = '$idCategoria'";
        $listaProductos = $bd->query($sql);
    
        while ($producto = $listaProductos->fetch()) {
            echo '<div>';
            echo '<h3>' . $producto['NOMBRE'] . '</h3>';
            echo '<form method="post" action="agregar_al_carrito.php">';
            echo '<input type="hidden" name="nombreProducto" value="' . $producto['NOMBRE'] . '">';
            echo '<button type="submit" name="agregarCarrito">Agregar al carrito</button>';
            echo '</form>';
            echo '</div>';
    }
         }
        
         function obtenerNuevoIDPedido($bd) {
            // Realiza una consulta SQL para obtener el próximo ID de pedido disponible
            $sql = "SELECT MAX(ID_PEDIDO) FROM tabla_pedidos";
            $result = $bd->query($sql);
            $ultimoID = $result->fetchColumn();
            
            // Si no hay pedidos previos, inicia desde el ID 1; de lo contrario, incrementa el último ID
            $nuevoID = ($ultimoID === false) ? 1 : $ultimoID + 1;
            
            return $nuevoID;
        }

?>