$(document).ready(function(){

} );

    $('.tabla_menu_restaurant').DataTable({
    "bDeferRender": true,
    "sPaginationType": "full_numbers",
    "ajax":{
        "url": "AjaxControladores/menu.datatable.ajax.php",
        "type": "POST"
    },
    "columns":  [
                    {"data":"item"},
                    {"data":"estado"},
                    {"data":"nombre_producto"},
                    {"data":"descripcion_producto"},
                    {"data":"precio"},
                    {"data":"nombre_categoria"},
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