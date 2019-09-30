/**
 * Activa opción menú.
 */
selectedOptionMenu('10000', 'br-menu-link active');
$(document).on('ready', function() {

    var objetoDataTables_personal = ''
    var idMedicamento = '';
    var nombreMedicamento = '';

    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    $('.chosen-select', this).chosen('destroy').chosen({
        width: '100%',
        height: '200%',
        disable_search_threshold: 10,
        no_results_text: "Oops, busqueda no encontrada!"
    });

    $("#chosenPacientes").on('change', function() {
        muestraFichaPaciente($(this).val());
        cargaConsultas($(this).val());
        cargaRecipes($(this).val());
        cargaGaleriaImagenes($(this).val());

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

    function cargaRecipes(idPaciente) {
        destroy_existing_data_table('#datatable-recipes');
        $.fn.dataTable.ext.buttons.newRecipe = {
            className: 'buttons-alert',
            action: function(e, dt, node, config) {
                $("#modal-newRecipe").modal('show');
            }
        };
        objetoDataTables_personal = $('#datatable-recipes').DataTable({
            responsive: true,
            "bInfo": false,
            "searching": false,
            "order": [
                [0, "desc"]
            ],
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                extend: 'newRecipe',
                text: '<i class="fas fa-prescription-bottle-alt"></i> Nuevo Recipe '
            }],
            "paginationType": "input",
            "sPaginationType": "full_numbers",
            "language": {
                "searchPlaceholder": "Buscar",
                "sProcessing": "Procesando...",
                "sLengthMenu": " _MENU_ Recipes",
                "sZeroRecords": "No se encontró ninguna Recipe con la Condición del Filtro",
                "sEmptyTable": "Ninguna Recipe Agregado aún...",
                "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ Recipes",
                "sInfoEmpty": "De 0 al 0 de un total de 0 Recipes",
                "sInfoFiltered": "(filtrado de un total de _MAX_ Recipes)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": '<i class="text-info fa-2x fas fa-spinner fa-pulse"></i> espere cargando los recipes...',
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
                $('[data-toggle="popover"]').popover()
            },
            "ajax": {
                "method": "get",
                "url": "carga-recipes",
                "data": {
                    idPaciente: idPaciente
                }
            },
            "columns": [{
                "className": 'celda_recipes',
                "orderable": false,
                "data": null,
                "defaultContent": '<a class="botonesGraficos" href=""><i class="fa fa-plus-circle text-info" aria-hidden="true"></i></a>'
            }, {
                "data": 0
            }, {
                "data": 1,
            }, {
                "data": 2
            }, {
                "data": 3
            }, {
                "data": 4
            }],
            "columnDefs": [{
                "width": "15%",
                "targets": [1, 2]
            }, {
                "width": "50%",
                "targets": [3]
            }]
        });

        objetoDataTables_personal.columns(4).visible(false);
    }

    $(document).on('click', '.botonesGraficos', function(event) {
        event.preventDefault();
    });

    $(document).on('click', '#navOdontograma', function(event) {
        $("#canvas").show();
    });

    $(document).on('click', 'td.celda_recipes', function(event) {

        var filaDeLaTabla = $(this).closest('tr');
        var filaComplementaria = objetoDataTables_personal.row(filaDeLaTabla);
        var celdaDeIcono = $(this).closest('td.celda_recipes');

        if (filaComplementaria.child.isShown()) { // La fila complementaria está abierta y se cierra.
            filaComplementaria.child.hide();
            celdaDeIcono.html('<a class="botonesGraficos" href=""><i class="fa fa-plus-circle text-info" aria-hidden="true"></i></a>');
        } else { // La fila complementaria está cerrada y se abre.
            filaComplementaria.child(formatearSalidaDeDatosComplementarios(filaComplementaria.data(), 3)).show();
            celdaDeIcono.html('<a class="botonesGraficos" href=""><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i></a>');
        }
    });

    function formatearSalidaDeDatosComplementarios(filaDelDataSet, columna) {
        var cadenaDeRetorno = '';

        cadenaDeRetorno += '<div class="row">';
        cadenaDeRetorno += '<div  class="col-lg-11 col-md-12 col-sm-12 col-xs-12">';
        cadenaDeRetorno += '<strong class="text-danger">Medicamentos del recipe</strong><br>';
        cadenaDeRetorno += filaDelDataSet[3];
        cadenaDeRetorno += '</div>';
        cadenaDeRetorno += '</div><br>';

        return cadenaDeRetorno;
    }


    function muestraFichaPaciente(idPaciente) {
        //loadingUI('Procesando...', 'white');
        $.ajax({
            url: 'buscar-paciente-ficha',
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
            $("#nombrePac").text(response.Nombres);
            $("#apellidosPac").text(response.Apellidos);
            $("#sexoPac").text(response.sexo == 'M' ? 'Masculino' : 'Femenino');
            $("#fecNacPac").text(response.fecNac);
            $("#edadPac").text(response.edad);
        });
    }

    function cargaConsultas(idPaciente) {
        destroy_existing_data_table('#datatable-consultas');
        $('#datatable-consultas').DataTable({
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
                "sLengthMenu": " _MENU_ Consultas",
                "sZeroRecords": "No se encontró ninguna Consulta con la Condición del Filtro",
                "sEmptyTable": "Ninguna Consulta Agregada aún...",
                "sInfo": "Del _START_ al _END_ de un total de _TOTAL_ Consultas",
                "sInfoEmpty": "De 0 al 0 de un total de 0 Consultas",
                "sInfoFiltered": "(filtrado de un total de _MAX_ Consultas)",
                "sInfoPostFix": "",
                "sSearch": "",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": '<i class="text-info fa-2x fas fa-spinner fa-pulse"></i> espere cargando las consultas...',
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
                $('[data-toggle="popover"]').popover()
            },
            "ajax": {
                "method": "get",
                "url": "carga-consultas",
                "data": {
                    idPaciente: idPaciente
                }
            }
        });
    }

    function cargaGaleriaImagenes(idPaciente) {

        $.ajax({
            url: 'listar-imagenes',
            type: 'get',
            dataType: "html",
            data: {
                _token: "{{ csrf_token() }}",
                idPaciente: idPaciente
            }
        }).fail(function(statusCode, errorThrown) {
            alert(statusCode + ' ' + errorThrown);
        }).done(function(response) {
            console.log(response)
            $.unblockUI();
            $("#galeriaImagenes").html(response);
            baguetteBox.run('.cards-gallery', {
                animation: 'slideIn'
            });
        });


    }

    //listarPacientes();
    function listarPacientes() {
        loadingUI('Procesando...', 'white')
        $.ajax({
            url: 'listar-pacientes',
            type: 'get',
            data: {
                _token: "{{ csrf_token() }}"
            }
        }).fail(function(statusCode, errorThrown) {
            alert(statusCode + ' ' + errorThrown);
        }).done(function(response) {
            console.log(response)
            $.unblockUI();
            $("#chosenPacientes").empty();
            $("#chosenPacientes").append('<option value=""></option>')

            $(response).each(function(i, data) {
                $("#chosenPacientes").append('<option value="' + data.idpacientes + '">' + data.Nombres + ' ' + data.Apellidos + '</option>');
            });

            $("#chosenPacientes").trigger("chosen:updated");
        });
    }

    $('body').on('click', '#body-recipes a', function(e) {
        e.preventDefault();

        accion_ok = $(this).attr('data-accion');
        idRecipe = $(this).attr('idRecipe');

        switch (accion_ok) {

            case 'verRecipePdf': // Edita firma
                $('#' + idRecipe).show();
                $.ajax({
                    url: 'ver-recipe-paciente',
                    type: 'get',
                    datatype: 'html',
                    data: {
                        _token: "{{ csrf_token() }}",
                        idRecipe: idRecipe
                    }
                }).fail(function(statusCode, errorThrown) {
                    alert(statusCode + ' ' + errorThrown);
                }).done(function(data) {
                    $('#' + idRecipe).hide();
                    console.log(data);
                    if (data.success == true) {
                        //user_jobs div defined on page
                        $("#modal-recipe").modal('show');
                        $('#ObjPdf').attr('src', data.recipePdf);
                        //$('#recipeHtml').html(data.recipePdf);
                    } else {
                        // $('#user_jobs').html(data.html + '{{ $user->username }}');
                    }

                });

                break;

        }

    });


    var canvas = document.getElementById('canvas');

    var engine = new Engine();

    engine.setCanvas(canvas);

    engine.init();

    canvas.addEventListener('mousedown', function(event) {
        engine.onMouseClick(event);
    }, false);

    canvas.addEventListener('mousemove', function(event) {
        engine.onMouseMove(event);
    }, false);

    window.addEventListener('keydown', function(event) {
        engine.onButtonClick(event);
    }, false);

    engine.loadPatientData("Magdalena",
        "Bárður Thomsen",
        "1002",
        "hc 001",
        "26/02/2018",
        "dentist one",
        "Test specifications",
        "Test observations");


    engine.toggleObserverState(true);

    observer = function(id) {

        window.alert("Clicked " + id);
    };

    engine.setObserver(observer);


    $(document).on('click', '#agregarMedicina', function(event) {
        event.preventDefault();
        var indicaciones = $("#indicaciones").val();

        var eleMedicamento = $(document).find('[name="medicamento"]');
        if (idMedicamento == '') {
            eleMedicamento.after($('<p id="msgErrorMedicamento" style="color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding:1px 20px 1px 20px;">Debe selecionar un medicamento.</p>'));
            return false;
        } else {
            eleMedicamento.after($("#msgErrorMedicamento").html(''));
        }

        var el = $(document).find('[name="indicaciones"]');
        if (indicaciones == '') {
            el.after($('<p id="msgErrorIndicaciones" style="color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding:1px 20px 1px 20px;">Debe agregar las indicaciones del medicamento.</p>'));
            return false;
        } else {
            el.after($("#msgErrorIndicaciones").html(''));
        }

        $("#listGroupRecipe").append('<li class="list-group-item liMedicina">' + idMedicamento + ' - ' + nombreMedicamento + '<br><span style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp; - ' + indicaciones + '</span><a class="icono-action" style="float: right;" href="" ><i style="font-size: 16px;" class=" text-danger fas fa-trash-alt"></i></a></li>');
        $('#indicaciones').prop('readonly', true);
        $('#indicaciones').val('');
        $('.medicamentos-seeker').val('');
        //$('.medicamentos-seeker').typeahead('setQuery', '');
        $('.medicamentos-seeker').typeahead().bind('typeahead:selected', function() {
            $('.medicamentos-seeker').typeahead('val', '')
        });
        idMedicamento = '';
        nombreMedicamento = '';
        $('.medicamentos-seeker').focus();
    });

    $(document).on('click', '.liMedicina', function(event) {
        event.preventDefault();
        $(this).remove();
    });

    $("#indicaciones").on('change', function() {
        var el = $(document).find('[name="indicaciones"]');
        el.after($("#msgErrorIndicaciones").html(''));
    });

    $(document).on('click', '#registrarRecipe', function(event) {
        event.preventDefault();

        if ($('#listGroupRecipe li').length < 1) {
            alertify.dismissAll();
            alertify.set('notifier', 'position', 'top-center');
            alertify.error('<i class="fas fa-exclamation-triangle"></i><br>Debe agregar al menos un (1) medicamento.');
            $('.medicamentos-seeker').focus();
            return false;
        }

        jsonRecipe = toJsonRecipe();
        console.log(jsonRecipe)
        $.ajax({
            url: 'agregar-recipe-paciente',
            type: 'get',
            datatype: 'json',
            data: {
                _token: "{{ csrf_token() }}",
                data: jsonRecipe
            }
        }).fail(function(statusCode, errorThrown) {
            alert(statusCode + ' ' + errorThrown);
        }).done(function(data) {
            console.log(data);
            if (data.success == true) {
                //user_jobs div defined on page
                $("#modal-newRecipe").modal('hide');
                $("#modal-recipe").modal('show');
                $('#ObjPdf').attr('src', data.recipePdf);
                //$('#recipeHtml').html(data.recipePdf);
            } else {
                // $('#user_jobs').html(data.html + '{{ $user->username }}');
            }

        });
    });

    function toJsonRecipe() {
        idPaciente = $("#chosenPacientes").val();
        var arreglo = [];
        $("#listGroupRecipe li").each(function(index) {
            var medicina = $(this); // <-- en la variable element tienes tu elemento
            medicina = medicina.text();
            medicamento = medicina.split(' - ');

            arreglo.push({
                "idPaciente": idPaciente,
                "idMedicina": medicamento[0].trim(),
                "indicaciones": medicamento[2].trim()
            });


        })

        return JSON.stringify(arreglo);
    }

});