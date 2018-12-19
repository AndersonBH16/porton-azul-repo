<?php
    require_once '../Controlador/mesa.controlador.php';
    require_once '../Modelo/mesa.modelo.php';
    
    class MesaAjaxControlador{
        public $id_mesa;
        public $estado_mesa;

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
            $idMesa = $this->id_mesa;
            $estadoMesa = $this->estado_mesa;
            $resultado = MesaControlador::ctrEnviarCaja($idMesa, $estadoMesa);
            echo $resultado;
        }
    }
    
        
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['flag'])){
            $mesa = new MesaAjaxControlador();
            $mesa->ctrAjaxVerMesa();            
        }else if(isset($_POST['datos'])){
            $mesa = new MesaAjaxControlador();
            $mesa->id_mesa = $_POST['datos']['id_mesa'];
            $mesa->estado_mesa = $_POST['datos']['estado_mesa'];
            $mesa->ctrAjaxEnviarCaja();
        }else{
            $mesa = new MesaAjaxControlador();
            $mesa->ctrAjaxAgregarMesa();            
        }
    }    
    
?>

