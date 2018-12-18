$(document).ready(function(){

} );


function cerrarMesa(){
    alert("La mesa a cerrar es: "+ n_mesa);
}

var detalleMesa;

var numeroMesa;
$("#selectMesa").change(function(){
    numeroMesa = $("#selectMesa").val();
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
                detalleMesa = respuesta;
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

var totalPagar = 0;

function obtenerDetalleBoleta(detalle){
    var contenidoTabla = "";

    for(var i = 0;  i < detalle['data'].length; i++){
        contenidoTabla +=
            "<tr>" +
                "<td>" + detalle['data'][i].descripcion + "</td>" +
                "<td>" + detalle['data'][i].cantidad + "</td>" +
                "<td>" + detalle['data'][i].subtotal + "</td>" +
            "</tr>";
        totalPagar += detalle['data'][i].subtotal;
    }
    return contenidoTabla;
}

$('#botonImprimirTicketPago').click(function(){
    if (detalleMesa != null) {
        var ticketPago = '<!doctype html>' +
            '<html lang="en">' +
            '<head>' +
            '    <meta charset="UTF-8">' +
            '    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">' +
            '    <meta http-equiv="X-UA-Compatible" content="ie=edge">' +
            '    <link rel="icon" type="image/png" sizes="32x32" href="../../img/login/logo.png">' +
            '    <link rel="stylesheet" href="../../impresiones/ticketPago.css">' +
            '    <title>Recibo | Portón Azul</title>' +
            '</head>' +
            '<body>' +
            '<div class="contenido">' +
            '    <div>Portón Azul</div>' +
            '    <div>Ruc: 783775885673</div>' +
            '    <div>Dirección: tal tal tal tal</div>' +
            '    <div>Teléfono: 044477856</div>' +
            '    <br>' +
            '    <div><b>Boleta N° xxx</b></div>' +
            '    <br>' +
            '    <div class="contenido izquierda">' +
            '        <div>Mesa:     ' + $("#selectMesa").val() + '</div>' +
            '        <div>Mozo:     ' + detalleMesa['data'][0].mozo + '</div>' +
            '        <div>Observ:   mi observación</div>' +
            '    </div>' +
            '    <br>' +
            '    <div><b>Detalle de Venta</b></div>' +
            '    <hr>' +
            '    <div><b>Producto * Cantidad         Subtotal (S/.)</b></div>' +
            '    <hr>' +
            '    <table id="customers">' +
            obtenerDetalleBoleta(detalleMesa) +
            '    </table>' +
            '    <hr>' +
            '    <div class="derecha">TOTAL A PAGAR: ' + totalPagar + ' Nuevos soles</div>' +
            '</div>' +
            '</body>' +
            '</html>';
        window.open('Vista/modulos/contenido/ticketPago.php?ticket_pago=' + ticketPago);
    }
    else {
        alert("Selecciona una mesa");
    }
});

function cerrarMesa(){
    alert("La mesa a cerrar es: "+ numeroMesa);
    data = {"nro_mesa" : numeroMesa};    
    $.ajax({
        data: data,
        method: "POST",
        url: "AjaxControladores/caja.ajax.controlador.php",
        cache: false,
        dataType: "json",
        success: function(respuesta){
            if(respuesta == '1'){
                swal({
                        icon: "success",
                        type: "success",
                        title: "¡Mesa cerrada con éxito!",
                        timer: 2000,
                        showConfirmButton: false                          
                        }).then(function(){
                            window.location = "caja";
                    });
            }else{
                swal({
                        icon: "danger",
                        type: "danger",
                        title: "¡Error al cerrar mesa!",
                        timer: 2000,
                        showConfirmButton: false                          
                        }).then(function(){
                            window.location = "caja";
                    });
            }
        }
    });
}

$("#botonGenerarComprobante").click(function(){
    if (detalleMesa != null) {
        $("#modalGenerarComprobante").modal("toggle");
    }
    else {
        alert("Selecciona una mesa");
    }
});

var comprobanteImprimir;

$('#tipoComprobante').on('change' ,function(){
    $("#botonImprimirComprobante").show();

    if($(this).val() === "1") {
        $('.vistaComprobante').html(
            '<div class="input-group">' +
                '<table class="table table-bordered table-striped dt-responsive tablaBoleta" width="100%">' +
                    $('.tabla_caja').html() +
                '</table>' +
            '</div>'
        );
        var tablaCaja = $('.vistaComprobante').html() + "";
        comprobanteImprimir = $.trim(tablaCaja.replace(/[\t\n]+/g,' '));
    }
    else if($(this).val() === "2") {
        $('.vistaComprobante').html('<div><button class="btn btn-primary">Incluye!</button></div>');
    }
});

$("#botonImprimirComprobante").click(function(){
    var x = '<!doctype html>' +
        '<html lang="en">' +
            '<head>' +
                '<meta charset="UTF-8">' +
                '<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">' +
                '<meta http-equiv="X-UA-Compatible" content="ie=edge">' +
                '<title>Comprobante | Portón Azul</title>' +
            '</head>' +
            '<body>' +
                comprobanteImprimir +
            '</body>' +
        '</html>';

    console.log(x);

    window.open('Vista/modulos/contenido/comprobante.php?comprobante=' + x);
});