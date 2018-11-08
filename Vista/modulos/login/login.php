<div id="fondo_login">
    <video id="video_fondo_login" src="Vista/img/login/fondo5.mp4" autoplay="autoplay" loop="loop"></video>
</div>

<div class="login-box" style="margin-top: 15%; margin-left: 30%;">
    <div class="row">
        <div class="login-logo col-md-4" style="padding: 0;">
            <img src="Vista/img/login/login.png" class="img-responsive">
        </div>
        <div class="login-box-body col-lg-8" style="background-color: #2F2F3E;">
            <p class="login-box-msg">INGRESO AL SISTEMA</p>
            <form method="POST" autocomplete="off">
                <div class="form-group has-feedback">
                    <input type="text" name="txt_usuario" placeholder="Ingrese Nombre de Usuario" class="form-control" autocomplete="off" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="txt_password" placeholder="Ingrese Contraseña" class="form-control" autocomplete="off" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="text-align: center;">
                        <input type="submit" class="btn btn-success btn-block" name="btn_ingresar" value="INGRESAR" style="float: end;">
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <?php
                    $login = new UsuarioControlador();
                    $login->ctrIngresoUsuario();
                ?>
            </form>
        </div>
    </div>
</div>