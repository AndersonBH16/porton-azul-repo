<?php
    require_once '../Controlador/menu.controlador.php';
    require_once '../Controlador/pedido.controlador.php';
    require_once '../Modelo/menu.modelo.php';
   
    class ajaxMenu{
        
        public $id_producto;
//        public $cantidad_productos;
        
        public function ajaxMostrarMenu(){
            
            if($this->id_producto == ""){                
               $columna = null;
               $dato = null;
               $orden = "id_producto";
               $resultado = MenuControlador::ctrMostrarMenu($columna, $dato, $orden);
               echo json_encode($resultado);
            }else{
                $columna = "id_producto";
                $dato = $this->id_producto;
                $orden = null;                
                $resultado = MenuControlador::ctrMostrarMenu($columna, $dato, $orden);
                echo json_encode($resultado);                                
            }
        }
        
        public function ajaxContadorProductos(){
            $contador_productos = $this->cantidad_productos;
            echo "<script>alert($contador_productos);</script>";
            PedidoControlador::ctrCrearPedidoProducto($contador_productos);
        }
    }
    
    if(isset($_POST["id_producto"])){        
        $producto = new ajaxMenu();
        $producto->id_producto = $_POST["id_producto"];
        $producto->ajaxMostrarMenu();
    }
    
    if(isset($_POST["contador_productos"])){
        echo "a ver: ".$_POST["txt_cantidad"];
        echo "a ver: ".$_POST["txt_idProducto"];
        $contador_producto = new ajaxMenu();
        $contador_producto->cantidad_productos = $_POST["contador_productos"];        
        $contador_producto->ajaxContadorProductos();
    }
?>