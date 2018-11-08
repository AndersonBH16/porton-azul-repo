<?php
    include_once 'conexion.php';
    
    class PedidoModelo{

        public static function mdlMostrarPedidoProducto($tabla, $columna, $dato){

        }
        
        public static function ultimoPedidoAgregado(){
            $consulta = "SELECT MAX(id_pedido) FROM Pedido";
            $statement = Conexion::Conectar()->prepare($consulta);
            $statement->execute();
            return $statement->fetch()[0];
        }
//        
//        public static function mdlMostrarPedido(){
//            $ultimo_pedido = PedidoModelo::ultimoPedidoAgregado();
//            $consulta = "SELECT * FROM Pedido WHERE id_pedido_producto = $ultimo_pedido";
//            $statement = Conexion::Conectar()->prepare($consulta);
//            $statement->execute();
//            return $statement->fetchAll();
//            
//            $statement->close();
//            $statement = null;
//        }
//
        public static function mdlInsertarPedido($llevar, $detalle, $id_cliente, $id_mesa){  
            $consulta = "INSERT INTO PEDIDO(llevar, detalle,PERSONAL_PERFIL_id_personal_perfil,MESA_id_mesa) VALUES ('$llevar', '$detalle', '$id_cliente', '$id_mesa')";
            $statement = Conexion::Conectar()->prepare($consulta);
            
            if($statement->execute()){                
                return "ok";
            }else{                
                return "error";
            }
                        
            $statement->close();
            $statement = null; 
        }
        
        public static function mdlCrearPedido(){
            $consulta = "INSERT INTO pedido_producto(id_pedido_producto, estado, cantidad, PEDIDO_id_producto, PRODUCTO_id_producto) VALUES ()";
            $statement = Conexion::Conectar()->prepare($consulta);
            
            if($statement->execute()){
                return "ok";
            }else{
                return "error";
            }
        }
        
    }
?>

