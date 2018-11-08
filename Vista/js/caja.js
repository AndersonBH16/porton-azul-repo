$(document).ready(function(){

} );

$('#tipoComprobante').on('change' ,function(){
    if($(this).val()==="1"){
        $('.vistaComprobante').html(
            '<div class="box box-info">\n\
                <div class="box-body">\n\
                    <div class="col-lg-12">\n\
                        <div>\n\
                            <p class="text-center" style="font-size: 18px;"><b>DETALLE DE BOLETA</b></p><br>\n\
                        </div>\n\
                        <div class="row">\n\
                            <div class="col-lg-12">\n\
                                <div class="col-lg-1">\n\
                                    <p class="text-center"><b>Código</b></p>\n\
                                </div>\n\
                            <div class="col-lg-6">\n\
                                <p class="text-center"><b>Descripción</b></p>\n\
                            </div>\n\
                            <div class="col-lg-2">\n\
                                <p class="text-center"><b>Cantidad</b></p>\n\
                            </div>\n\
                            <div class="col-lg-3">\n\
                                <p class="text-center"><b>Precio S/.</b></p>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
                </div>\n\
                <div class="box-footer">\n\
                        <button class="btn btn-primary pull-right">Imprimir Comprobante</button>\n\
                    </div>\n\
            </div>'
        );
    }else if($(this).val()==="2"){
        $('.vistaComprobante').html('<div><button class="btn btn-primary">Incluye!</button></div>');
    }
});