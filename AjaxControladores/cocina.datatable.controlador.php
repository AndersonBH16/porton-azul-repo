<?php
    require_once '../Controlador/cocina.controlador.php';
    require_once '../Modelo/cocina.modelo.php';
   
    class TablaCocina{
        public function mostrarTablaCocina(){
            
            $resultado_tablaCocina = CocinaControlador::ctrMostrarCocina();
            
            $tablaCocina = "";

            foreach($resultado_tablaCocina as $key => $value){
                $botones = '<div class=\"btn-group\"><button class=\"btn btn-success\">'.$value["estado"].'</button></div>';
                $tablaCocina .= '{
                                  "item" : "'.($key+1).'",
                                  "plato" : "'.$value["nombre_producto"].'",
                                  "cantidad" : "'.$value["cantidad"].'",
                                  "detalle" : "'.$value["detalle"].'",
                                  "nro_mesa" : "'.$value["numero_mesa"].'",
                                  "nombre_mozo" : "'.$value["nombre_personal"].'",
                                  "acciones" : "'.$botones.'"
                              },';
            }
               
            $tablaCocina = substr($tablaCocina, 0, strlen($tablaCocina)-1);
            echo '{"data":['.$tablaCocina.']}';      
        }
    }    
    
    $tablaCocina = new TablaCocina();
    $tablaCocina->mostrarTablaCocina();
