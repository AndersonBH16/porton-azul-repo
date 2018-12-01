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

function verDetalleMesa(nro_mesa){
    var datos = {"nro_mesa" : nro_mesa};
    $('.tabla_verMesa').DataTable({        
        "bDeferRender": true,
        "sPaginationType": "full_numbers",
        "ajax":{
            "data" : datos, 
            "url": "AjaxControladores/mesa.datatable.controlador.php",
            "type": "POST"
        },
        "columns":  [
                        {"data":"item"},                    
                        {"data":"plato"},
                        {"data":"cantidad"},
                        {"data":"nombre_mozo"},
                        {"data":"total"}                   
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

