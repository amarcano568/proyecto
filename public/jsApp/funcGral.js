function selectedOptionMenu(id, clase, subId = '', navlink = '') {

    if (subId != '') {
        $(".nav-link").attr('class', 'nav-link');
        $("#" + subId).attr('class', navlink);
    }

    $(".br-menu-link").attr('class', 'br-menu-link');
    $("#" + id).attr('class', clase);

}


function loadingUI(message, color) {
    $.blockUI({
        baseZ: 2000,
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: color,
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            //opacity                  : 0.5,
            color: '#003465',
            //width                    : '40em'

        },
        message: '<h2><i class="fas fa-spinner fa-pulse"></i> <span class="hidden-xs">' + message + '</span></h2>'
    });
}

function responseUI(message, color) {
    $.blockUI({
        baseZ: 2000,
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: color,
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: 0.5,
            color: '#fff'
        },
        message: '<h2 class="blockUIMensaje">' + message + '</h2>'
    });

    setTimeout(function() {
        $.unblockUI();
    }, 2000);
}

// $(".nav-link").click(function(event) {

// })

function destroy_existing_data_table(tableDestry) {
    var existing_table = $(tableDestry).dataTable();
    if (existing_table != undefined) {
        existing_table.fnClearTable();
        existing_table.fnDestroy();
    }
}

function ajaxError(statusCode, errorThrown) {

    if (statusCode.status == 0) {
        alertify.alert('Alerta...', '<h4 class="yellow">Internet: Problemas de Conexion</h4>', function() {
            alertify.success('Ok');
        });
    } else if (statusCode.status == 422) {
        console.warn(statusCode.responseJSON.errors);
        // display errors on each form field
        $.each(statusCode.responseJSON.errors, function(i, error) {
            var el = $(document).find('[name="' + i + '"]');
            console.log(el)
            el.after($('<p style="color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding:1px 20px 1px 20px;">' + error[0] + '</p>'));
        })

    } else {
        console.log(statusCode);
        console.log(errorThrown);
        alertify.alert('Alerta...', '<h4 class="text-danger"><i class="text-danger fas fa-exclamation-triangle"></i> Error del Sistema</h4>', function() {
            alertify.success('Ok');
        });
    }


}

$(document).on('ready', function() {

    var sticky = Tellis_Sticky();
    sticky.init();
    sticky.write('<i class="text-success fas fa-check"></i> llamar al paciente Rigoberto Marcano G.');

    cargaPacientess();

    function cargaPacientess() {
        destroy_existing_data_table('#datatable-citasHoy');
        objetoDataTables_Pacientess = $('#atatable-citasHoy').DataTable({
            responsive: true,
            "order": [
                [0, "desc"]
            ],
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "paginationType": "input",
            "sPaginationType": "full_numbers",
            "language": {
                "searchPlaceholder": "Buscar",
                "sProcessing": "Procesando...",
                "sLengthMenu": " _MENU_ Pacientess",
                "sZeroRecords": "No se encontró ninguna Pacientes con la Condición del Filtro",
                "sEmptyTable": "Ningún Pacientes Agregado aún...",
                "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ Pacientess",
                "sInfoEmpty": "De 0 al 0 de un total de 0 Pacientess",
                "sInfoFiltered": "(filtrado de un total de _MAX_ Pacientess)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": '<i class="text-info fa-2x fas fa-spinner fa-pulse"></i> espere cargando los Pacientess...',
                "oPaginate": {
                    "sFirst": "<<",
                    "sLast": ">>",
                    "sNext": ">",
                    "sPrevious": "<",
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            "lengthMenu": [
                [5, 10, 20, 25, 50, -1],
                [5, 10, 20, 25, 50, "Todos"]
            ],
            "iDisplayLength": 5,
            "initComplete": function(settings, json) {
                $.unblockUI();
                $('[data-toggle="popover"]').popover();
            },
            "ajax": {
                "method": "get",
                "url": "carga-Pacientess",
                "data": {

                }
            },
            "columns": [{
                "data": 0
            }, {
                "data": 1,
            }, {
                "data": 2,
                "className": 'dt-center'
            }, {
                "data": 3,
                "className": 'dt-center'
            }, {
                "data": 4,
            }, {
                "data": 5,
            }],
            "columnDefs": [{
                "width": "5%",
                "targets": 0
            }, {
                "width": "20%",
                "targets": [1, 3, 4]
            }, {
                "targets": [4],
                className: "text-center",
            }]
        });
    }

});