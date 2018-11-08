<?php
   
    class PedidoControlador{
        
        public static $id_producto;
        public static $cantidad;
        
        public static function ctrMostrarPedidoProducto($tabla){
            
        }
        
        public static function ctrInsertarPedido(){
            if(isset($_POST["btn_enviarPedido"])){
                $llevar = $_POST["rd_llevar"];
                $detalle = $_POST["txa_detalle"];
                $id_personal = $_POST["sel_mozo"];
                $id_mesa = $_POST["sel_mesa"];
                
                $subtotal = $_POST["nuevoTotalVenta"];
                $cantidad = $_POST["txt_cantidad"];
                $id_producto = $_POST["txt_idProducto"];
                
 //               $listar_productos = json_decode($_POST["lista_productos"], true);
                
                echo "llevar:".$llevar."det:".$detalle."id_pers".$id_personal."id_mesa: ".$id_mesa.$subtotal."cant:".$cantidad."id_produ:".$id_producto.');</script>';
                
//                PedidoControlador::$id_producto = $_POST["txt_idProducto"];
//                PedidoControlador::$cantidad = $_POST["txt_cantidad"];
                
//                $respuesta = PedidoModelo::mdlInsertarPedido($llevar, $detalle, $id_cliente, $id_mesa);
                
//                if($respuesta == "ok"){
//                    echo '<script>
//                            swal({
//                                type: "success",
//                                title: "¡El Pedido se ha enviado!",
//                                showConfirmButton: false,                                    
//                                }).then(function(result){
//                                if(result.value){
//                                        window.location = "pedido";
//                                }
//                            });
//                        </script>';
//                    //PedidoControlador::ctrCrearPedido();
//                }
            }
        }
        
//        public static function ctrCrearPedidoProducto($contador_productos){
//            $rep1 = PedidoControlador::$id_producto;
//            $rp2 = PedidoControlador::$cantidad;
//            
//            echo "ño pes: ".$rep1.$rp2;
//            //obteniendo los ids de los pedidos y cantidad
//            
//            for($i=0; $i<$contador_productos;$i++){
//                //$rpta = PedidoModelo::ultimoPedidoAgregado();
//               //echo "<script>alert('id del ultimo pedido agregado: '+".$rpta.");</script>";                
//            }           
//        }
    }
    
?>
