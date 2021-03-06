<!--/**
 * Created by PhpStorm.
 * User: manuperez
 * Date: 12/18/18
 * Time: 5:58 PM
 */
-->
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
                    Reporte de Ventas
                </h1>
            </div>
        </section>
    </div>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tabla_reporte_ventas" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10px;">N° Venta</th>
                            <th style="width: 20px;">N° Boleta/Factura</th>
                            <th style="width: 230px;">Cliente</th>
                            <th style="width: 70px;">Fecha</th>
                            <th style="width: 235px;">Mozo</th>
                            <th style="width: 40px;">Total S/. (Inc. IGV)</th>
                            <th style="width: 20px;">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
<!-----------------------------------------
MODAL PARA VER REPORTE
------------------------------------------->
<div id="modalVerDetalleReporte" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="POST">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Reporte - X</b><label id="lbl_nroMesa"></label></h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="txt_mesero" class="form-control" readonly value="Mi mozo">
                                </div>
                            </div>
                            <div class="col-md-4 row pull-right">
                                <label style="font-size: 16px;"><b>TOTAL: S/. XXXXXXX</b></label><label id="lbl_totalMesa" style="font-size: 16px;"></label>
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
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Lomito Saltado</td>
                                <td>4</td>
                                <td>50.0</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Ceviche</td>
                                <td>3</td>
                                <td>30.0</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Gaseosa #L</td>
                                <td>1</td>
                                <td>10.50</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>