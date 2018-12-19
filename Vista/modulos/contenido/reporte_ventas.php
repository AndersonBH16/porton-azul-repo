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
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>BOL-001</td>
                        <td>Manuel Pérez</td>
                        <td>2018-Ago-21</td>
                        <td>Jon Rucana</td>
                        <td>150.90</td>
                        <td style="text-align: center">
                            <button class="btn btn-success botonAccionVer">Ver</button>
                            <button class="btn btn-warning botonAccionImprimir">Imprimir</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>BOL-002</td>
                        <td>Mauricio Arréstegui</td>
                        <td>2018-Junio-18</td>
                        <td>Edwin Monzón</td>
                        <td>220.0</td>
                        <td style="text-align: center">
                            <button class="btn btn-success botonAccionVer">Ver</button>
                            <button class="btn btn-warning botonAccionImprimir">Imprimir</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>BOL-003</td>
                        <td>Jorge Gamboa</td>
                        <td>2018-Abril-20</td>
                        <td>Anderson Blas</td>
                        <td>158.30</td>
                        <td style="text-align: center">
                            <button class="btn btn-success botonAccionVer">Ver</button>
                            <button class="btn btn-warning botonAccionImprimir">Imprimir</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>BOL-004</td>
                        <td>Gianpier Nizama</td>
                        <td>2017-Dic-17</td>
                        <td>Lui Valverde</td>
                        <td>70.20</td>
                        <td style="text-align: center">
                            <button class="btn btn-success botonAccionVer">Ver</button>
                            <button class="btn btn-warning botonAccionImprimir">Imprimir</button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>BOL-005</td>
                        <td>Juanchico</td>
                        <td>2017-Oct-24</td>
                        <td>Edu Villanueva</td>
                        <td>20.50</td>
                        <td style="text-align: center">
                            <button class="btn btn-success botonAccionVer">Ver</button>
                            <button class="btn btn-warning botonAccionImprimir">Imprimir</button>
                        </td>
                    </tr>
                    </tbody>
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