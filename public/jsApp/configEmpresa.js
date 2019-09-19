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


});