selectedOptionMenu('40000', 'br-menu-link active show-sub', '40002', 'nav-link active');

$(document).on('ready', function() {
    var objetoDataTables_motivos = ''

    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    $('.chosen-select', this).chosen('destroy').chosen({
        width: '100%',
        height: '200%',
        disable_search_threshold: 10,
        no_results_text: "Oops, busqueda no encontrada!"
    });

    cargaMotivos();

    function cargaMotivos() {
        destroy_existing_data_table('#datatable-motivos');
        objetoDataTables_motivos = $('#datatable-motivos').DataTable({
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
                "sLengthMenu": " _MENU_ Motivos",
                "sZeroRecords": "No se encontró ninguna Motivo con la Condición del Filtro",
                "sEmptyTable": "Ninguna Motivo Agregado aún...",
                "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ Motivos",
                "sInfoEmpty": "De 0 al 0 de un total de 0 Motivos",
                "sInfoFiltered": "(filtrado de un total de _MAX_ Motivos)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": '<i class="text-info fa-2x fas fa-spinner fa-pulse"></i> espere cargando los Motivos...',
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
                "url": "carga-motivos",
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
            }],
            "columnDefs": [{
                "width": "5%",
                "targets": 0
            }, {
                "width": "45%",
                "targets": 1
            }, {
                "width": "10%",
                "targets": 2
            }, {
                "targets": [2, 3],
                className: "text-center",
            }]
        });
    }

    $('#btnNuevoMotivo').click(function() {
        $("#div_listar_motivos").hide();
        $("#admin_edicion_motivos").show()
        $("#text_titulo").html('<i class="far fa-file"></i> Nuevo Motivo de Consulta.');

    });

    $('#btnCancelar').click(function() {
        cancelarNewMotivo();
    });

    function cancelarNewMotivo() {
        $("#div_listar_motivos").show();
        $("#admin_edicion_motivos").hide();
    }

    $('#tiempo').ionRangeSlider({
        grid: true,
        min: 15,
        max: 120,
        from: 15,
        step: 5,
        max_postfix: "+",
        prefix: "",
        postfix: " minutos",
    });

    $("#agenda").switchButton({
        on_label: 'Si',
        off_label: 'No'
    });

    $.validator.setDefaults({
        ignore: ":hidden:not(select)"
    });
    $("#form_register_motivo").validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: true,
        rules: {
            nomMotivo: {
                required: true,
                minlength: 5,
                maxlength: 50
            }
        },
        messages: {
            nomMotivo: {
                required: "Nombre del motivo requerido",
                minlength: "Mínimo Cinco (5) caracteres",
                maxlength: "Máximo Cincuenta (50) caracteres",
            }
        },
        invalidHandler: function(event, validator) { //display error alert on form submit   
            $('.alert-danger', $('.login-form')).show();
        },
        highlight: function(e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function(e) {
            $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
            $(e).remove();
        },
        errorPlacement: function(error, element) {
            if (element.is(':checkbox') || element.is(':radio')) {
                var controls = element.closest('div[class*="col-"]');
                if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            } else if (element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            } else if (element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            } else error.insertAfter(element.parent());
        },
        submitHandler: function(form) {

            alertify.confirm('Datos del motivo', '<h4 class="text-info">Esta seguro de guardar este motivo ..?</h4>', function() {
                tipoDoc = $("#TipoDoc").text();
                var form = $('#form_register_motivo');
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
                    alertify.success('Motivo registrado...');
                    objetoDataTables_motivos.ajax.reload();

                }).fail(function(statusCode, errorThrown) {
                    $.unblockUI();
                    console.log(errorThrown);
                    ajaxError(statusCode, errorThrown);
                });

                $('#form_register_motivo').each(function() {
                    this.reset();
                });

                cancelarNewMotivo();

            }, function() { // En caso de Cancelar              
                alertify.error('Se Cancelo el Proceso para Guardar el Motivo de Consulta.');
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

    $('body').on('click', '#body-motivos a', function(e) {
        e.preventDefault();

        accion_ok = $(this).attr('data-accion');
        idMotivo = $(this).attr('idMotivo');

        switch (accion_ok) {

            case 'editarMotivo': // Edita firma

                $.ajax({
                    url: 'buscar_motivo',
                    type: 'get',
                    datatype: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        idMotivo: idMotivo
                    }
                }).fail(function(statusCode, errorThrown) {
                    alert(statusCode + ' ' + errorThrown);
                }).done(function(data) {
                    console.log(data)
                    $("#div_listar_motivos").hide();
                    $("#admin_edicion_motivos").show()
                    $("#text_titulo").html('<i class="far fa-edit"></i> Editar Motivo de Consulta.');
                    $("#idMotivo").val(data.id);
                    $("#nomMotivo").val(data.nombre);

                    var instance = $("#tiempo").data("ionRangeSlider");

                    instance.update({
                        from: data.tiempo
                    });

                    statusAgenda = data.agenda == 1 ? true : false;
                    $("#agenda").switchButton({
                        checked: statusAgenda
                    });

                });
                break;

        }

    });


});