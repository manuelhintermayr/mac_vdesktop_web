/* Code fuer das Error-EasterEgg */
function configureErrorEasterEgg() {
    $('.errorEasterEgg').draggable({
        scroll: false
    });
    var error = '<div class="errorEasterEgg">' + $('.errorEasterEgg').html() + '</div>', x = window.innerWidth / 3, y = window.innerHeight / 3;
    $('body').on('click', '.errorEasterEgg_ok, .errorEasterEgg_closeButton', function () {
        $('body').append(error);
        $('.errorEasterEgg').last().css({
            top: y + 'px',
            left: x + 'px'
        }).draggable({ scroll: false });
        x += 4;
        y += 4;
    });
}