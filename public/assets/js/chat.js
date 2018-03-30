var url = "IndexController.php";
var lastid= 0;
var timer = setInterval(getMessages , 5000);
$(function () {
    $('#tchatForm form').submit(function () {
        clearInterval(timer);
        showLoader("#tchatForm");
        var message = $('#tchatForm form textarea').val();
        $.post(url,{action:'addMessage',message:message},function (data) {
            if (data.erreur === 'ok'){
                getMessages();
            }else{
                alert(data.erreur);
            }
            timer = setInterval(getMessages, 5000);
            hideLoader();

        },'json');
        return false;
    })
});
function getMessages() {
    $.post(url,{action:'getMessages',lastid: lastid},function (data) {
        if (data.erreur === 'ok'){
            $('#tchat').append(data.result);
            lastid = data.lastid ;
        }else{
            alert('dede');
        }
        hideLoader();

    },'json');
    return false;
}
function showLoader(div) {
    $(div).append('<div class="loader"> </div>');
    $('.loader').fadeTo(500,0.6);


}
function hideLoader() {
    $('.loader').fadeOut(500,function () {
        $('.loader').remove();
    })
}
