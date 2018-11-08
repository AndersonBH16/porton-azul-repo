<?php
    require_once '../Controlador/menu.controlador.php';
    require_once '../Modelo/menu.modelo.php';
   
    class TablaMenu{
        public function mostrarTablaMenu(){
            $columna = null;
            $dato = null;
            $orden = "id_producto";
            
            $resultado_tablaMenu = MenuControlador::ctrMostrarMenu($columna, $dato, $orden);
            
            $tablaMenu = "";

            foreach($resultado_tablaMenu as $key => $value){
                $botones = '<div class=\"btn-group\"><button class=\"btn btn-warning\"><i class=\"fa fa-pencil\"></i></button><button class=\"btn btn-danger\"><i class=\"fa fa-times\"></i></button></div>';
                $tablaMenu .= '{
                                  "item" : "'.($key+1).'",
                                  "estado" : "'.$value["estado"].'",
                                  "nombre_producto" : "'.$value["nombre_producto"].'",
                                  "descripcion_producto" : "'.$value["descripcion_producto"].'",
                                  "precio" : "'.$value["precio"].'",
                                  "nombre_categoria" : "'.$value["nombre_categoria"].'",
                                  "acciones" : "'.$botones.'"
                              },';
            }
               
            $tablaMenu = substr($tablaMenu, 0, strlen($tablaMenu)-1);
            echo '{"data":['.$tablaMenu.']}';      
        }
    }    
    
    $tablaMenu = new TablaMenu();
    $tablaMenu->mostrarTablaMenu();