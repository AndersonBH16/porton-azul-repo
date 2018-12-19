<?php

    class MesaControlador{
        public static function ctrMostrarMesa(){
            $tabla = "mesa";
            $resultado = MesaModelo::mdlMostrarMesas($tabla);            
            return $resultado;
        }

        public static function ctrVerDetalleMesa($nro_mesa){
            $resultado = MesaModelo::verDetalleMesa($nro_mesa);
            echo $resultado;
        }
        
        public static function ctrEnviarCaja($id_mesa, $estado_mesa){
            $resultado = MesaModelo::enviarCaja($id_mesa, $estado_mesa);
            return $resultado;
        }
    }
  
?>
