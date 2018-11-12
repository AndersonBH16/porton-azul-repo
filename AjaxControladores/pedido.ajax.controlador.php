<?php
    require_once '../Modelo/pedido.modelo.php';
    require_once '../Controlador/pedido.controlador.php';

    class PedidoAjaxControlador{
        public $idMozo;
        public $idMesa;
        public $llevar;
        public $detalle;
        public $total;
        
        public $id_pedido;
        public $array_pedido_producto;
        
        public function crearPedido(){
            $id_mozo = $this->idMozo;
            $id_mesa = $this->idMesa;
            $llevar = $this->llevar;
            $detalle = $this->detalle;
            $total = $this->total;
            
            $respuesta = PedidoControlador::ctrCrearPedido($id_mozo,$id_mesa,$llevar,$detalle,$total);
            echo json_encode($respuesta);
        }
        
        public function crearPedidoProducto(){
            $id_pedido = $this->id_pedido;
            $array_pedido_producto = $this->array_pedido_producto;
            
            $respuesta = PedidoControlador::ctrCrearPedidoProducto($id_pedido, $array_pedido_producto);
        }
    }

    if(isset($_POST["pedido_total"])){
        $nuevoPedido = new PedidoAjaxControlador();        
        $nuevoPedido->idMozo = $_POST["pedido_id_mozo"];
        $nuevoPedido->idMesa = $_POST["pedido_id_mesa"];
        $nuevoPedido->llevar = $_POST["pedido_llevar"];
        $nuevoPedido->detalle = $_POST["pedido_detalle"];
        $nuevoPedido->total = $_POST["pedido_total"];
        $nuevoPedido->crearPedido();
    }
    
    if(isset($_POST["pp_id_ultimoPedido"])){
        $nuevoPedidoProducto = new PedidoAjaxControlador();
        $nuevoPedidoProducto->id_pedido = $_POST["pp_id_ultimoPedido"];
        $nuevoPedidoProducto->array_pedido_producto = $_POST["pp_datos_pedido_producto"];
        $nuevoPedidoProducto->crearPedidoProducto();
        echo "es:" .$_POST["pp_id_ultimoPedido"].$_POST["pp_datos_pedido_producto"];
    }
?>