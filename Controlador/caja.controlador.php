<?php
    
    class CajaControlador{
        public static function cerrarMesa($nro_mesa){
            $respuesta = CajaModelo::cerrarMesa($nro_mesa);
            return $respuesta;
        }
    }
    
?>