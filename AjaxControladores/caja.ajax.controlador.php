<?php
    include_once '../Controlador/mesa.controlador.php';
    require_once '../Modelo/mesa.modelo.php';
    
    class Caja{
        public $nro_mesa;
        public function cerrarMesa(){
            $numeroMesa = $this->nro_mesa;
            $respuesta = CajaControlador::cerrarMesa($numeroMesa);
            echo $respuesta;
        }        
    }
    
    if(isset($_POST['nro_mesa'])){
        $nuevaCaja = new Caja();
        $nuevaCaja->nro_mesa = $_POST['nro_mesa'];
        $nuevaCaja->cerrarMesa();
    }
?>