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

var mesa;

function verDetalleMesa(nro_mesa){
    mesa = {"nro_mesa" : nro_mesa};
    $('#lbl_nroMesa').text('Mesa N°: ' + nro_mesa);
    $('.tabla_verDetalleMesa').DataTable().destroy();

    $.ajax({
        data: mesa,
        method: "POST",
        url: "AjaxControladores/mesa.datatable.controlador.php",
        cache: false,
        dataType: "json",
        success: function(respuesta) {
            var productosPorPedido = respuesta['data'].length; //capturamos la cantidad de productos por pedido
            var subTotal = respuesta['data'][productosPorPedido - 1].sub_total; //capturamos el ultimo sub_total de todos los productoPorPedidos

            $("#totalPedido").text("TOTAL: S/." + subTotal);

            $('.tabla_verDetalleMesa').DataTable({
                "bDeferRender": true,
                "sPaginationType": "full_numbers",
                "data" : respuesta['data'],
                "columns":  [
                    {"data":"item"},
                    {"data":"plato"},
                    {"data":"cantidad"},
                    {"data":"precio"},
                    {"data":"nombre_mozo"}
                ],
                "language":    {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        },
        error: function(xhr, ajaxOptions, thrownError, error){
            console.log("Ocurrió un error..." + "\nstatus: " + xhr.status + "\nthrownError: " + thrownError + "\najaxOptions: " + ajaxOptions + "\nerror: " + error);
        }
    });
}


//    $('#agregarMesa').on('click',function(){
//        
//    });
//    
//    $.ajax({
//        data: null,
//        url: 'Controlador/mesa.controlador.php',
//        type: 'POST',
//        beforeSend: function () {
//            
//        },
//        success: function (response){
//            console.log(parametros);
//        }
//    });





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

