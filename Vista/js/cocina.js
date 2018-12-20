$(document).ready(function(){
    
} );

$('.tabla_cocina').DataTable({
    
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "ajax":{        
        "url": "AjaxControladores/cocina.datatable.controlador.php",
        "type": "POST"
    },
    "columns":  [
                    {"data":"item"},                    
                    {"data":"plato"},
                    {"data":"cantidad"},
                    {"data":"detalle"},
                    {"data":"nro_mesa"},
                    {"data":"nombre_mozo"},
                    {"data":"acciones"}                   
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

function atenderPedido(nro_pedido_producto){
    $('#'+nro_pedido_producto+'').hide('button');
    var divPadre = $('#divPadre'+nro_pedido_producto+'');
    var divHijo = '<div id="div'+nro_pedido_producto+'" style="margin:auto; display:none; width:30px; heigth:25px; cursor:pointer;"></div>';
    divPadre.append(divHijo);
    $('#div'+nro_pedido_producto+'').show();
    $('#div'+nro_pedido_producto+'').css("cursor","pointer");
    var bar = new ProgressBar.Circle('#div'+nro_pedido_producto+'',{
         strokeWidth: 8,
         easing: 'easeInOut',
         duration: 3000,
         color: '#F9AD1F',
         trailColor: '#eee',
         trailWidth: 1,
         svgStyle: null
    });
    
    bar.animate(1.0);
    
    var temporizador = setTimeout("enviarPedido("+nro_pedido_producto+")",3000);
    
    $('#div'+nro_pedido_producto+'').on('click', function(){
        clearTimeout(temporizador);
        $('#div'+nro_pedido_producto+'').remove();
        $('#'+nro_pedido_producto+'').show('button');        
    });        
    
}

function enviarPedido(nro_pedido_producto){
    var datos ={"nro_pedido_producto" : nro_pedido_producto};    
    $.ajax({
        url:"AjaxControladores/cocina.ajax.controlador.php",
      	method: "POST",
      	data: datos,
      	success:function(respuesta){            
            if(respuesta){
                $('#div'+nro_pedido_producto+'').parent().parent().parent().fadeOut("slow");
            }
        }
    });    
}