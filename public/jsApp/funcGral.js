function loadingUI(message, color) {
    $.blockUI({
        baseZ: 2000,
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: color,
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            //opacity                  : 0.5,
            color: '#003465',
            //width                    : '40em'

        },
        message: '<h2><i class="fas fa-spinner fa-pulse"></i> <span class="hidden-xs">' + message + '</span></h2>'
    });
}

function responseUI(message, color) {
    $.blockUI({
        baseZ: 2000,
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: color,
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: 0.5,
            color: '#fff'
        },
        message: '<h2 class="blockUIMensaje">' + message + '</h2>'
    });

    setTimeout(function() {
        $.unblockUI();
    }, 2000);
}