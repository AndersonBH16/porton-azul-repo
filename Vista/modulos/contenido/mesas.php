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
                        echo '<div style="display: inline-block; margin:2%; width: 180px; height:230px; background: rgba(34, 45, 45, 0.5); padding:10px;">
                                <input id="nro_mesa" style="font-size:18px; text-align:center; width:45px; color:#F9F902; background:rgba(64, 11, 11, 0.8); left: 0; border: none;" value="N°: '.$value["numero_mesa"].'" disabled>
                                <a href="#">
                                    <img class="img-responsive" src="Vista/img/contenido/mesa.png" style="width:100%; height:70%; margin:0; padding:0;">
                                </a>\n\
                                <div clas="col-md-8">
                                    <button class="btn btn-success" style="margin-left:23%;" value="">'.$value["estado"].'</button>
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