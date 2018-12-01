<?php

    class MesaControlador{
        public static function ctrMostrarMesa(){
            $tabla = "Mesa";
            $resultado = MesaModelo::mdlMostrarMesas($tabla);            
            return $resultado;
        }
        public static function ctrVerDetalleMesa($nro_mesa){
            $resultado = MesaModelo::verDetalleMesa($nro_mesa);
            return $resultado;
        }
    }
  
?>
