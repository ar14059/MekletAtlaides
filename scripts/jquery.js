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


$(function() {
    var button = $('#nav-right-button-register');
    var box = $('#registerBox');
    var form = $('#registerForm');
    var buttonClass= $("#registerContainer").attr("class");
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

    $(this).mouseup(function(register) {
        if(!($(register.target).parent('#nav-right-button-register').length > 0)) {
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
//saglabā adreses ievaddatus pēc pogas 'saglabāt' piespiešanas
    $(function() {
        //ieslēgt

        var wrapperUp = $( "#register-wrapper-up");
        var showitem = $( "#register-wrapper-div");
        var a_regadd = $( "#regaddr-wrapper-div");
        

        $(function(){
            $("#address_form_btn").click(function(){
                wrapperUp.removeClass('hidden');
                showitem.removeClass('hidden');
            });
            $("#address_form_btn_a").click(function(){
                wrapperUp.removeClass('hidden');
                showitem.removeClass('hidden');
                a_regadd.addClass('hidden');
            });
        });
        $(function(){
            $('#address').val('');
            $('#jurid_adrese').val('');
            $("#reg-submit-address").click(function(){
                var addaddressbtn = $("#address_form_btn");
                var addaddressbtn_a = $("#address_form_btn_a");
                wrapperUp.addClass('hidden');
                showitem.addClass('hidden');
                a_regadd.removeClass('hidden');
                var pasta_indekss = $('#pasta_indekss').val();
                $('#pasta_indekss_hide').val(pasta_indekss);
                var novads = $('#novads').val();
                $('#novads_hide').val(novads);
                var pilseta = $('#pilseta').val();
                $('#pilseta_hide').val(pilseta);
                var pagasts = $('#pagasts').val();
                $('#pagasts_hide').val(pagasts);
                var ciems = $('#ciems').val();
                $('#ciems_hide').val(ciems);
                var iela = $('#iela').val();
                $('#iela_hide').val(iela);
                var ek_nr = $('#ek_nr').val();
                $('#ek_nr_hide').val(ek_nr);
                var dzivoklis = $('#dzivoklis').val();
                $('#dzivoklis_hide').val(dzivoklis);

                var pasta_indekss_a = $('#pasta_indekss_a').val();
                $('#pasta_indekss_hide').val(pasta_indekss_a);
                var novads_a = $('#novads_a').val();
                $('#novads_hide').val(novads_a);
                var pilseta_a = $('#pilseta_a').val();
                $('#pilseta_hide').val(pilseta_a);
                var pagasts_a = $('#pagasts_a').val();
                $('#pagasts_hide').val(pagasts_a);
                var ciems_a = $('#ciems_a').val();
                $('#ciems_hide').val(ciems_a);
                var iela_a = $('#iela_a').val();
                $('#iela_hide').val(iela_a);
                var ek_nr_a = $('#ek_nr_a').val();
                $('#ek_nr_hide').val(ek_nr_a);
                var dzivoklis_a = $('#dzivoklis_a').val();
                $('#dzivoklis_hide').val(dzivoklis_a);

                $('#address').val(novads);
                var adrese = $('#address').val();
                $('#jurid_adrese').val(novads_a);
                var jurid_adrese = $('#jurid_adrese').val();
                if(adrese != '')
                {
                    addaddressbtn.hide();                   
                }else{
                    addaddressbtn.show();
                }
                if(jurid_adrese != '')
                {
                    addaddressbtn_a.hide();                   
                }else{
                    addaddressbtn_a.show();
                }
                $("#address-edit").click(function(){
                    wrapperUp.removeClass('hidden');
                    showitem.removeClass('hidden');   
                    a_regadd.addClass('hidden');      
                });
                // alert(adrese);
            });
        });
        //izslēgt
        $(function(){
            $("#wrapper-register-close").click(function(){
                wrapperUp.addClass('hidden');
                showitem.addClass('hidden');
                a_regadd.removeClass('hidden');
            });
        });
    });

$('#pilseta').on('input', function() {
    if($(this).val().length){
        $('#pagasts').prop('disabled', true);
        $('#pagasts').val("");
        $('#ciems').prop('disabled', true);
        $('#ciems').val("");
        $('#novads').prop('disabled', true);
        $('#novads').val("");
    }else{
        $('#pagasts').prop('disabled', false);
        $('#ciems').prop('disabled', false);
        $('#novads').prop('disabled', false);
    }
});

$('#pagasts, #ciems, #novads').on('input', function() {
    if($('#pagasts').val().length || $('#ciems').val().length || $('#novads').val().length){
        $('#pilseta').prop('disabled', true);
        $('#pilseta').val("");
    }else{
        $('#pilseta').prop('disabled', false);
    }
});

$('#pilseta_a').on('input', function() {
    if($(this).val().length){
        $('#pagasts_a').prop('disabled', true);
        $('#pagasts_a').val("");
        $('#ciems_a').prop('disabled', true);
        $('#ciems_a').val("");
        $('#novads_a').prop('disabled', true);
        $('#novads_a').val("");
    }else{
        $('#pagasts_a').prop('disabled', false);
        $('#ciems_a').prop('disabled', false);
        $('#novads_a').prop('disabled', false);
    }
});

$('#pagasts_a, #ciems_a, #novads_a').on('input', function() {
    if($('#pagasts_a').val().length || $('#ciems_a').val().length || $('#novads_a').val().length){
        $('#pilseta_a').prop('disabled', true);
        $('#pilseta_a').val("");
    }else{
        $('#pilseta_a').prop('disabled', false);
    }
});

/////////////////////////////////