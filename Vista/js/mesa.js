$(document).ready(function(){

} );

function agregarMesa(){
    $.ajax({
        url: 'AjaxControladores/mesa.ajax.controlador.php',
        method: 'POST',
        success: function(respuesta){
//           var idMesa;
//           var estadoMesa;
//           var i = 0;
//            $(respuesta).each(function(key, value){
//                console.log("i: " + i);
//                idMesa = value.idUltimaMesa;
//                estadoMesa = value.estadoMesa;
//            });
//            console.log("idMesa: " + idMesa + "\n estadoMesa: " + estadoMesa);
            var imagen_mesa = $("#mesa");
            var nueva_imagen_mesa = '<div style="display: inline-block; margin:2%; width: 180px; height:230px; background: rgba(34, 45, 45, 0.5); padding:10px;">\n\
                                        <input id="nro_mesa" style="font-size:18px; text-align:center; width:55px; color:#F9F902; background:rgba(64, 11, 11, 0.8); left: 0; border: none;" value="N°: '+ respuesta +'" disabled>\n\
                                        <a href="#">\n\
                                            <img class="img-responsive" src="Vista/img/contenido/mesa.png" style="width:100%; height:70%; margin:0; padding:0;">\n\
                                        </a>\n\
                                        <div clas="col-md-8">\n\
                                            <button class="btn btn-success" style="margin-left:23%;"></button>\n\
                                        </div>\n\
                                    </div>';
            imagen_mesa.append(nueva_imagen_mesa);            
        }
    });
}

$('#agregarMesa').on('click', function(){
    agregarMesa();
});

var n_mesa;
var estado_mesa;

function verDetalleMesa(nro_mesa){
    n_mesa = nro_mesa;
    var dato_mesa = {"nro_mesa" : nro_mesa};
    $('#lbl_nroMesa').text('Mesa N°: ' + nro_mesa);
    var tablaDetalleMesa = $('.tabla_verDetalleMesa');
    var mensajeSubTotal = "";

    tablaDetalleMesa.DataTable().destroy();

    $.ajax({
        data: dato_mesa,
        method: "POST",
        url: "AjaxControladores/mesa.datatable.controlador.php",
        cache: false,
        dataType: "json",
        success: function(respuesta) {
            if(respuesta['data'].length != 0) {
                var productosPorPedido = respuesta['data'].length; //capturamos la cantidad de productos por pedido
                estado_mesa = respuesta['data'][productosPorPedido - 1].estado_mesa;
                var subTotal = respuesta['data'][productosPorPedido - 1].sub_total;

                $("#btn_enviarCaja").prop('disabled', false);

                if (subTotal != null) {
                    mensajeSubTotal = subTotal; //capturamos el ultimo sub_total de todos los productoPorPedidos
                }
                
                $('#txt_mesero').val(respuesta['data'][productosPorPedido - 1].nombre_mozo);

                tablaDetalleMesa.DataTable({
                    "sPaginationType": "full_numbers",
                    "data": respuesta['data'],
                    "columns": [
                        {"data": "item"},
                        {"data": "plato"},
                        {"data": "cantidad"},
                        {"data": "precio"}
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

            $("#lbl_totalMesa").text(mensajeSubTotal);
        },
        error: function(xhr, ajaxOptions, thrownError, error){
            console.log("Ocurrió un error..." + "\nstatus: " + xhr.status + "\nthrownError: " + thrownError + "\najaxOptions: " + ajaxOptions + "\nerror: " + error);
        }
    });
}

function enviarCaja(){
    var datos = {
        "datos":
            {
                "id_mesa" : n_mesa,
                "estado_mesa" : estado_mesa
        }
    };
    console.log(datos);
    $.ajax({
        data: datos,
        method: "POST",
        url: "AjaxControladores/mesa.ajax.controlador.php",
        success: function(respuesta) {
            console.log(respuesta);
                swal({
                        icon: "success",
                        type: "success",
                        title: "¡La cuenta se enviado ha correctamente!",
                        timer: 3000,
                        showConfirmButton: false
                        }).then(function(){
                            window.location = "mesas";
                    });
            if(respuesta == -1){
                alert("No se puede enviar pedido si la mesa está desocupada.");
            }
        }
    });
}


//            var imagen_mesa = $('#mesa');
////            //var nueva_imagen_mesa = '<img class="" src="Vista/img/contenido/mesa.png"/>';
////
//            var nueva_imagen_mesa = '<div style="display: inline-block; margin:2%; width: 180px; height:230px; background: rgba(34, 45, 45, 0.5); padding:10px;">\n\
////                                        <p style="font-size:16px;">N°:<span>1</span></p>\n\
////                                        <a href="#">\n\
////                                            <img class="img-responsive" src="Vista/img/contenido/mesa.png" style="width=100%; height:70%; margin:0; padding:0;">\n\
////                                        </a>\n\
////                                        <div clas="col-md-8">\n\
////                                            <button class="btn btn-success" style="margin-left:23%;">Disponible</button>\n\
////                                        </div>\n\
////                                    </div>';
////
////            $('#agregarMesa').on('click',function(){
////                imagen_mesa.append(nueva_imagen_mesa);
////            });
