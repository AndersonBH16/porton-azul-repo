<?php
    require_once '../Controlador/gestion_usuario.controlador.php';
    require_once '../Modelo/gestion_usuario.modelo.php';
   
    class TablaGestionUsuario{
        public function mostrarTablaGestionUsuarios(){
            $columna = null;
            $dato = null;
            $orden = "id_user_system";
            
            $resultado_tablaGestionUsuario = GestionUsuarioControlador::ctrMostarGestionUsuarios($columna, $dato, $orden);
            
            $tablaGestionUsuario = "";

            foreach($resultado_tablaGestionUsuario as $key => $value){
                $botones = '<div class=\"btn-group\"><button class=\"btn btn-warning\"><i class=\"fa fa-pencil\"></i></button><button class=\"btn btn-danger\"><i class=\"fa fa-times\"></i></button></div>';
                $boton_estado= '<button id=\"'.$value['id_user_system'].'\" value=\"'.$value['estado'].'\" class=\"btn btn-success btn-xs btnActivar\">'.$value['estado'].'</button>';
                
                $tablaGestionUsuario .= '{
                                            "item" : "'.($key+1).'",
                                            "usuario" : "'.$value["user"].'",
                                            "persona" : "'.$value["persona"].'",
                                            "estado" : "'.$boton_estado.'",
                                            "rol" : "'.$value["rol"].'",
                                            "acciones" : "'.$botones.'"
                                        },';
            }
               
            $tablaGestionUsuario = substr($tablaGestionUsuario, 0, strlen($tablaGestionUsuario)-1);
            echo '{"data":['.$tablaGestionUsuario.']}';      
        }
    }    
    
    $tablaGestionUsuario = new TablaGestionUsuario();
    $tablaGestionUsuario->mostrarTablaGestionUsuarios();