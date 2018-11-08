<?php
    
    class GestionUsuarioControlador{
        public static function ctrMostarGestionUsuarios($columna, $dato){            
            $tabla = "user_system";
            $respuesta = GestionUsuarioModelo::mdlMostrarGestionUsuarios($tabla, $columna, $dato);
            return $respuesta;
        }
        public static function ctrCrearUsuarioSistema(){
            if(isset($_POST["txt_usuario"])){
                $usuario = $_POST["txt_usuario"];                
                $tabla = "user_system";
                $columna = "user";
                $dato = $usuario;
                $orden = null;
                $respuesta = GestionUsuarioModelo::mdlMostrarGestionUsuarios($tabla, $columna, $dato, $orden);                
                if($respuesta["user"]==$usuario){
                    echo '<br><div class="alert alert-danger">El Nombre de Usuario Ya exista. Intenta con otro nombre</div>';
                }else{
                    $tabla = "user_system";
                    $dato1 = $_POST["txt_usuario"];
                    $dato2 = $_POST["txt_pass"];
                    $dato3 = $_POST["txt_nomape"];                    
                    $dato4 = $_POST["sel_tipoRol"];
                    
                    $respuesta = GestionUsuarioModelo::mdlCrearUsuarioSistema($tabla, $dato1, $dato2, $dato3, $dato4);
                    
                    if($respuesta == "ok"){
                        echo '<script>
                                swal({
                                    type: "success",
                                    title: "¡El usuario ha sido guardado correctamente!",
                                    showConfirmButton: false,                                    
                                    }).then(function(result){
                                    if(result.value){
                                            window.location = "gestion_usuarios";
                                    }
                                });
                            </script>';
                    }
                }
            }
        }
    }
    
?>

