<?php

    require_once 'Controlador/plantilla.controlador.php';
    
    require_once 'Controlador/usuario.controlador.php';
    require_once 'Controlador/mesa.controlador.php';
    require_once 'Controlador/menu.controlador.php';
    require_once 'Controlador/pedido.controlador.php';
    require_once 'Controlador/personal.controlador.php';
    require_once 'Controlador/gestion_usuario.controlador.php';
    
    require_once 'Modelo/usuario.modelo.php';
    require_once 'Modelo/mesa.modelo.php';
    require_once 'Modelo/menu.modelo.php';
    require_once 'Modelo/pedido.modelo.php';
    require_once 'Modelo/personal.modelo.php';
    require_once 'Modelo/gestion_usuario.modelo.php';
    

    $plantillaNueva = new PlantillaControlador();
    $plantillaNueva->ctrPlantilla();

?>
