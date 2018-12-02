<?php
    include_once '../Controlador/mesa.controlador.php';
    require_once '../Modelo/mesa.modelo.php';


class TablaMesa {
        public $nroMesa;
        public function verDetalleMesa(){
            $nm = $this->nroMesa;
            $respuesta = MesaControlador::ctrVerDetalleMesa($nm);
            return $respuesta;
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nuevaTablaMesa = new TablaMesa();
        $nuevaTablaMesa->nroMesa = $_POST['nro_mesa'];
        $nuevaTablaMesa->verDetalleMesa();
    }
?>