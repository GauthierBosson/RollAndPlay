function demorand100() {
    var a=0;
    a=Math.random();
    document.form1.de100.value=Math.ceil(100*a);
}

function demorand20() {
    var a=0;
    a=Math.random();
    document.form1.de20.value=Math.ceil(20*a);
}

function demorand12() {
    var a=0;
    a=Math.random();
    document.form1.de12.value=Math.ceil(12*a);
}

function demorand6() {
    var a=0;
    a=Math.random();
    document.form1.de6.value=Math.ceil(6*a);
}

function demorandchoice() {
    var a=0;
    var b= $('.choicede').val();
    a=Math.random(b);
    document.form1.dechoice.value=Math.ceil(b*a);
}
/*-----------------------------------------*/

function rolldice1() {
    demorandchoice();
    $('.animation1').show();
    $('.animation1').delay(3000).fadeOut(400)
}
function rolldice2() {
    demorand100();
    $('.animation2').show();
    $('.animation2').delay(3000).fadeOut(400)
}
function rolldice3() {
    demorand20();
    $('.animation3').show();
    $('.animation3').delay(3000).fadeOut(400)
}
function rolldice4() {
    demorand12();
    $('.animation4').show();
    $('.animation4').delay(3000).fadeOut(400)
}
function rolldice5() {
    demorand6();
    $('.animation5').show();
    $('.animation5').delay(3000).fadeOut(400)
}



$(function () {

    $('textarea').click(function () {
        $('textarea').css('box-shadow','0 0 10px red')
    });
    $('.des').click(function () {
        $('.formdes').remove();
        $('.plateau').append(`<div class="formdes">
    <form name="form1" action="">
        <input type="number" class="choicede" style="width: 35px;">
        <input type=button name=Bouton class="choicedee" value="Lancer de dés" onclick="rolldice1()"  style="width: 150px;padding: 5px;" />
        <br>
        <input type=button name=Bouton class="100de" value="Lancer de dés 100" onclick="rolldice2()" style="width: 150px;padding: 5px;"/>
        <br>
        <input type=button name=Bouton class="20de" value="Lancer de dés 20" onclick="rolldice3()" style="width: 150px;padding: 5px;" />
        <br>
        <input type=button name=Bouton class="12de" value="Lancer de dés 12" onclick="rolldice4()" style="width: 150px;padding: 5px;" />
        <br>
        <input type=button name=Bouton class="6de" value="Lancer de dés 6" onclick="rolldice5()" style="width: 150px;padding: 5px;" />
 
    <div class="animation1 col-sm4"><input name="dechoice" type="text" style="width: 100%;height: 100%;text-align: center;" /></div>
    <div class="animation2 col-sm4"><input name="de100" type="text"  style="width: 100%;height: 100%;text-align: center;" /></div>
    <div class="animation3 col-sm4"><input name="de20" type="text" style="width: 100%;height: 100%;text-align: center;" /></div>
    <div class="animation4 col-sm4"><input name="de12" type="text" style="width: 100%;height: 100%;text-align: center;" /></div>
    <div class="animation5 col-sm4"><input name="de6" type="text" style="width: 100%;height: 100%;text-align: center;" /></div> 
  </form>   
  </div> 
`);
        $('.animation1').hide();
        $('.animation2').hide();
        $('.animation3').hide();
        $('.animation4').hide();
        $('.animation5').hide();


    });
});
$('.Perso').hide();
function ongletchat() {
    $('.Perso').hide();
    $('.tchat').show();
    $('.ongletchat').css('background','white');
    $('.ongletpageperso').css('background','#ddd')
}

function ongletperso() {
    $('.tchat').hide();
    $('.Perso').show();
    $('.ongletpageperso').css('background','white');
    $('.ongletchat').css('background','#ddd')
}






