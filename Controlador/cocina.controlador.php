<?php
    
    class CocinaControlador{
        public static function ctrMostrarCocina(){
            $respuesta = CocinaModelo::mdlMostrarCocina();
            return $respuesta;
        }
    }    
?>
