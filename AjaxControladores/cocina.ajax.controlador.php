<?php

    require_once '../Controlador/cocina.controlador.php';
    require_once '../Modelo/cocina.modelo.php';
    
    class Cocina{
        public $nro_pedido_producto;
    
        public function atenderPedido(){
            $numPedido = $this->nro_pedido_producto;
            $respuesta = CocinaControlador::ctrAtenderPedido($numPedido);
                        
            if($respuesta['flagSP'] == "1"){
                return 1;
            }else{
                return 0;
            }            
        }
    }
    if(isset($_POST["nro_pedido_producto"])){
        $nuevaCocina = new Cocina();
        $nuevaCocina->nro_pedido_producto = $_POST["nro_pedido_producto"];
        $nuevaCocina->atenderPedido();
        
    }
?>