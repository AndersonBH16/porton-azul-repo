<?php

    class MesaControlador{
        public static function ctrMostrarMesa(){
            $tabla = "Mesa";
            $resultado = MesaModelo::mdlMostrarMesas($tabla);            
            return $resultado;
        }
    }
  
?>
