<?php
/**
 * Created by PhpStorm.
 * User: manuelperez
 * Date: 12/19/18
 * Time: 3:09 PM
 */

    class ReporteVentasControlador{
        public static function ctrMostrarReporte(){
            $respuesta = ReporteVentasModelo::mdlMostrarReporte();
            echo $respuesta;
        }
    }
?>