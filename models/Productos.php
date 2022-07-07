<?php
    // Archivo con queries necesarios para los productos de la base de datos
    class Producto extends Conectar {

        // Coger todos los productos de la base de datos con estado 1
        public function get_producto() {
            $conectar = parent::connection();
            parent::set_names();
            $sql = "SELECT id, nombre, marca, descripcion, precio FROM productos WHERE estado = 1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        // Coger un producto en particular de la base de datos - Mediante ID
        public function get_producto_id($id) {
            $conectar = parent::connection();
            parent::set_names();
            $sql = "SELECT id, nombre, marca, descripcion, precio FROM productos WHERE estado = 1 AND id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);

            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // Metodo para ingresar un producto en la base de datos
        public function insert_producto($nombre, $marca, $description, $precio) {
            $conectar = parent::connection();
            parent::set_names();
            $sql = "INSERT INTO productos(id, nombre, marca, descripcion, precio, estado) VALUES (NULL,?,?,?,?,'1')";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $marca);
            $sql->bindValue(3, $description);
            $sql->bindValue(4, $precio);
            
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        // Actualizar datos de un producto de la base de datos
        public function update_producto($id, $nombre, $marca, $description, $precio) {
            $conectar = parent::connection();
            parent::set_names();
            $sql = "UPDATE productos SET nombre=?, marca=?, descripcion=?, precio=? WHERE id = ?";
            // UPDATE productos SET nombre=[value-2], marca=[value-3], descripcion=[value-4], precio=[value-5], estado=[value-6] WHERE 1
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $marca);
            $sql->bindValue(3, $description);
            $sql->bindValue(4, $precio);
            $sql->bindValue(5, $id);
            
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        // Eliminar un product de la base de datos
        public function delete_producto($id) {
            $conectar = parent::connection();
            parent::set_names();
            $sql = "UPDATE productos SET estado=0 WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);          
        }

        public function kill_producto($id) {
            $conectar = parent::connection();
            parent::set_names();
            $sql = "DELETE FROM productos WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_sucursales() {
            $conectar = parent::connection();
            parent::set_names();
            $sql = "SELECT * FROM sucursales";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }


?>