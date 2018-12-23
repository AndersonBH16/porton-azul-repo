<?php
    class PersonalControlador{
        public static function ctrMostrarPersonalPerfil(){            
            $respuesta = PersonalModelo::mdlMostrarPersonalPerfil();            
            return $respuesta;
        }
        
        /*PERFILES Y CARGOS*/
        public static function ctrMostrarCargo(){
            $respuesta = PersonalModelo::mdlMostrarCargos();
            return $respuesta;
        }
        
        public static function ctrMostrarArea(){
            $respuesta = PersonalModelo::mdlMostrarArea();
            return $respuesta;
        }
        
        public static function ctrObtenerDatosPersonal($idPersonal){
            $respuesta = PersonalModelo::mdlObtenerDatosPersonal($idPersonal);
            echo $respuesta;
        }
    }
?>