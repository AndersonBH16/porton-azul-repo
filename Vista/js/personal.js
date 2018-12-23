$(document).ready(function(){
    
} );

$('.tabla_personal').DataTable({
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "ajax":{
        "url": "AjaxControladores/personal.datatable.ajax.php",
        "type": "POST"
    },
    "columns":  [
                    {"data":"item"},
                    {"data":"dni"},
                    {"data":"nombre_personal"},
                    {"data":"cargo"},
                    {"data":"hora_entrada"},
                    {"data":"hora_salida"},
                    {"data":"telefono"},
                    {"data":"direccion"},
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

$('#btn_abrirModal').click(function(){
    $('#modalAgregarPersonal').modal('toggle');
    $('#title_modal').text('Crear personal');
    $('#btnGuardarPersonal').text('Guardar');

    //Eliminar datos si existieran
    $('#dni').val("");
    $('#nombre').val("");
    $('#sel_perfil').val("");
});

function crearPersonal(){    
    var dni = $('#dni').val();
    var nombre = $('#nombre').val();
    var telefono = $('#telefono').val();
    var direccion = $('#direccion').val();
    var hora_entrada = $('#hora_entrada').val();
    var hora_salida = $('#hora_salida').val();
    var id_perfil = $('#sel_perfil').val();
    var id_area = $('#sel_area').val();
    
    var datos = {
        "dni" : dni,
        "nombre" : nombre,
        "telefono" : telefono,
        "direccion" : direccion,
        "hora_entrada" : hora_entrada,
        "hora_salida" : hora_salida,
        "id_perfil" : id_perfil,
        "id_area" : id_area
    };
    
    $.ajax({
        data: datos, 
        method: "POST",
        url: "AjaxControladores/personal.ajax.controlador.php",
        cache: false,
        dataType: "json",
        success: function(respuesta){
            if(respuesta){
                $('#modalAgregarPersonal').hide();
                swal({
                    type: "success",
                    title: "¡El usuario ha sido guardado correctamente!",
                    showConfirmButton: false,
                    timer: 1000
                }).then(function(){
                    window.location = "personal";                        
                });
            }            
        }
    });    
}

function editarPersonal(id_personal){
    $('#modalAgregarPersonal').modal('toggle');
    $('#title_modal').text('Modificar Personal');
    $('#btnGuardarPersonal').text('Actualizar');
    
    var datos_editar = {"id_personal" : id_personal};
    
    $.ajax({
        url:"AjaxControladores/personal.ajax.controlador.php",
      	method: "POST",
      	data: datos_editar,
      	success:function(respuesta){
            var datos = JSON.parse(respuesta);
            console.log(datos);

            $('#dni').val(datos[0].dni_personal);
            $('#nombre').val(datos[0].nombre_personal);
            $('#sel_perfil').val(datos[0].nombre_perfil);
        }
    });
}

$('.tabla_personal').on('click','button.eliminarPersonal', function(){
    alert("Intentas Eliminar"+$(this).attr("id"));
});
