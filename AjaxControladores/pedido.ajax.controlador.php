<?php
    require_once '../Modelo/pedido.modelo.php';
    require_once '../Controlador/pedido.controlador.php';

    class PedidoAjaxControlador{
        public $idMozo;
        public $idMesa;
        public $llevar;
        public $detalle;
        public $total;
        
        public function crearPedido(){
            $id_mozo = $this->idMozo;
            $id_mesa = $this->idMesa;
            $llevar = $this->llevar;
            $detalle = $this->detalle;
            $total = $this->total;
            
            $respuesta = PedidoControlador::ctrCrearPedido($id_mozo,$id_mesa,$llevar,$detalle,$total);
            echo json_encode($respuesta);
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
?>