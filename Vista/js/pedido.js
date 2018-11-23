$(document).ready(function(){

} );

$('.tabla_menu_pedido').DataTable({
    
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "ajax":{        
        "url": "AjaxControladores/pedido.datatable.controlador.php",
        "type": "POST"
    },
    "columns":  [
                    {"data":"item"},                    
                    {"data":"nombre_producto"},
                    {"data":"descripcion_producto"},
                    {"data":"precio"},
                    {"data":"nombre_categoria"},
                    {"data":"pedir_producto"}                   
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

//AGREGAR PRODUCTO DE LA TABLA MENU A PEDIDO

let contador_productos = 0;

var id_producto;
var cantidad;

$('.tabla_menu_pedido').on('click','button.pedir' ,function(){
    contador_productos = contador_productos +1;
    $(this).removeClass("btn-success pedir");
    $(this).addClass("btn-default");
    $(this).text("Ya Pedido");
    id_producto = $(this).attr("id");

    var datos_enviar = {"id_producto" : id_producto};
    
    $.ajax({
        url:"AjaxControladores/menu.ajax.controlador.php",
      	method: "POST",
      	data: datos_enviar,
      	dataType:"json",
      	success:function(respuesta){
            id_producto = respuesta["id_producto"];
            var nombre_producto = respuesta["nombre_producto"];
            var precio = respuesta["precio"];            
            $('.descripcionPedido').append(
                '<div class="row" style="padding:5px 15px">'+
                    '<!-- Descripción del producto -->'+
                    '<div class="col-xs-6" style="padding-right:0px">'+
                        '<div class="input-group">'+
                            '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto productoId" id="'+id_producto+'" value="'+id_producto+'"><i class="fa fa-times"></i></button></span>'+
                            '<input type="text" class="form-control nuevaDescripcionProducto" name="agregarProducto" value="'+nombre_producto+'" readonly required>'+
                        '</div>'+
                    '</div>'+
                    '<!-- Cantidad del producto -->'+
                    '<div class="col-xs-3">'+
                        '<input type="number" class="form-control nuevaCantidadProducto productoCantidad" min="1" value="1" name="txt_cantidad">'+
                    '</div>' +
                    '<!-- Precio del producto -->'+
                    '<div class="col-xs-3 precioProducto" style="padding-left:0px">'+
                        '<div class="input-group">'+
                            '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
                            '<input type="text" class="form-control precioFinalProducto" precioReal="'+precio+'" name="txt_precioProducto" value="'+precio+'" readonly required>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
            sumarPreciosProductosSeleccionados();
            cantidad = $('.nuevaCantidadProducto').val();
        }
    });    
});


//FUNCION CADA VEZ QUE NAVEGUE EN LA TABLA
$('.tabla_menu_pedido').on("draw.dt", function(){
   if(localStorage.getItem("quitarProducto") != null){
       var listaIdProductosSeleccionados  = JSON.parse(localStorage.getItem("quitarProducto"));
       for(var i=0; i<listaIdProductosSeleccionados.length; i++){
           //ESTA PARTE TRABAJA CUANDO ELIMINAS Y RECUPERAS DE OTRAS PÁGINAS DEL DATATABLE
           var icono = '<i class="fa fa-check"></i>';
           $('button.recuperarBoton[id="'+listaIdProductosSeleccionados[i]["id_producto"]+'"]').removeClass('btn-default');
           $('button.recuperarBoton[id="'+listaIdProductosSeleccionados[i]["id_producto"]+'"]').addClass('btn-success pedir');           
           $('button.recuperarBoton[id="'+listaIdProductosSeleccionados[i]["id_producto"]+'"]').html('Pedir&nbsp;&nbsp;&nbsp;'+icono);
       }
   }
});

//DESELECCIONAR PRODUCTO Y RECUPERAR BOTON
var idQuitarProducto = [];
localStorage.removeItem("quitarProducto");
$('.formularioPedido').on('click', 'button.quitarProducto', function(){
    $(this).parent().parent().parent().parent().remove();
    var id_producto = $(this).attr("id");
    
    //ALMACENANDO EN EL LOCALSTORAGE
    if(localStorage.getItem("quitarProducto") == null){
        idQuitarProducto = [];
    }else{
        idQuitarProducto.concat(localStorage.getItem("quitarProducto"));
    }
        
    var icono = '<i class="fa fa-check"></i>'; 
    
    idQuitarProducto.push({"id_producto":id_producto});
    localStorage.setItem("quitarProducto",JSON.stringify(idQuitarProducto));
    
    //ESTA PARTE TRABAJA EN LA MISMA PÁGINA DEL DATATABLE
    $('button.recuperarBoton[id="'+id_producto+'"]').removeClass('btn-default');    
    $('button.recuperarBoton[id="'+id_producto+'"]').addClass('btn-success pedir');
    $('button.recuperarBoton[id="'+id_producto+'"]').html('Pedir&nbsp;&nbsp;&nbsp;'+icono);
    
    sumarPreciosProductosSeleccionados();
//    agregarImpuesto();
});

//MODIFICAR LA CANTIDAD DEL PRODUCTO
var precioFinalProducto;
$('.formularioPedido').on('change','input.nuevaCantidadProducto', function(){
    //var precio = $(this).parent().parent().children(".precioProducto").children().children(".precioFinalUnidad");
    cantidad = $(this).val();
    var precioReal = $(this).parent().parent().children(".precioProducto").children().children(".precioFinalProducto").attr("precioReal");
    
    precioFinalProducto = cantidad * precioReal;
    //var precioCantidad = $(this).val() * precio.attr("precioReal");    
    $(this).parent().parent().children(".precioProducto").children().children(".precioFinalProducto").val(precioFinalProducto);
    
    sumarPreciosProductosSeleccionados();
//    agregarImpuesto();
});

//SUMANDO PRECIOS DE LOS PRODUCTOS SELECCIONADOS
function sumarPreciosProductosSeleccionados(){
    var precioProducto = $('.precioFinalProducto');
    var arraySumaProducto = [];
    var sumaTotalPrecio = 0;
    
    //Crea un array con la suma del precio (por cantidad) de un sólo producto
    for(var i=0; i<precioProducto.length; i++){
        arraySumaProducto.push(Number($(precioProducto[i]).val()));
    }   
    
    for(var i=0; i<arraySumaProducto.length; i++){
        sumaTotalPrecio += arraySumaProducto[i];
    }
    
    $('#totalPrecioProducto').val(sumaTotalPrecio.toFixed(2));
}

//
$('#crearVenta').on('click', function(){
    //Para insertar en tabla Pedido
    var idMozo = $("#seleccioneEmpleado").val();
    var idMesa = $("#seleccioneMesa").val();
    var llevar = $('input:radio[name=rd_llevar]:checked').val();
    var detallePedido = $("#detalle_pedido").val();
    var total = $("#totalPrecioProducto").val();
    var datos_pedido = {
        "pedido_id_mozo": idMozo,
        "pedido_id_mesa": idMesa,
        "pedido_llevar": llevar,
        "pedido_detalle": detallePedido,
        "pedido_total": total
    };
    
    var arrayProductosId = $(".productoId"); //obtiene todos los elementos con la clase .productoId
    var arrayProductosCantidad = $(".productoCantidad"); //obtiene todos los elementos de la clase .productoCantidades
    var cantidadFilas = arrayProductosId.length; //para obtener el numero de filas a insertar
    var array_pedido_producto = []; //para agrupar productos y respectivas cantidades
    
    $.ajax({
        url:"AjaxControladores/pedido.ajax.controlador.php",
      	method: "POST",
      	data: datos_pedido,
      	dataType:"json",
      	success:function(respuesta_pedido){
            //acá me retorna el id del ultimo pedido insertado para insertar en pedido_producto
            var idUltimoPedido = respuesta_pedido;

            for(var i = 0; i < cantidadFilas; i++){
                array_pedido_producto.push({
                    "producto_id" : arrayProductosId[i]["value"],
                    "producto_cantidad" : arrayProductosCantidad[i]["value"],
                    "pp_id_ultimoPedido": idUltimoPedido
                });
            }

            $.ajax({
                url:"AjaxControladores/pedido-producto.ajax.controlador.php",
                method:"POST",
                data: {
                    misPedidos: array_pedido_producto
                },
                success:function(respuesta_pedido_producto){
                    swal({
                            icon: "success",
                            type: "success",
                            title: "¡El pedido ha sido enviado correctamente!",
                            timer: 1500,
                            showConfirmButton: false                          
                            }).then(function(result){
                            
                                window.location = "pedido";
                            
                        });
                },
                error: function(xhr, ajaxOptions, thrownError, error) {
                    console.log(xhr.status);
                    console.log(thrownError);
                    swal({
                        icon: "error",
                        type: "error",
                        title: "El Pedido no se ha podido enviar !",
                        timer: 1500,
                        showConfirmButton: false
                        }).then(function(result){
                                    if(result.value){
                                            window.location = "pedido";
                                    }
                            });
                }
            });
        }
    });
});