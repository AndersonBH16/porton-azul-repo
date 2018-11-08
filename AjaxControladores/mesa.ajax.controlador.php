<?php
    require_once '../Controlador/mesa.controlador.php';
    require_once '../Modelo/mesa.modelo.php';
    
    class MesaAjaxControlador{
        public function ctrAjaxAgregarMesa(){
            $tabla = "Mesa";
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
            return $numeroMesa;
        }
    }
    
        
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$mesa = new MesaAjaxControlador();
        $mesa->ctrAjaxAgregarMesa();
    } 
    
?>

