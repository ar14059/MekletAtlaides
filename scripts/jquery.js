// Login Form

// $(function() {
//     var button = $('#nav-right-button-login');
//     var box = $('#loginBox');
//     var form = $('#loginForm');
//     button.removeAttr('href');
//     button.mouseup(function(login) {
//         box.toggle();
//         button.toggleClass('active');
//     });
//     form.mouseup(function() { 
//         return false;
//     });
//     $(this).mouseup(function(login) {
//         if(!($(login.target).parent('#nav-right-button-login').length > 0)) {
//             button.removeClass('active');
//             box.hide();
//         }
//     });
// });



//home.php sadala "Reklāmas un piedāvājumi". Drop-down panel
$(function(){

    $(".flip").click(function(){
        var flipid = $(this).attr('flip-id')
        $(".panel."+flipid).slideToggle("fast");
    });
});
/////////////////////////////////


//Login forma. 
$(function() {
    var button = $('#nav-right-button-login');
    var box = $('#loginBox');
    var form = $('#loginForm');
    var buttonClass= $("#loginContainer").attr("class");
    button.click(function(login) {
        if(buttonClass!='active')
        {
            button.toggleClass('active');
            box.toggle();
        } 
    });
    button.parents().click(function(){
        if(buttonClass=='active')
        {
            button.toggleClass('active');
            box.toggle();
        } 
    })
    form.mouseup(function() { 
        return false;
    });

    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#nav-right-button-login').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});

/////////////////////////////////
//katalogs.php sadaļa "Galvenais kataloga saraksts". 
//Tiek atvērts epasta logs, nospiežot uz zvaigznītes



//Main iestatījumi reģistretam lietotājam. 
$(function() {
    var button = $('#main-settings-container');
    var box = $('#main-settings-box');

    var buttonClass= $("#loginContainer").attr("class");
    button.click(function(login) {
        if(button!='active')
        {
            button.css("background-color", "#FFF"); 
            $('#main-settings-btn').css("background-image", 'url(css/Pictures/main_option_btn_active.png)');

            button.toggleClass('active');
            box.toggle();
        }       


    });

    button.parents().click(function(){
        if(buttonClass=='active')
        {
            button.toggleClass('active');
            box.toggle();
        } 
    })



    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginContainer').length > 0)) {
            button.removeClass('active');
            box.hide();
            button.css("background-color", "transparent"); 
            $('#main-settings-btn').css("background-image", 'url(css/Pictures/main_option_btn.png)');
        }
    });
});


/////////////////////////////////


//Katalogs.php 

    //epasta ievada forma 

    $(function() {
        //ieslēgt
        // var wrapperUp = $( ".wrapper-up");
        var wrapperUp = $( "#katalogs-wrapper-up");
        var email = $( "#email-div");
        $(function(){
            $(".star").click(function(){
                wrapperUp.removeClass('hidden');
                email.removeClass('hidden');
            });
        });

        //izslēgt
        $(function(){
            $("#wrapper-email-close").click(function(){
                wrapperUp.addClass('hidden');
                email.addClass('hidden');
            });
        });
    });
    /////////////////////////////////


    //preces/uzņēmuma/pilsētas forma 

    $(function() {
        //ieslēgt
        var wrapperUp = $( "#katalogs-wrapper-up");
        var showitem = $( "#showitem-div");
        $(function(){
            $(".radit").click(function(){
                wrapperUp.removeClass('hidden');
                showitem.removeClass('hidden');
            });
        });

        //izslēgt
        $(function(){
            $("#wrapper-showitem-close").click(function(){
                wrapperUp.addClass('hidden');
                showitem.addClass('hidden');
            });
        });
    });
    /////////////////////////////////
/////////////////////////////////

//registracija.php 

    $(function() {
        //ieslēgt

        var wrapperUp = $( "#register-wrapper-up");
        var showitem = $( "#register-wrapper-div");

        $(function(){
            $("#address_form_btn").click(function(){
                wrapperUp.removeClass('hidden');
                showitem.removeClass('hidden');
            });
        });
        $(function(){
            $("#reg-submit-address").click(function(){
                // $.ajax({
                //     type: "POST",
                //     url: "registracija.php",
                //     data: {text:$('#novads').val()}
                // });
                var addaddressbtn = $("#address_form_btn");
                wrapperUp.addClass('hidden');
                showitem.addClass('hidden');
                var novads = $('#novads').val();
                $('#novads_hide').val(novads);
                var pilseta = $('#pilseta').val();
                $('#pilseta_hide').val(pilseta);
                var pagasts = $('#pagasts').val();
                $('#pagasts_hide').val(pagasts);
                var ek_nr = $('#ek_nr').val();
                $('#ek_nr_hide').val(ek_nr);
                var dzivoklis = $('#dzivoklis').val();
                $('#dzivoklis_hide').val(dzivoklis);

                $('#address').val(novads);
                var adrese = $('#address').val();
                if(adrese != '')
                {
                    addaddressbtn.hide();                   
                }else{
                    addaddressbtn.show();
                }
                $("#address-edit").click(function(){
                    wrapperUp.removeClass('hidden');
                    showitem.removeClass('hidden');         
                });
                // alert(adrese);
            });
        });

        //izslēgt
        $(function(){
            $("#wrapper-register-close").click(function(){
                wrapperUp.addClass('hidden');
                showitem.addClass('hidden');
            });
        });
      

        // $('input#address').attr('disabled', 'disabled'); //Disable
    });
    //Paslēpj adreses formas pogu, ja adreses input lauks satur vērtību

$('#inlinesubmit_button').click(function(){

});

/////////////////////////////////