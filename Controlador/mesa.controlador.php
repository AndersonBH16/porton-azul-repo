<?php

    class MesaControlador{
        public static function ctrMostrarMesa(){
            $tabla = "mesa";
            $resultado = MesaModelo::mdlMostrarMesas($tabla);            
            return $resultado;
        }
        public static function ctrVerDetalleMesa($nro_mesa){
            $resultado = MesaModelo::verDetalleMesa($nro_mesa);
            return $resultado;
        }
    }
  
?>
