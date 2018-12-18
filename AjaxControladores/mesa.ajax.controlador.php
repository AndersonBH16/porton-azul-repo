<?php
    require_once '../Controlador/mesa.controlador.php';
    require_once '../Modelo/mesa.modelo.php';
    
    class MesaAjaxControlador{
        public $id_pedido;
        public function ctrAjaxAgregarMesa(){
            $tabla = "mesa";
            $resultado = MesaModelo::agregarMesa($tabla);
            $numeroMesa = MesaModelo::devolverNumeroMesa($tabla);
            echo $numeroMesa;
//            $estadoMesa = MesaModelo::devolverEstadoMesa($tabla);
//            $return = [];
//            $retorno = [
//                "idUltimaMesa" => $ultimaMesa,
//                "estadoMesa" => $estadoMesa
//            ];
//            array_push($return, $retorno);
//            return $numeroMesa;
        }
        
        public function ctrAjaxVerMesa(){
            $resultado = MesaControlador::ctrMostrarMesa();
            echo json_encode($resultado);
        }
        
        public function ctrAjaxEnviarCaja(){
            $idPedido = $this->id_pedido;
            $resultado = MesaControlador::ctrEnviarCaja($idPedido);
            echo $resultado;
        }
    }
    
        
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['flag'])){
            $mesa = new MesaAjaxControlador();
            $mesa->ctrAjaxVerMesa();            
        }else if(isset($_POST['id_pedido'])){
            $mesa = new MesaAjaxControlador();
            $mesa->id_pedido = $_POST['id_pedido'];
            $mesa->ctrAjaxEnviarCaja();
        }else{
            $mesa = new MesaAjaxControlador();
            $mesa->ctrAjaxAgregarMesa();            
        }
    }    
    
?>

