<?php
    
    class CajaControlador{
        public static function cerrarMesa($nro_mesa){
            $respuesta = CajaModelo::cerrarMesa($nro_mesa);
            return $respuesta;
        }
        
        public static function verDetalleMesaParaCaja($nro_mesa){
            $respuesta = CajaModelo::verDetalleMesaParaCaja($nro_mesa);
            echo $respuesta;
        }
    }
    
?>