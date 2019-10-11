selectedOptionMenu('20000', 'br-menu-link active');
$(document).on('ready', function() {

    listarPacientes();

    function listarPacientes() {
        table_paciente = $("#tablePacientes").DataTable({
            "order": [
                [1, "asc"]
            ],
            dom: "B<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                extend: 'copyHtml5',
                title: '',
                messageTop: null,
                text: '<i class="far fa-copy"></i> Copiar '
            }, {
                extend: 'excel',
                title: '',
                messageTop: null,
                text: '<i class="far fa-file-excel"></i> Excel ',
                // exportOptions: {
                //     columns: [0, 2, 3, 4, 5, 6, 8, 9, 10, 11, 13]
                // },
                messageTop: 'Listado de Pacientes.'
            }, {
                extend: 'csvHtml5',
                text: '<i class="fas fa-file-csv"></i> CSV '
            }],
            //"dom"                                : '<"top"i>rt<"bottom"flp><"clear">',
            "paginationType": "input",
            "sPaginationType": "full_numbers",
            "language": {
                buttons: {
                    copyTitle: '<i class="fa fa-files-o fa-2x text-info" ></i> Listado de pacientes copiado al Portapales',
                    copySuccess: {
                        _: '%d Registros copiados.',
                        1: '1 Registro copiado.'
                    }
                },
                "searchPlaceholder": "Buscar",
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ Pacientes",
                "sZeroRecords": "No se encontró ningun Paciente con la Condición del Filtro",
                "sEmptyTable": "Ningun Paciente Agregado aún...",
                "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ Pacientes",
                "sInfoEmpty": "De 0 al 0 de un total de 0 Paciente",
                "sInfoFiltered": "(filtrado de un total de _MAX_ Pacientes)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": loadingUI('Procesando...', 'white'),
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
            "ajax": {
                "method": "get",
                "url": "muestra-Listado-Pacientes",
                "data": {}
            },
            "lengthMenu": [
                [5, 10, 20, 25, 50, -1],
                [5, 10, 20, 25, 50, "Todos"]
            ],
            // "columnDefs": [{
            //     "width": "5%",
            //     "targets": 0
            // }, {
            //     "width": "25%",
            //     "targets": 1
            // }, {
            //     "width": "25%",
            //     "targets": 2
            // }, {
            //     "width": "15%",
            //     "targets": 3
            // }, {
            //     "width": "15%",
            //     "targets": 4
            // }, {
            //     "width": "10%",
            //     "targets": 5
            // }],
            "iDisplayLength": 10,
            "initComplete": function(settings, json) {
                $.unblockUI();
            }
        });
    }

    $('[data-toggle="popover"]').popover();

    /*
             Eventos Click sobre la Table <grilla> de PreOrdenes.
        */
    $('body').on('click', '#tablePacientes a', function(e) {
        e.preventDefault();

        accion_ok = $(this).attr('data-accion');
        idPaciente = $(this).attr('idPaciente');
        switch (accion_ok) {
            case 'editar-paciente':
                $('#form-register-paciente').each(function() {
                    this.reset();
                });
                $.get(
                    "body-detalle-pacientes",
                    function(data) {
                        $("#body-modal-paciente").html(data);
                        $("#modal-paciente").modal('show');
                        $("#titleModalGral").html('<i class="far fa-user"></i> Editar datos del  paciente');
                        $.ajax({
                            url: 'buscar-paciente',
                            type: 'get',
                            dataType: "json",
                            data: {
                                _token: "{{ csrf_token() }}",
                                idPaciente: idPaciente
                            }
                        }).fail(function(statusCode, errorThrown) {
                            alert(statusCode + ' ' + errorThrown);
                        }).done(function(response) {
                            console.log(response);
                            $("#idPaciente").val(idPaciente);
                            $("#nombre").val(response.Nombres);
                            $("#apellido").val(response.Apellidos);
                            $("#nroDocumento").val(response.nroDoc);
                            $("#email").val(response.email);
                            $("#medicoProfesional").val(response.medicoProfesional);
                            $("#nombre_contacto").text(response.nombre_contacto);
                            $("#fono_contacto").val(response.fono_contacto);
                            $("#relacion").val(response.relacion_contacto);
                            $("#genero").val(response.sexo);
                            $("#nacionalidad").val(response.Pais);
                            $("#idioma").val(response.idioma);
                            $("#fonofijo").val(response.telFijo);
                            $("#fonoMovil").val(response.telMovil);
                            $("#direccion").val(response.direccion);
                            $("#ocupacion").val(response.ocupacion);
                            $("#convenio").val(response.convenio);
                            $("#porcConvenio").val(response.porc_convenio);
                            $("#convenio_notas").val(response.notas_convenio);
                            $("#nombre_resp").val(response.responsable_pago);
                            $("#fec_nacimiento").val(response.fecNac);

                            $(".chosen-select").trigger("chosen:updated");

                            $("#modal-paciente").modal('show');
                        });
                    });


                break;
            case y:
                // code block
                break;
            default:


        }
    });

    $(document).off('show.bs.modal', '#modal-paciente');
    $(document).on('show.bs.modal', '#modal-paciente', function(e) {
        $('.chosen-select', this).chosen('destroy').chosen({
            width: '100%',
            height: '200%',
            disable_search_threshold: 10,
            no_results_text: "Oops, busqueda no encontrada!"
        });
    });

    $(".tipDocumento").click(function(event) {
        var valor = $(this).text();
        $("#TipoDoc").text(valor);
        $("#nroDocumento").focus();
    })

    $("#pais").on('change', function() {
        estadosProvinciasChange($(this).val());
    });

    function estadosProvinciasChange(idPais) {
        $("#espereEstado").show();
        $.ajax({
            url: 'filtro-estadosProvincias',
            type: 'get',
            data: {
                _token: "{{ csrf_token() }}",
                idPais: idPais
            }
        }).fail(function(statusCode, errorThrown) {
            alert(statusCode + ' ' + errorThrown);
        }).done(function(response) {
            console.log(response)
            filterSelect('estadoProvincia', response, 'pais');
            $("#espereEstado").hide();
        });
    }

    function filterSelect(element, ids, type) {
        var select = $("#" + element);
        if (type == 'pais') {
            select.empty();
            select.append('<option value=""></option>')

            $(ids).each(function(i, data) {
                select.append('<option value="' + data.id + '">' + data.nombre + '</option>');
            });

            select.trigger("chosen:updated");
        }
    }


    $(document).on('click', '#btnSavePaciente', function(event) {
        var validarForm = $("#form_register_paciente").valid();
        if (validarForm === false) {
            return false;
        }
        alertify.confirm('Datos del paciente', '<h4 class="text-info">Esta seguro de guardar estos datos..?</h4>', function() {

            var form = $('#form_register_paciente');
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
                alertify.success('Paciente registrado...');
                table_paciente.ajax.reload();
                $("#modal-paciente").modal('hide');
            }).fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown);
            });

        }, function() { // En caso de Cancelar              
            alertify.error('Se Cancelo el Proceso para Guardar los datos del paciente.');
        }).set('labels', {
            ok: 'Confirmar',
            cancel: 'Cancelar'
        }).set({
            transition: 'zoom'
        }).set({
            modal: true,
            closableByDimmer: false
        });
    });

    $('#nuevoPaciente').on('click', function() {
        $('#form-register-paciente').each(function() {
            this.reset();
        });
        $.get(
            "body-detalle-pacientes",
            function(data) {
                $("#body-modal-paciente").html(data);
                $("#modal-paciente").modal('show');
                $("#titleModalGral").html('<i class="far fa-user"></i> Registrar nuevo paciente');
            });

    });

    jQuery.validator.setDefaults({
        errorClass: 'help-block',
        focusInvalid: true,
        ignore: ":hidden:not(select)",
        highlight: function(element) {
            $(element).removeClass('is-valid').addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        errorPlacement: function(error, element) {
            if (element.parent().hasClass('input-group')) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });


    $("#form_register_paciente").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 4
            },
            apellido: {
                required: true,
                minlength: 4
            },
            nroDocumento: {
                required: true,
                number: true,
                maxlength: 11
            },
            email: {
                required: true
            },
            medicoProfesional: {
                required: false
            },
            fec_nacimiento: {
                required: true
            },
            genero: {
                required: true
            },
            direccion: {
                required: true
            },
            direccion2: {
                required: true
            },
            nacionalidad: {
                required: true
            }
        },
        messages: {
            nombre: {
                required: "",
                minlength: "Mínimo cuatro (4) caracteres"
            },
            apellido: {
                required: "",
                minlength: "Mínimo cuatro (4) caracteres"
            },
            nroDocumento: {
                required: "",
                number: "Solo números",
                maxlength: 'Máx 11 digitos'
            },
            email: {
                required: "Correo del paciente requerido"
            },
            medicoProfesional: {
                required: "Profesional requerido"
            },
            fec_nacimiento: {
                required: "Requerida"
            },
            genero: {
                required: "Genero requerido"
            },
            nacionalidad: {
                required: "Nacionalida requerida"
            }
        },

        submitHandler: function(form) {



        }
    });



});