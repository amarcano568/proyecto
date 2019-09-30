selectedOptionMenu('50000', 'br-menu-link active show-sub', '50001', 'nav-link active');

$(document).on('ready', function() {

    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    $('.chosen-select', this).chosen('destroy').chosen({
        width: '100%',
        height: '200%',
        disable_search_threshold: 10,
        no_results_text: "Oops, busqueda no encontrada!"
    });

    $("#sucursales").select2(configSelect2());

    function configSelect2() {
        return {
            theme: "bootstrap",
            placeholder: "Seleccione una Sucursal.",
            containerCssClass: "wrap",
            allowClear: true,
            language: "es",
            minimumResultsForSearch: 10
        }
    }

    $(document).on('change', '#sucursales', function(event) {
        buscarSucursal($(this).val());
    });

    buscarSucursal('1');

    $('#btnNuevaSucursal').click(function() {
        buscarSucursal('');
        $('#sucursales').val('').trigger("change").select2(configSelect2());
    });

    function buscarSucursal(idSucursal) {
        loadingUI('Procesando...', 'white');
        $.ajax({
            url: 'buscar_sucursal',
            type: 'get',
            datatype: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                idSucursal: idSucursal
            }
        }).fail(function(statusCode, errorThrown) {
            alert(statusCode + ' ' + errorThrown);
        }).done(function(data) {
            console.log(data)
            $.unblockUI();
            if (idSucursal == '1') {
                $("#empresa_config_group").show();
            } else {
                $("#empresa_config_group").hide();
            }

            if (data.logo == '' || data.logo === null) {
                iconoDropZone = '<i class="far fa-images"></i><br><h6>Click para agregar Logo.</h6>';
            } else {
                iconoDropZone = '<img class="img-thumbnail" src="' + data.logo + '" style="width:100px;height:98px">';
            }

            configuraDropZone(iconoDropZone, data.id);

            $("#id_sucursal").val(data.id);
            $("#nombre_clinica").val(data.nombreEmpresa);
            $("#sucursal_config").val(data.nombre);
            $("#nroDocFiscal").val(data.nroFiscal);
            $("#nombre_corto_config").val(data.nombreCortoSucursal);
            $("#direccion").val(data.direccion);
            $("#fono1_config").val(data.telPrincipal);
            $("#fono2_config").val(data.telSecundario);
            $("#email").val(data.email);
            $("#pagina_web_config").val(data.web);

            var instance = $("#sillones").data("ionRangeSlider");
            instance.update({
                from: data.sillones
            });

        });
    }

    function configuraDropZone(iconoDropZone, idSucursal) {

        Dropzone.autoDiscover = false;
        if (Dropzone.instances.length > 0) Dropzone.instances.forEach(bz => bz.destroy());
        $("#formDropZone").html('');
        $("#formDropZone").append("<form action='subir-logo' method='POST' files='true' enctype='multipart/form-data' id='dZUpload' class='dropzone borde-dropzone' style='width: 100%;padding: 0;cursor: pointer;'>" +
            "<div style='padding: 0;margin-top: 0em;' class='dz-default dz-message text-center'>" +
            "<h1>" + iconoDropZone + "</h1>" +
            "</div></form>");

        myAwesomeDropzone = myAwesomeDropzone = {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ url("delete") }}',
                    data: {
                        filename: name
                    },
                    success: function(data) {
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            params: {
                idSucursal: idSucursal,
            },
            success: function(file, response) {
                console.log(response);
                fotoSubida = response
            },
            error: function(file, response) {
                return false;
            }
        }

        var myDropzone = new Dropzone("#dZUpload", myAwesomeDropzone);

        myDropzone.on("queuecomplete", function(file, response) {

            if (Dropzone.instances.length > 0) Dropzone.instances.forEach(bz => bz.destroy());
            iconoDropZone = '<img class="img-thumbnail" src="' + fotoSubida + '" style="width:100px;height:98px">';
            configuraDropZone(iconoDropZone, idSucursal);

        });
    }

    $("#chosenPacientes").on('change', function() {

    });

    seeker($('.medicamentos-seeker'), 'Medicamentos', 'buscar-medicamentos');

    function seeker(element, name, Opcion) {
        if (element.length !== 0) {
            element.typeahead({
                minLength: 5,
                hightligth: true,
                hint: true
            }, {
                name: name,
                displayKey: 'label',
                templates: {
                    empty: [
                        '<p><strong>&nbsp; No se encontro resultados  &nbsp;</strong></p>'
                    ].join('\n'),
                    suggestion: function(data) {
                        console.log(data)
                        return '<p><strong>' + data.id + ': ' + data.label + '</strong></p>';
                    }
                },
                limit: 10,
                source: function(query, processSync, processAsync) {
                    //processSync(['This suggestion appears immediately', 'This one too']);
                    return $.ajax({
                        url: "buscar-medicamentos",
                        type: 'get',
                        async: true,
                        data: {
                            _token: "{{ csrf_token() }}",
                            findMedicamento: query
                        },
                        dataType: 'json',
                        success: function(json) {
                            return processAsync(json);
                        }
                    });
                }
            }).on('typeahead:selected', function(evt, item) {
                console.log(item);
                idMedicamento = item.id;
                nombreMedicamento = item.label;
                $('#indicaciones').prop('readonly', false);
                $('#indicaciones').focus();
            });
        }
    }

    $('#sillones').ionRangeSlider({
        grid: true,
        min: 0,
        max: 30,
        from: 0,
        step: 1,
        //max_postfix: "+",
        prefix: "",
        postfix: " Sillones",
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

    $("#formConfigEmpresa").validate({
        rules: {
            nombre_clinica: "required",
            sucursal_config: "required",
            nombre_corto_config: {
                required: true,
                minlength: 2,
                maxlength: 20
            },
            email: {
                required: true,
                email: true
            },
            nroDocFiscal: {
                required: true
            },
            direccion: {
                required: true
            },

        },
        messages: {
            nombre_clinica: "",
            sucursal_config: "",
            nombre_corto_config: {
                required: "",
                minlength: "Mínimo dos (2) caracteres.",
                maxlength: "Máximo Veinte (20) caracteres.",
            },
            email: {
                required: "<span class='text-danger'>Correo electrónico requerido.</span>"
            },
            nroDocFiscal: {
                required: ""
            },
            direccion: {
                required: "La dirección es requerida."
            },
        },

        submitHandler: function(form) {

            alertify.confirm('Datos de la Empresa', '<h4 class="text-info">Esta seguro de guardar estos datos..?</h4>', function() {

                var form = $('#formConfigEmpresa');
                var formData = form.serialize();
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
                    alertify.success('Empresa Registrada...');
                    recargaSelect2Sucucrsales(data);

                }).fail(function(statusCode, errorThrown) {
                    $.unblockUI();
                    console.log(errorThrown);
                    ajaxError(statusCode, errorThrown);
                });

            }, function() { // En caso de Cancelar              
                alertify.error('Se Cancelo el Proceso para Guardar los datos de la Empresa');
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

    function recargaSelect2Sucucrsales(ListaSucursales) {
        $("#sucursales").empty();
        $(ListaSucursales).each(function(i, data1) {
            $("#sucursales").append('<option value="' + data1.id + '">' + data1.nombre + '</option>');
        });
        $('#sucursales').trigger("change").select2(configSelect2());
    }


});