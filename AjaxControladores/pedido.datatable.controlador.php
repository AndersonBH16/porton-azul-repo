<?php

    include_once '../Controlador/menu.controlador.php';
    include_once '../Controlador/pedido.controlador.php';
    include_once '../Modelo/menu.modelo.php';
    include_once '../Modelo/pedido.modelo.php';
    
    class TablaPedidoProducto{
        
        public function ctrMostrarPedidoProducto(){
            
            $orden = "id_producto";
            $columna = null;
            $dato = null;
            
            $respuestaMenu = MenuControlador::ctrMostrarMenu($columna, $dato, $orden);
            $tablaPedidoProducto = "";
            
            foreach($respuestaMenu as $key => $value){                
                $botonPedir = '<button class=\"btn btn-success pedir recuperarBoton\" id=\"'.$value['id_producto'].'\">Pedir&nbsp;&nbsp;&nbsp;<i class=\"fa fa-check\"></i></button>';
                
                $tablaPedidoProducto .= '{
                                            "item" : "'.($key+1).'",                                  
                                            "nombre_producto" : "'.$value["nombre_producto"].'",
                                            "descripcion_producto" : "'.$value["descripcion_producto"].'",
                                            "precio" : "'.$value["precio"].'",
                                            "nombre_categoria" : "'.$value["nombre_categoria"].'",
                                            "pedir_producto":"'.$botonPedir.'"
                                        },';
            }           
            $tablaPedidoProducto = substr($tablaPedidoProducto, 0, strlen($tablaPedidoProducto)-1);
            echo '{"data":['.$tablaPedidoProducto.']}';
        }
    }
    
	$pedido = new TablaPedidoProducto();
        $pedido->ctrMostrarPedidoProducto();
    

?>