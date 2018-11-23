<?php
    require_once "conexion.php";
    
    class MenuModelo{
        public static function mdlMostrarMenu($tabla, $columna, $dato, $orden){
            if($dato==null){
                $consulta = "SELECT *
                            FROM $tabla JOIN categoria_producto 
                            ON producto.categoria_producto_id_categoria_producto = categoria_producto.id_categoria_producto
                            ORDER BY $orden ASC";
                $statement = Conexion::Conectar()->prepare($consulta);
                $statement->execute();
                return $statement->fetchAll();
            }else{
                $consulta = "SELECT * 
                            FROM $tabla JOIN categoria_producto 
                            ON producto.categoria_producto_id_categoria_producto = categoria_producto.id_categoria_producto 
                            WHERE $columna = :id";
                $statement = Conexion::Conectar()->prepare($consulta);
                $statement->bindParam(":id", $dato, PDO::PARAM_STR);
                $statement->execute();
                return $statement->fetch();
            }
            $statement->close();
            $statement = null;
        }
    }
    
?>