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
                    <b>GESTIÓN DE USUARIOS DEL SISTEMA</b>
                </h1>
            </div>
        </section>
    </div>    
    <section class="content">
        <div class="box">
            <div class="box-header with-border pull-right">  
                <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario">          
                    Agregar usuario
                </button>
            </div>
            <div class="box-body">                
                <table class="table table-bordered table-striped dt-responsive tabla_gestion_usuarios" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10px;">N°</th>
                            <th>Usuario</th>
                            <th>Persona</th>
                            <th>Estado</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>                
            </div>
        </div>
    </section>
</div>
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">AGREGAR NUEVO USUARIO AL SISTEMA</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">              
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" class="form-control input-lg" name="txt_usuario" placeholder="Ingrese nombre de usuario" required>
                            </div>
                        </div>
                        <div class="form-group">              
                            <div class="input-group">              
                              <span class="input-group-addon"><i class="fa fa-key"></i></span>
                              <input type="password" class="form-control input-lg" name="txt_pass" placeholder="Ingrese contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" class="form-control input-lg" name="txt_nomape" placeholder="Ingrese nombres y apellidos" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>                    
                            <select name="sel_tipoRol" class="form-control">
                                <option value="">::SELECCIONE CARGO::</option>
                                <option value="administrador">Administrador</option>                                
                                <option value="cajero">Cajero</option>
                                <option value="cocinero">Cocinero</option>
                                <option value="mesero">Mesero</option>
                            </select>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                </div>
                <?php
                    $nuevoUsuario = new GestionUsuarioControlador();
                    $nuevoUsuario->ctrCrearUsuarioSistema();
                ?>
            </form>
        </div>
    </div>
</div>



