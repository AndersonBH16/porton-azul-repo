<?php
    include_once 'conexion.php';
    
    class PedidoModelo{
        
        public static function obtenerIdUltimoPedido(){
            $consulta = "SELECT LAST_INSERT_ID()";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetch()[0];
        }
//
        public static function mdlCrearPedido($llevar, $detalle, $total, $id_mozo, $id_mesa){
            $consulta = "CALL sp_crear_pedido('$llevar','$detalle','$total','$id_mozo','$id_mesa')";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetch()[0];
            
            $statement->close();
            $statement = null; 
        }
        
        public static function mdlCrearPedidoProducto($id_pedido, $array_pedido_producto){
            
            $flag = false;
            foreach ($array_pedido_producto as $key => $value) {
                $consulta = "INSERT INTO PEDIDO_PRODUCTO(id_pedido_producto, cantidad, PEDIDO_id_pedido, PRODUCTO_id_producto) VALUES (null,'".$value["producto_cantidad"]."','$id_pedido','".$value["producto_id"]."')";
                $statement = Conexion::Conectar()->prepare($consulta);
                $statement->execute();
                
                $flag = true;
            }
            
            if($flag == true){
                return "ok";
            }else{                
                return "error";
            }
            
            $statement->close();
            $statement = null; 
        }
    }
?>

