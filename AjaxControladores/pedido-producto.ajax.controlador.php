<?php
require_once '../Modelo/pedido.modelo.php';
require_once '../Controlador/pedido.controlador.php';

class PedidoProductoAjaxControlador{
    public $array_pedido_producto;

    public function crearPedidoProducto(){
        $array_pedido_producto = $this->array_pedido_producto;

        $respuesta = PedidoControlador::ctrCrearPedidoProducto($array_pedido_producto);
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nuevoPedidoProducto = new PedidoProductoAjaxControlador();
    $nuevoPedidoProducto->array_pedido_producto = $_POST['misPedidos'];
    $nuevoPedidoProducto->crearPedidoProducto();
}
?>