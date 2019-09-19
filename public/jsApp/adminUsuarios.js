selectedOptionMenu('40000', 'br-menu-link active show-sub', '40001', 'nav-link active');

$(document).on('ready', function() {

    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    $('.chosen-select', this).chosen('destroy').chosen({
        width: '100%',
        height: '200%',
        disable_search_threshold: 10,
        no_results_text: "Oops, busqueda no encontrada!"
    });

    $("#chosenPacientes").on('change', function() {

    });


    listarUsuarios();

    function listarUsuarios() {
        destroy_existing_data_table('#datatable-usuarios');
        objetoDataTables_Usuarios = $('#datatable-usuarios').DataTable({
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
                "sLengthMenu": " _MENU_ Usuarios",
                "sZeroRecords": "No se encontró ninguna Usuario con la Condición del Filtro",
                "sEmptyTable": "Ninguna Usuario Agregado aún...",
                "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ Usuarios",
                "sInfoEmpty": "De 0 al 0 de un total de 0 Usuarios",
                "sInfoFiltered": "(filtrado de un total de _MAX_ Usuarios)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": '<i class="text-info fa-2x fas fa-spinner fa-pulse"></i> espere cargando los Usuarios...',
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
                "url": "carga-Usuarios",
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
                "width": "15%",
                "targets": 1
            }, {
                "width": "%",
                "targets": [
                    1,
                    2,
                    3
                ]
            }, {
                "targets": [4],
                className: "text-center",
            }]
        });
    }

    $('#btnNuevoUsuario').click(function() {
        $("#div_listar_Estados").hide();
        $("#admin_edicion_usuario").show()
        $("#barra_titulo").html('<i class="fas fa-user-plus"></i> Nuevo Usuario.');

    });

    $('#btnCancelar').click(function() {
        cancelarNewEstado();
    });

    function cancelarNewEstado() {
        $("#div_listar_Estados").show();
        $("#admin_edicion_usuario").hide();
    }

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    if (form.checkValidity() === false) {
                        event.stopPropagation();
                    } else {
                        guardarEstadosCitas();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    function guardarEstadosCitas() {
        alertify.confirm('Datos del Estado', '<h4 class="text-info">Esta seguro de guardar este Estado ..?</h4>', function() {

            var form = $('#form_register_estado');
            var formData = form.serialize();

            var route = form.attr('action');

            $.ajax({
                url: route,
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    loadingUI('Actualizando');
                }
            }).done(function(data) {
                console.log(data)
                $.unblockUI();
                alertify.success('Estado de cita registrado...');
                objetoDataTables_Estados.ajax.reload();

            }).fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown);
            });

            $('#form_register_estado').each(function() {
                this.reset();
            });


        }, function() { // En caso de Cancelar              
            alertify.error('Se Cancelo el Proceso para Guardar el Estado de la Consulta.');
        }).set('labels', {
            ok: 'Confirmar',
            cancel: 'Cancelar'
        }).set({
            transition: 'zoom'
        }).set({
            modal: true,
            closableByDimmer: false
        });
    }


});