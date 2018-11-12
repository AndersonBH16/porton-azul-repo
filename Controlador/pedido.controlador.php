<?php
   
    class PedidoControlador{
        
        public static $id_producto;
        public static $cantidad;
        
        public static function ctrObtenerIdUltimoPedido(){
            $respuesta = PedidoModelo::obtenerIdUltimoPedido();
            return $respuesta;
        }
        
        public static function ctrCrearPedido($id_mozo,$id_mesa,$llevar,$detalle,$total){
            $respuesta = PedidoModelo::mdlCrearPedido($llevar, $detalle, $total, $id_mozo, $id_mesa);
            return $respuesta;
        }
        
        public static function ctrCrearPedidoProducto($id_pedido, $array_pedido_producto){
            $respuesta = PedidoModelo::mdlCrearPedidoProducto($id_pedido, $array_pedido_producto);
            return $respuesta;
        }
    }  
?>