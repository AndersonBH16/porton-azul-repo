<?php
    include_once '../Controlador/mesa.controlador.php';
    require_once '../Modelo/mesa.modelo.php';


class TablaCaja {
        public $nroMesa;
        public function verDetalleMesaParaCaja(){
            $nm = $this->nroMesa;
            $respuesta = MesaControlador::ctrVerDetalleMesaParaCaja($nm);
            return $respuesta;
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nuevaTablaMesa = new TablaCaja();
        $nuevaTablaMesa->nroMesa = $_POST['nro_mesa'];
        $nuevaTablaMesa->verDetalleMesaParaCaja();
    }
?>