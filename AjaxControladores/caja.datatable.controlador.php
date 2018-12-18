<?php
    include_once '../Controlador/caja.controlador.php';
    require_once '../Modelo/caja.modelo.php';


class TablaCaja {
        public $nroMesa;
        
        public function verDetalleMesaParaCaja(){
            $nMesa = $this->nroMesa;
            $resultado = CajaControlador::verDetalleMesaParaCaja($nMesa);
            echo $resultado;
        }        
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nuevaTablaMesa = new TablaCaja();
        $nuevaTablaMesa->nroMesa = $_POST['nro_mesa'];
        $nuevaTablaMesa->verDetalleMesaParaCaja();
    }
?>