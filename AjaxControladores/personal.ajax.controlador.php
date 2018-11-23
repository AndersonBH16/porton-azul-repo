<?php
    require_once '../AjaxControladores/personal.datatable.ajax.php';
    require_once '../Controlador/personal.controlador.php';
    require_once '../Modelo/personal.modelo.php';
    
    class PersonalAjax{
        
        public $id_personal;
        public $dni;
        public $nombre;
        public $telefono;
        public $direccion;
        public $id_perfil;
        public $id_area;
        
        public function crearPersonal(){
            $dni = $this->dni;
            $nombre = $this->nombre;
            $telefono = $this->telefono;
            $direccion = $this->direccion;
            
            $respuestaCreacionPersonal = PersonalModelo::mdlCrearPersonal($dni,$nombre,$telefono,$direccion);       
            if($respuestaCreacionPersonal == "ok"){
                $id_perfil = $this->id_perfil;
                $id_area = $this->id_area;
                $respuestaMostrarPersonal = PersonalModelo::mdlUltimoPersonal();                
                $id_personal = $respuestaMostrarPersonal;
                $respuestaCreacionPersonalPerfil = PersonalModelo::mdlCrearPersonalPerfil($id_personal, $id_perfil, $id_area);
                if($respuestaCreacionPersonalPerfil == "ok"){
                    return 1;
                }                
            }else{
                echo "ERROR EN LA CREACIÓN DEL PERSONAL";
            }    
        }
    }

    if(isset($_POST["dni"])){
        $nuevoPersonal = new PersonalAjax();      
        $nuevoPersonal->dni = $_POST["dni"];
        $nuevoPersonal->nombre = $_POST["nombre"];
        $nuevoPersonal->telefono = $_POST["telefono"];
        $nuevoPersonal->direccion = $_POST["direccion"];
        $nuevoPersonal->id_perfil = $_POST["id_perfil"];
        $nuevoPersonal->id_area = $_POST["id_area"];
        $nuevoPersonal->crearPersonal();
    }
?>