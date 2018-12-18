<?php
    include_once '../Controlador/mesa.controlador.php';
    require_once '../Modelo/mesa.modelo.php';


    class TablaMesa {
        public $nroMesa;
        public function verDetalleMesa(){
            $nm = $this->nroMesa;
            $respuesta = MesaControlador::ctrVerDetalleMesa($nm);
            echo json_encode($respuesta);
        }
    }

    if(isset($_POST['nro_mesa'])){
        $nuevaTablaMesa = new TablaMesa();
        $nuevaTablaMesa->nroMesa = $_POST['nro_mesa'];
        $nuevaTablaMesa->verDetalleMesa();
    }
?>