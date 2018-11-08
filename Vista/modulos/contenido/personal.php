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
                <h1 style="font-size: 21px; color:#CACFD2; text-align: right; padding-right: 20px; padding-top: 10px;">
                    <b>PERSONAL</b>
                </h1>
            </div>
        </section>
    </div>    
    <section class="content">
        <div class="box">
            <div class="box-header with-border">                
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPersonal"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Nuevo</button>
            </div>
            <div class="box-body">                
                <table class="table table-bordered table-striped dt-responsive tabla_personal" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">N°</th>
                            <th style="width: 100px">DNI</th>
                            <th style="width: 150px">Nombre</th> 
                            <th style="width: 100px">Cargo</th>
                            <th style="width: 100px">Hora Entrada</th>
                            <th style="width: 100px">Hora Salida</th>
                            <th style="width: 100px">Teléfono</th>
                            <th style="width: 100px">Dirección</th>
                            <th style="width: 200px">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
<!-----------------------------------------
MODAL PARA AGREGAR NUEVO PERSONAL
------------------------------------------->
<div id="modalAgregarPersonal" class="modal fade" role="dialog">  
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar personal</h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <input id="dni" type="text" class="form-control input-lg" name="txt_dni" placeholder="Ingresar DNI" >
                              </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="nombre" type="text" class="form-control input-lg" name="txt_nombre" placeholder="Ingresar nombre completo" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select id="sel_perfil" class="form-control input-lg" name="sel_cargo">
                                    <option value="">Seleccione cargo</option>
                                    <?php                                           
                                        $respuesta = PersonalControlador::ctrMostrarCargo();
                                        foreach($respuesta as $key => $value){
                                            echo '<option value="'.$value["id_perfil"].'">'.$value["nombre_perfil"].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select id="sel_area" class="form-control input-lg" name="sel_cargo">
                                    <option value="">Seleccione Área</option>
                                    <?php                                           
                                        $respuesta = PersonalControlador::ctrMostrarArea();
                                        foreach($respuesta as $key => $value){
                                            echo '<option value="'.$value["id_area"].'">'.$value["nombre_area"].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;Entrada</span>
                                    <input id="hora_entrada" type="time" class="form-control input-lg" name="txt_hentrada">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;Salida</span>
                                    <input id="hora_salida" type="time" class="form-control input-lg" name="txt_hsalida">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input id="telefono" type="text" class="form-control input-lg" name="txt_telefono" placeholder="Ingresar teléfono">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-street-view"></i></span>
                                <input id="direccion" type="text" class="form-control input-lg" name="txt_direccion" placeholder="Dirección" >
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary" onclick="crearPersonal()">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>