$(document).ready(function(){
    
});


//DATATABLE QUE CONTIENE LOS USUARIOS QUE PUEDEN ACCEDER AL SISTEMA

$('.tabla_gestion_usuarios').DataTable({    
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "ajax":{
        "url": "AjaxControladores/gestion_usuario.datatable.ajax.php",
        "type": "POST"
    },
    "columns":  [
                    {"data":"item"},
                    {"data":"usuario"},
                    {"data":"persona"},
                    {"data":"estado"},
                    {"data":"rol"},
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


//BOTON ACTIVAR - DESACTIVAR USUARIO
$('.tabla_gestion_usuarios').on('click',"button.btnActivar" ,function(){
    
    var id_userSystem = $(this).attr("id");
    var estado = $(this).text();

    if($(this).val()=="activo"){
        $(this).removeClass("btn-success");
        $(this).addClass("btn-danger");
        $(this).text("inactivo");
        $(this).val("inactivo");
    }else{
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        $(this).text("activo");
        $(this).val("activo");
    }
    
    var datos = {
        "id_usuario" : id_userSystem,
        "estado" : estado
    };
    
    $.ajax({
        url: "AjaxControladores/gestion_usuario.ajax.php",
        method : "POST",
        data: datos,
        dataType: "json",
        success: function(respuesta){
            if(respuesta["estado"]=="activo"){
                $(this).removeClass("btn-success");
                $(this).addClass("btn-danger");
            }
        }
    });    
    
});

