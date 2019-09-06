$(document).on('ready', function() {

    $("#tablePacientes").DataTable({
        "order": [
            [1, "desc"]
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
            exportOptions: {
                columns: [0, 2, 3, 4, 5, 6, 8, 9, 10, 11, 13]
            },
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
                    $("#idPaciente").val(response.idpacientes);
                    $("#nomPaciente").val(response.Nombres);
                    $("#apePaciente").val(response.Apellidos);
                    $("#nroDocumento").val(response.nroDoc);
                    $("#TipoDoc").text(response.tipoDoc);
                    $("#fecNac").val(response.fecNac);
                    $("#sexo").val(response.sexo);
                    $("#mailPac").val(response.email);
                    $("#pais").val(response.Pais);
                    $("#estadoProvincia").val(response.ciudad);
                    $("#telFijo").val(response.telFijo);
                    $("#telMovil").val(response.telMovil);
                    $("#direccion").val(response.direccion);
                    $("#tipoSangre").val(response.tipoSangre);
                    $("#telEmergencia").val(response.telEmergencia);
                    $(".chosen-select").trigger("chosen:updated");
                    $("#modal-paciente").modal('show');
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

    $.validator.setDefaults({
        ignore: ":hidden:not(select)"
    });
    $("#form-register-paciente").validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: true,
        rules: {
            nomPaciente: {
                required: true,
                minlength: 2
            },
            apePaciente: {
                required: true,
                minlength: 2
            },
            nroDocumento: {
                required: true,
                number: true
            },
            fecNac: {
                required: true
            },
            sexo: {
                required: true
            },
            mailPac: {
                required: true,
                email: true
            },
            pais: {
                required: true
            },
            estadoProvincia: {
                required: true
            },
            direccion: {
                required: true
            }
        },
        messages: {
            nomPaciente: {
                required: "Nombre del paciente requerido",
                minlength: "Mínimo dos (2) caracteres"
            },
            apePaciente: {
                required: "Apellido del paciente requerido",
                minlength: "Mínimo dos (2) caracteres"
            },
            nroDocumento: {
                required: "# Documento requerido",
                number: "Solo números"
            },
            fecNac: {
                required: "Fecha nacimiento requerida"
            },
            sexo: {
                required: "Sexo requerido"
            },
            mailPac: {
                required: "Correo requerido",
                email: 'Debe ingresar un correo valido'
            },
            pais: {
                required: "País requerido"
            },
            estadoProvincia: {
                required: "Requerido"
            },
            direccion: {
                required: "Direcciión requerida"
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



        }


    });

    //Validate send register solicitude
    $('#registrar').on('click', function() {
        var validarForm = $("#form-register-paciente").valid();
        if (validarForm === false) {
            return false;
        }
        alertify.confirm('Datos del paciente', '<h4 class="text-info">Esta seguro de guardar estos datos..?</h4>', function() {
            tipoDoc = $("#TipoDoc").text();
            var form = $('#form-register-paciente');
            var formData = form.serialize() + "&tipoDoc=" + tipoDoc;

            // formData.push({
            //     name: 'tipoDoc',
            //     value: tipoDoc
            // });
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
                // setTimeout(function() {
                //     window.location.href = '/pacientes';
                // }, 900);

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
        $("#modal-paciente").modal('show');
    });

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

});