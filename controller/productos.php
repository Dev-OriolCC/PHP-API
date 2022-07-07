<?php
    header('Content-Type: application/json');

    // Controller para API REST
    require_once "../config/conexion.php";
    require_once "../models/Productos.php";

    // Coger solicutudes de la URI
    $body = json_decode(file_get_contents("php://input"), true);
    //
    $producto = new Producto();

    switch ($_GET['opcion']) {
        // Coger todos los productos de la BD y devolver en formato JSON
        case 'getAll':
            $datos = $producto->get_producto();
            echo json_encode($datos);
            break;
        
        // Obtener un producto en particular de la BD respecto a su ID
        case 'get':
            $datos = $producto->get_producto_id($body['id']);
            echo json_encode($datos);
            break;
        
        // Ingresar un producto en la BD
        case 'insert':
            $datos = $producto->insert_producto($body['nombre'], $body['marca'], $body['descripcion'], $body['precio']);
            echo json_encode("Producto Insertado (👉ﾟヮﾟ)👉");
            break;

        case 'update':
            $datos = $producto->update_producto($body['id'], $body['nombre'], $body['marca'], $body['descripcion'], $body['precio']);
            echo json_encode("Producto Actualizado OwO");
            break;

        case 'delete':
            $datos = $producto->delete_producto($body['id']);
            echo json_encode("Producto Eliminado ᓚᘏᗢ");
            break;

        case 'kill':
            $datos = $producto->kill_producto($body['id']);
            echo json_encode("Producto Eliminado de la BD ");
            break;

        case 'getSucursales':
            $datos = $producto->get_sucursales();
            echo json_encode($datos);
            break;
    }

?>