selectedOptionMenu('40000', 'br-menu-link active show-sub', '40004', 'nav-link active');

$(document).on('ready', function() {
    var objetoDataTables_convenios = ''

    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    $('.chosen-select', this).chosen('destroy').chosen({
        width: '100%',
        height: '200%',
        disable_search_threshold: 10,
        no_results_text: "Oops, busqueda no encontrada!"
    });

    $("#status").switchButton({
        on_label: 'Activo',
        off_label: 'Inactivo'
    });

    cargaConvenios();

    function cargaConvenios() {
        destroy_existing_data_table('#datatable-convenios');
        objetoDataTables_convenios = $('#datatable-convenios').DataTable({
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
                "sLengthMenu": " _MENU_ Convenios",
                "sZeroRecords": "No se encontró ninguna Convenio con la Condición del Filtro",
                "sEmptyTable": "Ningún Convenio Agregado aún...",
                "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ Convenios",
                "sInfoEmpty": "De 0 al 0 de un total de 0 Convenios",
                "sInfoFiltered": "(filtrado de un total de _MAX_ Convenios)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": '<i class="text-info fa-2x fas fa-spinner fa-pulse"></i> espere cargando los Convenios...',
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
                "url": "carga-Convenios",
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

    $('#porcDscto').ionRangeSlider({
        grid: true,
        min: 0,
        max: 100,
        from: 0,
        step: 1,
        //max_postfix: "+",
        prefix: "",
        postfix: "% Dscto.",
    });

    $('#btnNuevoConvenio').click(function() {
        $("#div_listar_Convenios").hide();
        $("#admin_edicion_Convenios").show()
        $("#text_titulo").html('<i class="far fa-file"></i> Nuevo Convenio.');

    });

    $('#btnCancelar').click(function() {
        cancelarNewConvenio();
    });

    function cancelarNewConvenio() {
        $("#div_listar_Convenios").show();
        $("#admin_edicion_Convenios").hide();
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
                        guardarConvenios();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    function guardarConvenios() {
        alertify.confirm('Datos del Estado', '<h4 class="text-info">Esta seguro de guardar este Convenio ..?</h4>', function() {

            var form = $('#form_register_Convenio');
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
                alertify.success('Convenio registrado...');
                objetoDataTables_convenios.ajax.reload();
                cancelarNewConvenio();
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

    $('body').on('click', '#body-convenios a', function(e) {
        e.preventDefault();

        accion_ok = $(this).attr('data-accion');
        idConvenio = $(this).attr('idConvenio');

        switch (accion_ok) {

            case 'editarConvenio': // Edita firma

                $.ajax({
                    url: 'buscar_Convenio',
                    type: 'get',
                    datatype: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        idConvenio: idConvenio
                    }
                }).fail(function(statusCode, errorThrown) {
                    alert(statusCode + ' ' + errorThrown);
                }).done(function(data) {
                    console.log(data)
                    $("#div_listar_Convenios").hide();
                    $("#admin_edicion_Convenios").show()
                    $("#text_titulo").html('<i class="far fa-edit"></i> Editar Convenio de Consulta.');
                    $("#idConvenio").val(data.id);
                    $("#nomConvenio").val(data.nombreConvenio);
                    $("#responsable").val(data.encargado).trigger("chosen:updated");
                    $("#notas").val(data.nota);

                    var instance = $("#porcDscto").data("ionRangeSlider");
                    instance.update({
                        from: data.porceDscto
                    });

                    status = data.status == 1 ? true : false;

                    $("#status").switchButton({
                        checked: status
                    });

                });
                break;

        }

    });


});