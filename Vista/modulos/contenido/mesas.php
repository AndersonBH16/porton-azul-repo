<style>
    #contenido_mesa{
        background-image: url(Vista/img/contenido/fondo_mesa.jpg);
        background-size: cover;
    }
    
</style>
<div class="content-wrapper row" id="contenido_mesa">
    <div class="row" style="padding-left: 0;">
        <section class="content-header" style="display: block; padding-left: 0;">
            <div style="background: #400B0B; width: 40%; height: 50px;  left: 0; border: 2px solid #939807; border-left: none; border-top: none;">
                <h1 style="font-size: 25px; color:#CACFD2; text-align: right; padding-right: 20px; padding-top: 10px;">
                    Área de Mesas
                </h1>
            </div>
        </section>
    </div>    
    <div class="row"> <!-- ESTE HTML CONTENDRÁ LAS MESAS CREADAS -->
        <div class="row" style=" margin: 5%; padding: 2%;">
            <div id="mesa" class="row">
                <?php
                    $mesa = MesaControlador::ctrMostrarMesa();
                    foreach ($mesa as $key => $value){
                        $claseBoton = "";
                        if ($value["estado_mesa"] == "Ocupado"){
                            $claseBoton = "btn btn-danger";
                        }
                        else if($value['estado_mesa'] == 'Disponible'){
                            $claseBoton = "btn btn-success";
                        }else{
                            $claseBoton = "btn btn-warning";
                        }
                        
                        echo '<div style="display: inline-block; margin:2%; width: 180px; height:230px; background: rgba(34, 45, 45, 0.5); padding:10px;">
                                <input id="nro_mesa" style="font-size:18px; text-align:center; width:45px; color:#F9F902; background:rgba(64, 11, 11, 0.8); left: 0; border: none;" value="N°: '.$value["numero_mesa"].'" disabled>
                                <a id="'.$value['numero_mesa'].'" data-toggle="modal" data-target="#modalVerDetalleMesa" onclick="verDetalleMesa('.$value['numero_mesa'].')" title="Ver Mesa" style="cursor:pointer"> 
                                    <img class="img-responsive" src="Vista/img/contenido/mesa.png" style="width:100%; height:70%; margin:0; padding:0;">
                                </a>
                                <div clas="col-md-8">
                                    <button class="'.$claseBoton.'" style="margin-left:23%;" value="">'.$value["estado_mesa"].'</button>
                                </div>
                             </div>';
                    }
                ?>
            </div>
        </div>
    </div> <!-- ESTE HTML CONTIENE EL BOTON QUE SE PRESIONARA -->
    <div class="row" style="width: 70px; height: 70px;">
        <button id="agregarMesa" name="btn_agregarMesa" style="border-radius: 50%; padding: 0;">
            <img class="img-responsive" src="Vista/img/contenido/agregar_mesa.png" style="border-radius: 50%;">
        </button>
    </div>
</div>
<!-----------------------------------------
MODAL PARA VER MESA
------------------------------------------->
<div id="modalVerDetalleMesa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b></b><label id="lbl_nroMesa"></label></h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="pedido" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Agregar Pedido</a>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="txt_mesero" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 row pull-right">
                                <label style="font-size: 16px;"><b>TOTAL: S/.</b></label><label id="lbl_totalMesa" style="font-size: 16px;"></label>
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tabla_verDetalleMesa" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">N°</th>
                                    <th style="width: 100px">Plato</th>
                                    <th style="width: 150px">Cantidad</th>
                                    <th style="width: 100px">Precio</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button id="btn_enviarCaja" type="button" class="btn btn-primary pull-right" onclick="enviarCaja()"><i class="fa fa-send "></i>&nbsp;&nbsp;Enviar a Caja</button>
                </div>
            </form>
        </div>
    </div>
</div>