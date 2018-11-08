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

var lista_pedido = [];

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
                '<div id="'+id_producto+'" class="row" style="padding:5px 15px">'+
                    '<!-- Descripción del producto -->'+	          
                    '<div class="col-xs-6" style="padding-right:0px">'+	          
                        '<div class="input-group">'+	              
                            '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" value="'+id_producto+'"><i class="fa fa-times"></i></button></span>'+
                            '<input type="text" class="form-control nuevaDescripcionProducto" name="agregarProducto" value="'+nombre_producto+'" readonly required>'+
                            '<input type="text" class="idpro" name="txt_idProducto" value="'+id_producto+'" readonly>'+
                        '</div>'+
                    '</div>'+
                    '<!-- Cantidad del producto -->'+
                    '<div class="col-xs-3">'+	            
//                        '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+
                        '<input type="number" class="form-control nuevaCantidadProducto" min="1" value="1" name="txt_cantidad">'+
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
//            var idProd = $('.quitarProducto').attr("id");
//            alert("poo:"+idProd);
//            var cant = $('.nuevaCantidadProducto').val();
//            alert("poo:"+cant);
            alert("Van: "+contador_productos+" productos");
            //SUMANDO LOS PRECIOS            
            //listarProductos(id_producto, nombre_producto, precio);
            sumarPreciosProductosSeleccionados();
            alert("El id del producto seleccionado es: "+id_producto);
            cantidad = $('.nuevaCantidadProducto').val();
            alert("La cantidad es: "+cantidad);
            lista_pedido.push([id_producto,cantidad]);
//            
//            
//            contarProductos(contador_productos);
//            agregarImpuesto();
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
    lista_productos_seleccionados.pop(id_producto);
    lista_cantidades_seleccionadas.pop();
//    agregarImpuesto();
});

//MODIFICAR LA CANTIDAD DEL PRODUCTO
var precioFinalProducto;
$('.formularioPedido').on('change','input.nuevaCantidadProducto', function(){
    //var precio = $(this).parent().parent().children(".precioProducto").children().children(".precioFinalUnidad");
    cantidad = $(this).val();
    var id_esto = $(this).parent().parent().attr("id");
    alert("Ahora la cantidad del id:"+id_esto+"es:"+cantidad);
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
    
    $('#totalPrecioProducto').val(sumaTotalPrecio);
}

//
$('#crearVenta').on('click', function(){
    var lista_pedido = [];
    var ped_id_producto = $('.quitarProducto');
    
    for(var i=0; i<contador_productos; i++){    
        alert("El id del producto es: "+$(ped_id_producto[i]).val());
    }    
});
//    
//        alert("is: "+id_producto);
//        
//	var listaProductos = [];
//        
//        alert("id: "+id_producto+"desc:  " +descripcion + "cant: "+ cantidad + "prec: "+precioFinalProducto);
//        
////	for(var i = 0; i < descripcion.length; i++){
////            listaProductos.push({   "id" : $(descripcion[i]).attr("id"), 
////                                    "descripcion" : $(descripcion[i]).val(),
////                                    "cantidad" : $(cantidad[i]).val(),
////                                    "precio" : $(precio[i]).attr("precioReal")});
////	}
////	$("#lista_productos").val(JSON.stringify(listaProductos));
//}

//FUNCIÓN AGREGAR IMPUESTO
//function agregarImpuesto(){
//    var impuesto = $('#impuesto').val();
//    var totalPrecioProducto = $('#totalPrecioProducto').val();    
//    var montoImpuesto = (impuesto/100)*totalPrecioProducto;
//    console.log("monto provisional:"+montoImpuesto);
//    var montoTotal = Number(montoImpuesto)+Number(totalPrecioProducto);
//    console.log("Costo Final:"+montoTotal);
//    $('#totalPrecioProducto').val(montoTotal);
//}




//$('#crearVenta').on('click', function(){
//    swal({
//        title: '¿Enviar Pedido?',
//        text: "You won't be able to revert this!",
//        type: 'question',
//        showCancelButton: true,
//        confirmButtonColor: '#52BE80',
//        cancelButtonColor: '#d33',
//        confirmButtonText: 'Sí, enviar'
//    }).then((result) => {
//      if (result.value) {
//        swal('Listo!','Tu pedido se ha enviado','success');
//      }
//    });
//});

//swal({
//  title: 'Are you sure?',
//  text: "You won't be able to revert this!",
//  type: 'warning',
//  showCancelButton: true,
//  confirmButtonColor: '#3085d6',
//  cancelButtonColor: '#d33',
//  confirmButtonText: 'Yes, delete it!'
//}).then((result) => {
//  if (result.value) {
//    swal(
//      'Deleted!',
//      'Your file has been deleted.',
//      'success'
//    )
//  }
//})