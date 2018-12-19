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
                    <b>VISTA DE PEDIDOS</b>
                </h1>
            </div>
        </section>
    </div>    
    <section class="content">
        <!--TABLA DE MENU (PRODUCTOS)-->
        <div class="row">
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
                <div class="box box-warning">
                    <div class="box-header with-border"></div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped dt-responsive tabla_menu_pedido" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">N°</th>                            
                                    <th style="width: 150px;">Nombre</th>
                                    <th style="width: 350px;">Descripción</th>
                                    <th style="width: 35px;">Precio</th>
                                    <th style="width: 40px;">Categoria</th>
                                    <th style="width: 30px;">Estado</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- FORMULARIO DE RESUMEN DE LOS PEDIDOS-->
            <div class="col-lg-5 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border"></div>
                    <div class="formularioPedido">
                        <div class="box-body">
                            <div class="box">
                                <h4>Resumen del Pedido</h4>
                                <div class="form-group">                                
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>                    
                                        <select class="form-control" id="seleccioneEmpleado" name="sel_mozo" required>
                                            <option value="">Seleccione Mozo</option>
                                            <?php                                           
                                                $respuesta = PersonalControlador::ctrMostrarPersonalPerfil();
                                                foreach($respuesta as $key => $value){
                                                    echo '<option value="'.$value["id_personal_perfil"].'">'.$value["nombre_personal"].'</option>';
                                                }
                                            ?>
                                        </select>                                    
                                    </div>                                
                                </div>
                                <div class="form-group">
                                    <div  class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>                    
                                        <select class="form-control" id="seleccioneMesa" name="sel_mesa" required>
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
                                <div class="form-group form-control">                                                                            
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <input id="noLlevar" type="radio" name="rd_llevar" value="1" checked>
                                            <label for="noLlevar">&nbsp;&nbsp;&nbsp;Local</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="llevar" type="radio" name="rd_llevar" value="2">
                                            <label for="llevar">&nbsp;&nbsp;&nbsp;LLevar</label>
                                        </div>
                                    </div>
                                </div>                                
                                <!--LISTA DE PEDIDOS-->
                                <div class="form-group row descripcionPedido">
                                </div>
                                <input type="hidden" id="lista_productos" name="lista_productos">
                                <div class="form-group">
                                    <label for="detalle_pedido">Detalle del Pedido:</label><br>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <textarea id="detalle_pedido" class="col-lg-10" name="txa_detalle" placeholder="Ingrese detalle adicional del pedido..."></textarea>
                                        <div class="col-md-1"></div>                                        
                                    </div>
                                </div>
                                <!--IMPUESTO Y TOTAL-->
                                <div class="row">
                                    <div class="col-xs-12 pull-right">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                  <!--<th>Impuesto</th>-->
                                                  <th>Total</th>      
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>                          
                                                    <!--<td style="width: 50%">
                                                        <div class="input-group">
                                                            <input id="impuesto" type="number" class="form-control input-lg" min="0" value="18">
                                                            <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                                        </div>
                                                    </td>-->
                                                    <td style="width: 50%">                            
                                                         <div class="input-group">                           
                                                             <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                                             <input type="text" class="form-control input-lg" id="totalPrecioProducto" name="nuevoTotalVenta" total="" placeholder="0000.00" readonly required>                                                             
                                                         </div>
                                                     </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="box-footer">
                            <button id="crearPedido" class="btn btn-primary pull-right" name="btn_enviarPedido">Enviar Pedido</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>