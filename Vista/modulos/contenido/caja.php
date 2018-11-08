<style>
    #contenido_mesa{
        background-image: url(Vista/img/contenido/fondo_mesa.jpg);
        background-size: cover;
    }
</style>
<div class="content-wrapper" id="contenido_mesa" style="padding-bottom: 0; padding-top: 0;">
    <div class="row" style="padding-left: 0; padding-top: 0; ">
        <section class="content-header" style="padding-left: 0; padding-top: 0;">
            <div  style="background: #400B0B; width: 40%; height: 40px;  left: 0; border: 2px solid #939807; border-left: none; border-top: none;">
                <h1 style="font-size: 24px; color:#CACFD2; text-align: right; padding-right: 20px; padding-top: 10px;">
                    <b>CAJA</b>                    
                </h1>
            </div>
        </section>        
    </div>
    <section class="content">
        <!--TABLA CON REPORTE DEL PEDIDO-->
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>                    
                                <select class="form-control" name="sel_mesa">
                                    <option value="">Seleccione Mesa</option>
                                    <?php                                           
                                        $respuesta = MesaControlador::ctrMostrarMesa();
                                        foreach($respuesta as $key => $value){
                                            echo '<option value="'.$value["id_mesa"].'">'.$value["numero_mesa"].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">                        
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" readonly>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="well">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <p class="text-center" style="font-size: 18px;"><b>REPORTE DEL PEDIDO</b></p>
                                </div>
                                <div class="row groups">
                                    <div class="col-md-1">
                                        <p class="text-center"><b>Código</b></p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="text-center"><b>Descripción</b></p>
                                    </div>
                                    <div class="col-md-1">
                                        <p class="text-center"><b>Cantidad</b></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-center"><b>Precio S/.</b></p>
                                    </div>
                                </div>
                                <div class="no-border">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <p class="text-center">123</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="text-center">Lomito Saltado - lorem ipsum</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p class="text-center">2</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="text-center">25.00</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <p class="text-center">321</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="text-center">Lomito Saltado - lorem ipsum</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p class="text-center">1</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="text-center">43.00</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <p class="text-center">123</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="text-center">Lomito Saltado - lorem ipsum</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p class="text-center">1</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="text-center">29.50</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <p class="text-center">123</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="text-center">Lomito Saltado - lorem ipsum</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p class="text-center">2</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="text-center">55.90</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <p class="text-center">123</p>
                                        </div>
                                        <div class="col-md-7">
                                            <p class="text-center">Lomito Saltado - lorem ipsum</p>
                                        </div>
                                        <div class="col-md-1">
                                            <p class="text-center">7</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="text-center">199.00</p>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="box col-lg-12 box-default"></div>
                                <div class="row">
                                    <div class="col-lg-9">
                                        <p style="font-size: 18px"><b>Total:</b></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="text-center form-control input-lg" style="font-size: 18px;" value="123.45" readonly>
                                    </div>             
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="col-md-12">                            
                            <button class="btn btn-outline btn-info center-block" style="width: 100%; border-color: #007fff; color: #000077;">
                                <img class="img-responsive center-block" src="Vista/img/contenido/recepcion.png"><b>Imprimir Cuenta</b>
                            </button> 
                            <div style="height: 50px;"></div>                            
                            <button class="btn btn-outline btn-success center-block" data-toggle="modal" data-target="#modalGenerarComprobante" data-dismiss="modal" style="width: 100%; border-color: #007fff; color: #000077;">
                                <img class="img-responsive center-block" src="Vista/img/contenido/impresora.png"><b>Generar Comprobante</b>
                            </button>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
</div>
<div id="modalGenerarComprobante" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Generar Comprobante de Pago</h4>
            </div>
            <div class="modal-body">                                   
                <form role="form" method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>                    
                            <select id="tipoComprobante" class="form-control">
                                <option value="">::SELECCIONE TIPO DE COMPROBANTE::</option>
                                <option value="1">Boleta</option>
                                <option value="2">Factura</option>
                            </select>
                        </div>
                    </div>
                    <div class="row vistaComprobante" >
                    </div>                    
                </form>
            </div>            
        </div>
    </div>
</div>