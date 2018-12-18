<?php
    require_once '../Controlador/caja.controlador.php';
    require_once '../Modelo/caja.modelo.php';
    
    class Caja{
        public $nro_mesa;
        
        public function cerrarMesa(){
            $numeroMesa = $this->nro_mesa;
            $respuesta = CajaControlador::cerrarMesa($numeroMesa);
            if($respuesta['flagSP'] == 1){
                echo 1;
            }else{
                echo 0;
            }
        }        
    }
    
    if(isset($_POST['nro_mesa'])){
        $nuevaCaja = new Caja();
        $nuevaCaja->nro_mesa = $_POST['nro_mesa'];
        $nuevaCaja->cerrarMesa();
    }
?>