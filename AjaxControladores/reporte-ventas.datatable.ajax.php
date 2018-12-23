<?php
/**
 * Created by PhpStorm.
 * User: manuelperez
 * Date: 12/19/18
 * Time: 3:05 PM
 */
    require_once '../Controlador/reporte-ventas.controlador.php';
    require_once '../Modelo/reporte-ventas.modelo.php';

    class TablaReporte{
        public function mostrarTablaReporte(){
            $resultado_tablaReporte = ReporteVentasControlador::ctrMostrarReporte();
            echo $resultado_tablaReporte;
        }
    }

    $tablaReporte = new TablaReporte();
    $tablaReporte->mostrarTablaReporte();
?>