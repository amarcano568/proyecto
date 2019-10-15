selectedOptionMenu('50000', 'br-menu-link active show-sub', '50002', 'nav-link active');

$(document).on('ready', function() {

    $("#diasTrabajo").select2(configSelect2());

    function configSelect2() {
        return {
            theme: "bootstrap",
            placeholder: "Seleccione los días laborables.",
            containerCssClass: "wrap",
            allowClear: true,
            language: "es",
            minimumResultsForSearch: 10
        }
    }

    $('#horaDesde').datetimepicker({
        format: 'LT'
    });

    $('#horaHasta').datetimepicker({
        format: 'LT'
    });

    var minutos = $('#tiempoMinutos').val();

    $('#tiempoMinutos').ionRangeSlider({
        grid: true,
        min: 10,
        max: 60,
        from: 0,
        step: 5,
        //max_postfix: "+",
        prefix: "",
        postfix: " Minutos",
    });

    var instance = $("#tiempoMinutos").data("ionRangeSlider");

    instance.update({
        from: minutos
    });


    jQuery.validator.setDefaults({
        errorClass: 'help-block',
        focusInvalid: true,
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

    $.validator.addMethod("timeAMPM", function(value, element) {
        return this.optional(element) || /^([0]?[1-9]|1[0-2]):([0-5]\d)\s?(AM|PM)$/i.test(value);
    }, "Passwords are 8-16 characters with uppercase letters, lowercase letters and at least one number.");

    $("#formConfigAgenda").validate({
        rules: {
            diasTrabajo: "required",
            hora_desde: {
                required: true,
                timeAMPM: true
            },
            hora_hasta: {
                required: true,
                timeAMPM: true
            },
        },
        messages: {
            diasTrabajo: "<i class='fas fa-exclamation-triangle'></i> Días de trabajo semanal requerido.",
            hora_desde: {
                required: "<i class='fas fa-exclamation-triangle'></i> Hora desde requerido.",
                timeAMPM: "La hora debe tener este Formato Ejemplo: 08:00 AM"
            },
            hora_hasta: {
                required: "<i class='fas fa-exclamation-triangle'></i> Hora desde requerido.",
                timeAMPM: "La hora debe tener este Formato Ejemplo: 08:00 AM"
            }
        },

        submitHandler: function(form) {

            alertify.confirm('Configuración de la Agenda', '<h4 class="text-info">Esta seguro de guardar estos datos..?</h4>', function() {
                var diasTrabajo = $('#diasTrabajo').val();

                var form = $('#formConfigAgenda');
                var formData = form.serialize() + "&diasTrabajoMultiple=" + diasTrabajo;;
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
                    if (data.success === true) {
                        alertify.success('Datos de la Agenda actualizados....');
                    } else {
                        alertify.success('Error - no se pudo actualizar los datos de la Agenda...');
                    }
                }).fail(function(statusCode, errorThrown) {
                    $.unblockUI();
                    console.log(errorThrown);
                    ajaxError(statusCode, errorThrown);
                });

            }, function() { // En caso de Cancelar              
                alertify.error('Se Cancelo el Proceso para Guardar la configuración de la Agenda.');
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


});