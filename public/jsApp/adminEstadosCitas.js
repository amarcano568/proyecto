selectedOptionMenu('40000', 'br-menu-link active show-sub', '40003', 'nav-link active');

$(document).on('ready', function() {
    var objetoDataTables_Estados = ''

    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    $('.chosen-select', this).chosen('destroy').chosen({
        width: '100%',
        height: '200%',
        disable_search_threshold: 10,
        no_results_text: "Oops, busqueda no encontrada!"
    });

    $("#iconos").change(function() {
        $("#previewIcon").html($("#iconos").val())
    });

    cargaEstados();

    function cargaEstados() {
        destroy_existing_data_table('#datatable-estados');
        objetoDataTables_Estados = $('#datatable-estados').DataTable({
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
                "sLengthMenu": " _MENU_ Estados",
                "sZeroRecords": "No se encontró ninguna Estado con la Condición del Filtro",
                "sEmptyTable": "Ninguna Estado Agregado aún...",
                "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ Estados",
                "sInfoEmpty": "De 0 al 0 de un total de 0 Estados",
                "sInfoFiltered": "(filtrado de un total de _MAX_ Estados)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": '<i class="text-info fa-2x fas fa-spinner fa-pulse"></i> espere cargando los Estados...',
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
                "url": "carga-Estados",
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
                "width": "15%",
                "targets": 1
            }, {
                "width": "50%",
                "targets": 2
            }, {
                "targets": [2, 3],
                className: "text-center",
            }]
        });
    }

    $('#btnNuevoEstado').click(function() {
        $("#div_listar_Estados").hide();
        $("#admin_edicion_Estados").show()
        $("#text_titulo").html('<i class="far fa-file"></i> Nuevo Estado de Citas.');

    });

    $('#btnCancelar').click(function() {
        cancelarNewEstado();
    });

    function cancelarNewEstado() {
        $("#div_listar_Estados").show();
        $("#admin_edicion_Estados").hide();
    }


    $("#enviaEmail").switchButton({
        on_label: 'Si',
        off_label: 'No'
    });

    // $.validator.setDefaults({
    //     ignore: ":hidden:not(select)"
    // });
    // $("#form_register_Estado").validate({
    //     errorElement: 'div',
    //     errorClass: 'help-block',
    //     focusInvalid: true,
    //     rules: {
    //         nomEstado: {
    //             required: true,
    //             minlength: 5,
    //             maxlength: 50
    //         }
    //     },
    //     messages: {
    //         nomEstado: {
    //             required: "Nombre del Estado requerido",
    //             minlength: "Mínimo Cinco (5) caracteres",
    //             maxlength: "Máximo Cincuenta (50) caracteres",
    //         }
    //     },
    //     invalidHandler: function(event, validator) { //display error alert on form submit   
    //         $('.alert-danger', $('.login-form')).show();
    //     },
    //     highlight: function(e) {
    //         $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
    //     },

    //     success: function(e) {
    //         $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
    //         $(e).remove();
    //     },
    //     errorPlacement: function(error, element) {
    //         if (element.is(':checkbox') || element.is(':radio')) {
    //             var controls = element.closest('div[class*="col-"]');
    //             if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
    //             else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
    //         } else if (element.is('.select2')) {
    //             error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
    //         } else if (element.is('.chosen-select')) {
    //             error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
    //         } else error.insertAfter(element.parent());
    //     },
    //     submitHandler: function(form) {

    //         alertify.confirm('Datos del Estado', '<h4 class="text-info">Esta seguro de guardar este Estado ..?</h4>', function() {
    //             tipoDoc = $("#TipoDoc").text();
    //             var form = $('#form_register_Estado');
    //             var formData = form.serialize();

    //             var route = form.attr('action');

    //             $.ajax({
    //                 url: route,
    //                 type: 'POST',
    //                 data: formData,
    //                 beforeSend: function() {
    //                     loadingUI('Actualizando');
    //                 }
    //             }).done(function(data) {
    //                 console.log(data)
    //                 $.unblockUI();
    //                 alertify.success('Estado registrado...');
    //                 objetoDataTables_Estados.ajax.reload();

    //             }).fail(function(statusCode, errorThrown) {
    //                 $.unblockUI();
    //                 console.log(errorThrown);
    //                 ajaxError(statusCode, errorThrown);
    //             });

    //             $('#form_register_Estado').each(function() {
    //                 this.reset();
    //             });

    //             cancelarNewEstado();

    //         }, function() { // En caso de Cancelar              
    //             alertify.error('Se Cancelo el Proceso para Guardar el Estado de Consulta.');
    //         }).set('labels', {
    //             ok: 'Confirmar',
    //             cancel: 'Cancelar'
    //         }).set({
    //             transition: 'zoom'
    //         }).set({
    //             modal: true,
    //             closableByDimmer: false
    //         });

    //     }

    // });


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


    $('body').on('click', '#body-estados a', function(e) {
        e.preventDefault();

        accion_ok = $(this).attr('data-accion');
        idEstado = $(this).attr('idEstado');

        switch (accion_ok) {

            case 'editarEstado': // Edita firma

                $.ajax({
                    url: 'buscar_Estado',
                    type: 'get',
                    datatype: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        idEstado: idEstado
                    }
                }).fail(function(statusCode, errorThrown) {
                    alert(statusCode + ' ' + errorThrown);
                }).done(function(data) {
                    console.log(data)
                    $("#div_listar_Estados").hide();
                    $("#admin_edicion_Estados").show()
                    $("#text_titulo").html('<i class="far fa-edit"></i> Editar Estado de Consulta.');
                    $("#idEstado").val(data.id);
                    $("#nomEstado").val(data.nombre);

                    statusEmail = data.email == 1 ? true : false;
                    $("#enviaEmail").switchButton({
                        checked: statusEmail
                    });

                    $("#iconos").val(data.icono);

                });
                break;

        }

    });


});