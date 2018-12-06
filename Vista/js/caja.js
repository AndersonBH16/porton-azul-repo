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


function cerrarMesa(){
    alert("La mesa a cerrar es: "+ n_mesa);
}

$("#selectMesa").change(function(){
    var numeroMesa = $("#selectMesa").val();
    console.log("Mi mesa es: " + numeroMesa);

    var mesa = {"nro_mesa" : numeroMesa};
    var tablaDetalleMesa = $('.tabla_caja');

    tablaDetalleMesa.DataTable().destroy();

    $.ajax({
        data: mesa,
        method: "POST",
        url: "AjaxControladores/caja.datatable.controlador.php",
        cache: false,
        dataType: "json",
        success: function(respuesta) {
            if(respuesta['data'].length != 0) {
                var productosPorPedido = respuesta['data'].length; //capturamos la cantidad de productos por pedido
                var nombreMozo = respuesta['data'][productosPorPedido - 1].mozo;

                tablaDetalleMesa.DataTable({
                    "sPaginationType": "full_numbers",
                    "data": respuesta['data'],
                    "columns": [
                        {"data": "item"},
                        {"data": "descripcion"},
                        {"data": "cantidad"},
                        {"data": "subtotal"}
                    ],
                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sSearch": "Buscar:",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        }
                    }
                });
            }
            else {
                tablaDetalleMesa.DataTable({
                    "paging": false,
                    "searching": false,
                    "info": false,
                    "destroy": true,
                    "data": respuesta,
                    "language": {
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                    }
                });
            }
            $("#idNombreMozo").val(nombreMozo);
            console.log("nombre de mozo: " + nombreMozo);
        },
        error: function(xhr, ajaxOptions, thrownError, error){
            console.log("Ocurrió un error..." + "\nstatus: " + xhr.status + "\nthrownError: " + thrownError + "\najaxOptions: " + ajaxOptions + "\nerror: " + error);
        }
    });
});