<?php
    require_once '../Controlador/personal.controlador.php';
    require_once '../Modelo/personal.modelo.php';
    
    class TablaPersonal{
        public function mostrarTablaPersonal(){
            $resultado_tablaPersonal = PersonalControlador::ctrMostrarPersonalPerfil();
            
            $tablaPersonal = "";
            
            foreach($resultado_tablaPersonal as $key => $value){
                $botones = '<div class=\"btn-group\"><button id=\"'.$value["id_personal"].'\" class=\"btn btn-warning editarPersonal\" title=\"Editar\"><i class=\"fa fa-pencil\"></i></button><button id=\"'.$value["id_personal"].'\" class=\"btn btn-danger\"><i class=\"fa fa-times eliminarPersonal\" title=\"Eliminar\"></i></button></div>';
                $tablaPersonal .= '{
                                  "item" : "'.($key+1).'",
                                  "dni" : "'.$value["dni_personal"].'",
                                  "nombre_personal" : "'.$value["nombre_personal"].'",
                                  "cargo" : "'.$value["nombre_perfil"].'",
                                  "hora_entrada" : "'.$value["turno_entrada"].'",
                                  "hora_salida" : "'.$value["turno_salida"].'",
                                  "telefono" : "'.$value["telefono"].'",
                                  "direccion" : "'.$value["direccion"].'",
                                  "acciones" : "'.$botones.'"
                              },';
            }
               
            $tablaPersonal = substr($tablaPersonal, 0, strlen($tablaPersonal)-1);
            echo '{"data":['.$tablaPersonal.']}'; 
        }
    }
    $tablaPersonal = new TablaPersonal();
    $tablaPersonal->mostrarTablaPersonal();
?>