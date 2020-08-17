/**
 * Created by Genaro Mauricio on 20/10/2017.
 */
// Theme color settings
$(document).ready(function () {
    $("*[data-theme]").click(function (e) {
        e.preventDefault();
        var currentStyle = $(this).attr('data-theme');
        localStorage.setItem('theme', currentStyle);

        //store('theme', currentStyle);
        $('#theme').attr({ href: 'css/colors/' + currentStyle + '.css' })
    });

    var currentTheme = get('theme');
    if (currentTheme) {
        $('#theme').attr({ href: 'css/colors/' + currentTheme + '.css' });
    }
    // color selector
    $('#themecolors').on('click', 'a', function () {
        $('#themecolors li a').removeClass('working');
        $(this).addClass('working')
    });

});
function get(name) {

}

$(document).ready(function () {
    $("*[data-theme]").click(function (e) {
        e.preventDefault();
        var currentStyle = $(this).attr('data-theme');
        //store('theme', currentStyle);
        databaseStore(currentStyle);
        localStorage.setItem('theme', currentStyle);
        $('#theme').attr({ href: 'css/colors/' + currentStyle + '.css' })
    });

    var currentTheme = get('theme');
    if (currentTheme) {
        $('#theme').attr({ href: 'css/colors/' + currentTheme + '.css' });
    }
    // color selector
    $('#themecolors').on('click', 'a', function () {
        $('#themecolors li a').removeClass('working');
        $(this).addClass('working')
    });
});

function databaseStore(theme) {
    console.log(theme);

    let parametros = {
        tema: theme
    };

    $.ajax({
        type: "GET",
        url: "{{ route('updateStyle') }}",
        data: parametros,
    }).done(function(info) {
        console.log(info);
    });
}