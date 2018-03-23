$(function () {
    $('textarea').click(function () {
        $('textarea').css('box-shadow','0 0 10px red')
    });
    $('.des').click(function () {
        $('.lancer').remove();
        $('.plateau').append('<div class="lancer"> </div>')
    })
});