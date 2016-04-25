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

        function myTrim(x) {
            return x.replace(/^\s+|\s+$/gm,'');
        }
        var wrapperUp = $( "#register-wrapper-up");
        var showitem = $( "#register-wrapper-div");
        var a_regadd = $( "#regaddr-wrapper-div");
        $(function(){
            $("#address_form_btn").click(function(){
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

                var pasta_indekss = myTrim($('#pasta_indekss').val());
                $('#pasta_indekss_hide').val(pasta_indekss);
                var novads = myTrim($('#novads').val());
                $('#novads_hide').val(novads);
                var pilseta = myTrim($('#pilseta').val());
                $('#pilseta_hide').val(pilseta);
                var pagasts = myTrim($('#pagasts').val());
                $('#pagasts_hide').val(pagasts);
                var ciems = myTrim($('#ciems').val());
                $('#ciems_hide').val(ciems);
                var iela = myTrim($('#iela').val());
                $('#iela_hide').val(iela);
                var ek_nr = myTrim($('#ek_nr').val());
                $('#ek_nr_hide').val(ek_nr);
                var dzivoklis = myTrim($('#dzivoklis').val());
                $('#dzivoklis_hide').val(dzivoklis);
                var iela_selected = $( "#iela_abr option:selected" ).text();

                if(ek_nr !=''){
                    $('#ek_nr_e').addClass('hidden');
                    $('#ek_nr_e').text('');
                    if(iela != '' && iela_selected !=''){
                        $('#iela_e').addClass('hidden');
                        $('#iela_e').text('');
                        pilna_adrese = iela+' '+iela_selected+' '+ek_nr;
                    }else{
                        if(iela != '' && iela_selected =='' || iela == '' && iela_selected !=''){
                            $('#iela_e').removeClass('hidden');
                            $('#iela_e').text('Aizpildiet lauku');               
                        }else if(iela == '' && iela_selected ==''){
                            if(isFinite(String(ek_nr.charAt(0)))===true){
                                $('#iela_e').removeClass('hidden');
                                $('#iela_e').text('Aizpildiet lauku');     
                            }else{
                                pilna_adrese = ek_nr;
                                $('#iela_e').addClass('hidden');
                                $('#iela_e').text('');                              
                            }
                        }
                    }        
                }else{
                    if(ek_nr == ''){
                        $('#ek_nr_e').removeClass('hidden');
                        $('#ek_nr_e').text('Aizpildiet lauku');
                    }
                }                 
                if(dzivoklis!=''){
                    if (dzivoklis.indexOf('k') == -1) {
                        pilna_adrese+='-'+dzivoklis;
                    }else{
                        pilna_adrese+=' '+dzivoklis;
                    }
                    
                }

                if(pagasts =='' && novads =='' && pilseta ==''){
                    $('#novads_e').text('Aizpildiet lauku');
                    $('#novads_e').removeClass('hidden');  
                    $('#pagasts_e').text('Aizpildiet lauku');
                    $('#pagasts_e').removeClass('hidden');  
                    if(ciems==''){
                        $('#pilseta_e').text('Aizpildiet lauku');
                        $('#pilseta_e').removeClass('hidden');                 
                    }else{
                        $('#pilseta_e').addClass('hidden');
                        $('#pilseta_e').text('');
                         pilna_adrese+=', '+ciems;
                    }
                }
                if(pilseta ==''){
                    if(pagasts !='' || novads !=''){
                        $('#pilseta_e').addClass('hidden');
                        $('#pilseta_e').text('');                         
                    }
                    if(pagasts !='' && novads ==''){
                        $('#pagasts_e').addClass('hidden');
                        $('#pagasts_e').text(''); 
                        $('#novads_e').removeClass('hidden');
                        $('#novads_e').text('Aizpildiet lauku');
                        pilna_adrese+=', '+pagasts+' pag.'; 
                    }else if(novads !='' && pagasts ==''){
                        $('#novads_e').addClass('hidden');
                        $('#novads_e').text('');                   
                        $('#pagasts_e').removeClass('hidden');
                        $('#pagasts_e').text('Aizpildiet lauku'); 
                        pilna_adrese+=', '+novads+' nov.'; 
                    }else if(pagasts !='' && novads !=''){
                        $('#novads_e').addClass('hidden');  
                        $('#novads_e').text('');
                        $('#pagasts_e').addClass('hidden');
                        $('#pagasts_e').text('')
                        pilna_adrese+=', '+pagasts+' pag., '+novads+' nov.';                    
                    }
                }else if(pilseta !=''){
                    $('#pilseta_e').addClass('hidden');
                    $('#pilseta_e').text('');  
                    $('#novads_e').addClass('hidden');  
                    $('#novads_e').text('');
                    $('#pagasts_e').addClass('hidden');
                    $('#pagasts_e').text(''); 
                    pilna_adrese+=', '+pilseta;                  
                }


                if(pasta_indekss !=''){
                    $('#pasta_indekss_e').addClass('hidden');
                    $('#pasta_indekss_e').text('');
                    pilna_adrese +=', '+pasta_indekss;
                }else{
                    $('#pasta_indekss_e').text('Aizpildiet lauku');
                    $('#pasta_indekss_e').removeClass('hidden');

                }    


                var check_errors = 0;
                $('.err_m_register').each(function () { 
                    if($(this).text()!=''){
                        check_errors = 1;
                    }
                });
                if(check_errors == '0'){
                    wrapperUp.addClass('hidden');
                    showitem.addClass('hidden');
                    a_regadd.removeClass('hidden');
                }

                $('#address').val(pilna_adrese);
                $('#address').attr('title', $('#address').val() );
                var adrese = $('#address').val();
                if(adrese != '')
                {
                    addaddressbtn.hide();                   
                }else{
                    addaddressbtn.show();
                }
                $('#jurid_adrese').val(pilna_adrese);
                $('#jurid_adrese').attr('title', $('#jurid_adrese').val() );
                var jurid_adrese = $('#jurid_adrese').val();
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


$('#ek_nr').on('input', function() {
    if($(this).val().length){
        if(isFinite(String($(this).val().charAt(0)))===false){
            $('#iela').prop('disabled', true);
            $('#iela').val("");
            $('#iela_abr').prop('disabled', true);
            $('#iela_abr').val("");         
        }
        else{
            $('#iela').prop('disabled', false);
            $('#iela_abr').prop('disabled', false);          
        }
    }else{
        $('#iela').prop('disabled', false);
        $('#iela_abr').prop('disabled', false);
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


/////////////////////////////////