<?php
    require_once '../Controlador/gestion_usuario.controlador.php';
    require_once '../Modelo/gestion_usuario.modelo.php';

    class GestionUsuarioAjax{
        public $idUsuario;
        public $estadoUsuario;
        
        public function ajaxActivarUsuario(){
            
            if($this->estadoUsuario  == "activo"){
                
                $tabla = "user_system";
                $columna = "estado";
                $nuevoEstado = "inactivo";                
                $id_usuario = $this->idUsuario;
                
                $respuesta = GestionUsuarioModelo::mdlActivarUsuarioSistema($tabla, $columna, $nuevoEstado, $id_usuario);
                
                if($respuesta == "ok"){
                    
                    $columna = "id_user_system";
                    $dato = $id_usuario;
                    $resultado = GestionUsuarioControlador::ctrMostarGestionUsuarios($columna, $dato);
                    echo json_encode($resultado);

                }else{
                    echo "ERROR EN EL CAMBIO DE ESTADO";
                }
                
            }else{
                
                $tabla = "user_system";
                $columna = "estado";
                $nuevoEstado = "activo";
                $id_usuario = $this->idUsuario;
                
                $respuesta = GestionUsuarioModelo::mdlActivarUsuarioSistema($tabla, $columna, $nuevoEstado, $id_usuario);
                
                if($respuesta == "ok"){
                    $columna = "id_user_system";
                    $dato = $id_usuario;
                    $resultado = GestionUsuarioControlador::ctrMostarGestionUsuarios($columna, $dato);
//                    echo "<script>bla bla".$respuesta['estado']."</script>";                    
//                    $a = $resultado['estado'];
                    echo json_encode($resultado);          
                    
                }else{
                    echo "ERROR EN EL CAMBIO DE ESTADO";
                }
            }            
       }
    }

    if(isset($_POST["id_usuario"])){
        
        $activarUsuario = new GestionUsuarioAjax();        
        $activarUsuario->idUsuario = $_POST["id_usuario"];
        $activarUsuario->estadoUsuario = $_POST["estado"];
        $activarUsuario->ajaxActivarUsuario();
        
    }
?>
