
$(function () {
    $('.connection').click(function () {
        $('.connectinterface').remove();
        $('.vide').append(`<div class="connectinterface">
    <span class="croix" onclick="fermer2()"><i class="fa fa-times-circle"></i></span><br>
    <form id="contact-form" method="post" action="" class="contact-form form">
                  <div class="controls">
                    <div class="row">
                    <div class="col-sm-2"></div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="name">Votre Pseudo *</label>
                          <input type="text" name="pseudo" id="pseudo" placeholder="Entrez votre Pseudo" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-2"></div>
                      </div>
                      <div class="row">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="surname">Votre Mot de Passe *</label>
                          <input type="text" name="mdp" id="mdp" placeholder="Entrez votre Mot de passe" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-2"></div>
                    </div>
                    <div class="row">
                    <div class="col-sm-2"></div>
                     <div class="col-sm-8 text-center">
                      <input type="submit" value="Envoyez message" class="btn btn-primary btn-block">
                    </div>
                    <div class="col-sm-2"></div>
                    </div>
                  </div>
                </form>
              </div></div>`)
        $('.connectinterface').hide().fadeIn(400)
    });
});



function fermer2() {
    $('.connectinterface').fadeOut(400);
}

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
        $('#draggable').remove();
        $('.plateau').append(`<div id="draggable" class="ui-widget-content"><div class="portlet"><div class="portlet-header desheader"><span onclick="fermer()" class="croix"><i class="fa fa-times-circle"></i></span></div>

<div class="portlet-content">
<form name="form1" action="">
        <input type="number" class="choicede" style="width: 35px;">
        <input type=button name=Bouton class="choicedee btn btn-primary btn-block" value="Lancer de dés perso" onclick="rolldice1()"  style="width: 150px;padding: 5px;" />
        <br>
        <input type=button name=Bouton class="100de btn btn-primary btn-block" value="Lancer de dés 100" onclick="rolldice2()" style="width: 150px;padding: 5px;"/>
        <br>
        <input type=button name=Bouton class="20de btn btn-primary btn-block" value="Lancer de dés 20" onclick="rolldice3()" style="width: 150px;padding: 5px;" />
        <br>
        <input type=button name=Bouton class="12de btn btn-primary btn-block" value="Lancer de dés 12" onclick="rolldice4()" style="width: 150px;padding: 5px;" />
        <br>
        <input type=button name=Bouton class="6de btn btn-primary btn-block" value="Lancer de dés 6" onclick="rolldice5()" style="width: 150px;padding: 5px;" />
 
    <div class="animation1 col-sm4"><input name="dechoice" type="text" style="width: 100%;height: 100%;text-align: center;" /></div>
    <div class="animation2 col-sm4"><input name="de100" type="text"  style="width: 100%;height: 100%;text-align: center;" /></div>
    <div class="animation3 col-sm4"><input name="de20" type="text" style="width: 100%;height: 100%;text-align: center;" /></div>
    <div class="animation4 col-sm4"><input name="de12" type="text" style="width: 100%;height: 100%;text-align: center;" /></div>
    <div class="animation5 col-sm4"><input name="de6" type="text" style="width: 100%;height: 100%;text-align: center;" /></div> 
  </form>
  </div>   
  </div> 
  </div>
`);
        $('#draggable').hide().fadeIn(400)
        $('.animation1').hide();
        $('.animation2').hide();
        $('.animation3').hide();
        $('.animation4').hide();
        $('.animation5').hide();


        $( function() {
            $( "#draggable" ).draggable();
        } );

$( function() {
    $( "#draggable" ).sortable({
        connectWith: ".column",
        handle: ".portlet-header",
        cancel: ".portlet-toggle",
        placeholder: "portlet-placeholder ui-corner-all"
    });

    $( ".portlet" )
        .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
        .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");

    $( ".portlet-toggle" ).on( "click", function() {
        var icon = $( this );
        icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
        icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
    });
} );

    });
    $('.Perso').hide();
    $('.Resume').hide();
    $('.ongletchat').css('background','white');
    $('.Persocreer').hide();
});
function ongletchat() {
    $('.Perso').hide();
    $('.Resume').hide();
    $('.tchat').show();
    $('.ongletpageperso').css('background','#ddd');
    $('.ongletpageresume').css('background','#ddd');
    $('.ongletchat').css('background','white')
}

function ongletperso() {
    $('.tchat').hide();
    $('.Resume').hide();
    $('.Perso').show();
    $('.ongletchat').css('background','#ddd');
    $('.ongletpageresume').css('background','#ddd');
    $('.ongletpageperso').css('background','white')
}

function ongletresume() {
    $('.tchat').hide();
    $('.Perso').hide();
    $('.Resume').show();
    $('.ongletpageperso').css('background','#ddd');
    $('.ongletchat').css('background','#ddd');
    $('.ongletpageresume').css('background','white')
}


function fermer() {
    $('#draggable').fadeOut(400);
}

function fermer2() {
    $('.Persocreer').fadeOut(400);
}

function diminuer(){

}

$(function () {

    $('.creerperso').click(function () {
        $('.Persocreer').fadeIn(400);
    });

    if ( !$('.nom').value ){


    }else{
        $('.envoi').click(function () {
            $('.Persocreer').fadeOut(400);
        })
    }

    $( function() {
        $( ".Persocreer" ).draggable();
    } );



});







