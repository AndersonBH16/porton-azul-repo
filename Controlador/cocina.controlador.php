<?php
    
    class CocinaControlador{
        public static function ctrMostrarCocina(){
            $respuesta = CocinaModelo::mdlMostrarCocina();
            return $respuesta;
        }
        
        public static function ctrAtenderPedido($numPedido){
            $respuesta = CocinaModelo::mdlAtenderPedido($numPedido);
            return $respuesta;
        }
    }    
?>
