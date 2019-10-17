selectedOptionMenu('60000', 'br-menu-link active');
$(document).on('ready', function() {
    var fecCita = ''
    var pacCita = ''

    $('.chosen-select', this).chosen('destroy').chosen({
        width: '100%',
        height: '200%',
        disable_search_threshold: 10,
        no_results_text: "Oops, busqueda no encontrada!"
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


    $("#formCitas").validate({
        rules: {
            fechaCita: {
                required: true
            },
            chosenPacientes: {
                required: true
            },
            chosenMedico: {
                required: true
            },
            notas: {
                maxlength: 1000
            },

        },
        messages: {
            fechaCita: {
                required: "Fecha requerida"
            },
            chosenPacientes: {
                required: "Paciente requerido"
            },
            chosenMedico: {
                required: "Médico requerido"
            },
            notas: {
                maxlength: "Máximo Mil (1000) caracteres"
            }
        },

        submitHandler: function(form) {
            fecCita = $('#fechaCita').val();
            var combo = document.getElementById("chosenPacientes");
            pacCita = combo.options[combo.selectedIndex].text;

            alertify.confirm('Cita Médica', '<h4 class="text-info">Esta seguro de guardar estos datos..?</h4>', function() {

                var form = $('#formCitas');
                var formData = form.serialize();

                var route = form.attr('action');
                $.ajax({
                    url: route,
                    type: 'POST',
                    data: formData,
                    datatype: 'json',
                    beforeSend: function() {
                        loadingUI('Actualizando');
                    }
                }).done(function(data) {
                    console.log(data)
                    $.unblockUI();
                    alertify.success('Cita médica registrada...');
                    $("#modal-citaAdd").modal("hide");

                    if (data.success === true) {
                        fechaCita = $("#fechaCita").val();
                        Pacientes = $('select[name="chosenPacientes"] option:selected').text().trim();
                        var event = {
                            id: data.id,
                            title: Pacientes,
                            start: fechaCita,
                            end: fechaCita,
                            color: '#18A4B2',
                            textColor: 'white'
                        };

                        $('.fc').fullCalendar('renderEvent', event, true);
                    }

                }).fail(function(statusCode, errorThrown) {
                    $.unblockUI();
                    console.log(errorThrown);
                    ajaxError(statusCode, errorThrown);
                });

            }, function() { // En caso de Cancelar              
                alertify.error('Se Cancelo el Proceso para Guardar la cita médica.');
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


    function ActualizaHorasCitasDisponibles() {
        nameMedico = $("#chosenMedico option:selected").text();
        idMedico = $("#chosenMedico").text();
        $("#esperaHorasCitas").html('<i class="text-success fa-2x fas fa-spinner fa-spin"></i> Espere cargando horario disponible para el día seleccionado.');

        var dia = $("#fechaCita").val();
        $.ajax({
            url: 'horas-cita-NoDisponibles',
            type: 'get',
            data: {
                'dia': dia,
                'idMedico': idMedico
            },
            datatype: 'json',
            beforeSend: function() {
                loadingUI('Buscando Horas para el Médico ' + nameMedico);
            }
        }).done(function(data) {
            $("#esperaHorasCitas").html(data);
            $.unblockUI();
        }).fail(function(statusCode, errorThrown) {
            $.unblockUI();
            console.log(errorThrown);
            ajaxError(statusCode, errorThrown);
        });
    }

    $(document).on('change', '#chosenMedico', function(event) {
        ActualizaHorasCitasDisponibles();
    });

});