<?php
    
    class MenuControlador{
        public static function ctrMostrarMenu($columna, $dato, $orden){           
            $tabla = "producto";
            $respuesta = MenuModelo::mdlMostrarMenu($tabla, $columna, $dato, $orden);
            return $respuesta;
        }
    }    
?>