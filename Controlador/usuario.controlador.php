<?php

    class UsuarioControlador{
        //Verificar Ingreso de Usuarios al Sistema
        static public function ctrIngresoUsuario(){
            
            if(isset($_POST['btn_ingresar'])){
                $exp_usuario = '/^[a-zA-Z0-9]+$/';
                $exp_password = '/^[a-zA-Z0-9]+$/';
                
                 if(preg_match($exp_usuario, $_POST['txt_usuario'])&& preg_match($exp_password, $_POST['txt_password'])){
                    $tabla = "user_system";
                    $columna = "user";
                    $dato = $_POST['txt_usuario'];
                    //llamar al modelo que conecta con la bd
                    $resultado = UsuarioModelo::mdlMostrarUsuarios($tabla, $columna, $dato);
                    if($resultado["user"]==$_POST["txt_usuario"] && $resultado["password"]==$_POST["txt_password"]){
                        if($resultado["estado"]=="activo"){
                            $_SESSION["sesionIniciada"]="ok";
                            $_SESSION["id_user_system"]=$resultado["id_user_system"];
                            $_SESSION["user"]=$resultado["user"];
                            $_SESSION["password"]=$resultado["password"];
                            $_SESSION["ultimo_login"]=$resultado["ultimo_login"];
                            $_SESSION["rol"]=$resultado["rol"];
                            
                            //Registrar fecha para saber el ultimo login
                            
                            if($_SESSION["sesionIniciada"]){
                                echo '<script>
                                        window.location = "inicio";
                                     </script>';
                            }
                        }
                        echo '<br><div class="alert alert-danger">El usuario aún no está activado</div>';
                    }else{
                        echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }
                }            
            }            
        }
    }
    
?>

