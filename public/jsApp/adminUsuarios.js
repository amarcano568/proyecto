selectedOptionMenu('40000', 'br-menu-link active show-sub', '40001', 'nav-link active');

$(document).on('ready', function() {

    var fotoSubida = '';
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    $('.chosen-select', this).chosen('destroy').chosen({
        width: '100%',
        height: '200%',
        disable_search_threshold: 10,
        no_results_text: "Oops, busqueda no encontrada!"
    });

    $("#perfil_usuario").on('change', function() {
        tipoProfesional = $(this).val();

        if (tipoProfesional == 2 || tipoProfesional == 4) {
            $('#especialidadMedica').prop('disabled', false).trigger("chosen:updated");
        } else {
            $('#especialidadMedica').val('');
            $('#especialidadMedica').prop('disabled', true).trigger("chosen:updated");
        }

    });

    ListaSucursales = '';
    listadoSucursales();

    function listadoSucursales() {
        $.ajax({
            url: 'listar_sucursales',
            type: 'get',
            datatype: 'json',
            data: {
                _token: "{{ csrf_token() }}"
            }
        }).fail(function(statusCode, errorThrown) {
            alert(statusCode + ' ' + errorThrown);
        }).done(function(data) {
            console.log(data)

            ListaSucursales = data;
        });
    }

    listaEspecialidades = '';
    listadoEspecialidades();

    function listadoEspecialidades() {
        $.ajax({
            url: 'listar_especialidades',
            type: 'get',
            datatype: 'json',
            data: {
                _token: "{{ csrf_token() }}"
            }
        }).fail(function(statusCode, errorThrown) {
            alert(statusCode + ' ' + errorThrown);
        }).done(function(data) {
            console.log(data)

            listaEspecialidades = data;
        });
    }

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
        $("#div_listar_Usuarios").hide();
        $("#admin_edicion_usuario").show();
        $("#formDropZone").html('<div data-trigger="hover" data-html="true" data-toggle="popover" data-placement="top" data-content="Para agregar una foto a un nuevo Usuario primero debe agregar todos sus datos y guardar." style="text-align: center;" class="img-thumbnail" ><i class="fa-6x far fa-user"></i></div>');
        $("#barra_titulo").html('<i class="fas fa-user-plus"></i> Nuevo Usuario.');
        $('[data-toggle="popover"]').popover();
        $('#form_register_usuario').each(function() {
            this.reset();
        });
    });

    $('#btnCancelarNewUsuario').click(function() {
        BtncancelarNewUsuario();
    });

    function BtncancelarNewUsuario() {
        $("#div_listar_Usuarios").show();
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
                        guardarUsuarios();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    function guardarUsuarios() {
        alertify.confirm('Datos del Estado', '<h4 class="text-info">Esta seguro de guardar este Usuario ..?</h4>', function() {

            var sexo = $("input[name='radio-genero']:checked").val();
            var sucursal = $('#select_sucursal').val();
            var Especialidad = $('#especialidadMedica').val();
            var form = $('#form_register_usuario');
            var formData = form.serialize() + "&Sexo=" + sexo + "&Sucursal=" + sucursal + "&Especialidad=" + Especialidad;

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
                alertify.success('Usuario registrado...');
                objetoDataTables_Usuarios.ajax.reload();
                $('#form_register_usuario').each(function() {
                    this.reset();
                });
                BtncancelarNewUsuario();
            }).fail(function(statusCode, errorThrown) {
                $.unblockUI();
                console.log(errorThrown);
                ajaxError(statusCode, errorThrown);
            });

        }, function() { // En caso de Cancelar              
            alertify.error('Se Cancelo el Proceso para Guardar el Usuario.');
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

    $('body').on('click', '#body-usuarios a', function(e) {
        e.preventDefault();

        accion_ok = $(this).attr('data-accion');
        idUsuario = $(this).attr('idUsuario');
        sucursales = $(this).attr('sucursales');
        especialidades = $(this).attr('EspMedica');

        switch (accion_ok) {

            case 'editarUsuario': // Edita Usuario

                $.ajax({
                    url: 'buscar_usuario',
                    type: 'get',
                    datatype: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        idUsuario: idUsuario
                    }
                }).fail(function(statusCode, errorThrown) {
                    alert(statusCode + ' ' + errorThrown);
                }).done(function(data) {
                    //console.log(data)

                if (data.foto == '' || data.foto === null) {
                    iconoDropZone = '<i class="far fa-user"></i><br><h6>Click para foto.</h6>';
                } else {
                    iconoDropZone = '<img class="img-thumbnail" src="' + data.foto + '" style="width:100px;height:98px">';
                }

                    $("#idUsuario").val(idUsuario);
                    configuraDropZone(iconoDropZone, idUsuario);

                    $("#div_listar_Usuarios").hide();
                    $("#admin_edicion_usuario").show()
                    $("#text_titulo").html('<i class="far fa-edit"></i> Editar Usuario.');


                    $("#nombre_usuario").val(data.name);
                    $("#apellido_usuario").val(data.lastName);
                    $("#email_usuario").val(data.email);
                    $("#Username").val(data.userName);
                    $("#perfil_usuario").val(data.perfil).trigger("chosen:updated");
                    SelectRadioButton('radio-genero', data.sexo)

                    $("#select_sucursal").empty();
                    $(ListaSucursales).each(function(i, data1) {
                        if (sucursales.indexOf(data1.id) > -1) {
                            $("#select_sucursal").append('<option selected value="' + data1.id + '">' + data1.nombre + '</option>');
                        } else {
                            $("#select_sucursal").append('<option value="' + data1.id + '">' + data1.nombre + '</option>');
                        }
                    });
                    $("#select_sucursal").trigger("chosen:updated");

                    $("#especialidadMedica").empty();
                    $(listaEspecialidades).each(function(i, data1) {
                        if (especialidades.indexOf(data1.id) > -1) {
                            $("#especialidadMedica").append('<option selected value="' + data1.id + '">' + data1.nombre + '</option>');
                        } else {
                            $("#especialidadMedica").append('<option value="' + data1.id + '">' + data1.nombre + '</option>');
                        }
                    });
                    $("#especialidadMedica").trigger("chosen:updated");

                    $("#idioma").val(data.idioma);
                    $("#rut_usuario").val(data.rut_dni);
                    $("#fec_nac_usuario").val(data.fecNacimiento);
                    $("#edad_usuario").val(data.edad);
                    $("#fonofijo_usuario").val(data.telefonoFijo);
                    $("#fonocell_usuario").val(data.telefonoCelular);
                    $("#direccion_usuario").val(data.direccion);

                });
                break;

        }

    });

    function SelectRadioButton(name, value) {
        $("input[name='" + name + "'][value='" + value + "']").prop('checked', true);
        return false;
    }

    $(document).on('change', '#fec_nac_usuario', function(event) {
        //if (existeFecha($(this).val())) {
        edad = calcularEdad($(this).val());
        $("#edad_usuario").val(edad);
        //}
    });


    function configuraDropZone(iconoDropZone, idUsuario) {

        Dropzone.autoDiscover = false;
        if (Dropzone.instances.length > 0) Dropzone.instances.forEach(bz => bz.destroy());
        $("#formDropZone").html('');
        $("#formDropZone").append("<form action='subir-foto' method='POST' files='true' enctype='multipart/form-data' id='dZUpload' class='dropzone borde-dropzone' style='width: 100%;padding: 0;cursor: pointer;'>" +
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
                idUsuario: idUsuario,
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
            configuraDropZone(iconoDropZone, idUsuario);

        });
    }


});