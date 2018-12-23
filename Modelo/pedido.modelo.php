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
        
        public static function mdlCrearPedidoProducto($array_pedido_producto){
            foreach ($array_pedido_producto as $fila) {
                $producto_id = $fila["producto_id"];
                $producto_cantidad = $fila["producto_cantidad"];
                $pedido_id = $fila["pedido_id"];

                $consulta = "CALL sp_crear_pedido_producto('$producto_cantidad', '$pedido_id', '$producto_id')";
                $statement = Conexion::Conectar()->prepare($consulta);

                if($statement->execute()){
                    $flag = "ok";
                }
                else{
                    $flag = "error";
                }
                echo $flag."\n";
            }
            return $flag;
            $statement->close();
            $statement = null;
        }
    }
?>

