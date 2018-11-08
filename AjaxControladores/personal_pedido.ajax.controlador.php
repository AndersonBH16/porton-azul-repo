<?php
    require_once '../Controlador/personal.controlador.php';
    require_once '../Modelo/personal.modelo.php';
    
    class PersonalPedidoAjaxControlador{
        public $id_personal;
        
        public function ctrMostrarPersonalPerfilEditar(){
            $id = $this->id_personal;
            $respuestaEditarPersonal = PersonalModelo::mdlMostrarPersonalPerfilEditar($id);
//            return $respuestaEditarPersonal;
            echo json_encode($respuestaEditarPersonal);
        }
        
//        public function ctrUnirEditar(){
//            $respuesta->respuestaEditarPersonal = $this->ctrMostrarPersonalPerfilEditar();
//            echo json_encode($respuesta->respuestaEditarPersonal);
//        }
    }
    
    if(isset($_POST["id_personal"])){
        $editarPersonal = new PersonalPedidoAjaxControlador();
        $editarPersonal->id_personal = $_POST["id_personal"];
        $editarPersonal->ctrMostrarPersonalPerfilEditar();
    }
?>