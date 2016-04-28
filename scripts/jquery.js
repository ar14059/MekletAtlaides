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
        function F_L_Capital(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        var wrapperUp = $( "#register-wrapper-up");
        var showitem = $( "#register-wrapper-div");
        var a_regadd = $( "#regaddr-wrapper-div");
        $("#address_form_btn").click(function(){
            wrapperUp.removeClass('hidden');
            showitem.removeClass('hidden');
            a_regadd.addClass('hidden');
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
                if(check_errors == 0){
                    wrapperUp.addClass('hidden');
                    showitem.addClass('hidden');
                    a_regadd.removeClass('hidden');
                }else{
                    wrapperUp.removeClass('hidden');
                    showitem.removeClass('hidden');
                    a_regadd.addClass('hidden');        
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
        $("#wrapper-register-close").click(function(){
            wrapperUp.addClass('hidden');
            showitem.addClass('hidden');
            a_regadd.removeClass('hidden');
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






        $("form#registerform").submit(function(ev) {
            ev.preventDefault();
  
            // if($('#reg_nr').val() != null && $('#ent_password').val() != null){
            //     var reg_nr = myTrim($('#reg_nr').val());
            //     var ent_password = myTrim($('#ent_password').val());       
            //     alert(ent_password);           
            // }

            var vards = myTrim(F_L_Capital($('#name').val()));
            var uzvards = myTrim(F_L_Capital($('#surname').val()));
            var epasts = myTrim($('#email').val());
            var epasts_atk = myTrim($('#email_repeat').val());
            if($('#address').val() != null){
                var adrese = myTrim($('#address').val());
            }
            var parole = myTrim($('#password').val());
            var parole_atk = myTrim($('#password_repeat').val());
            if($('#reg_nr').val() != null && $('#ent_password').val() != null){
                var reg_nr = myTrim($('#reg_nr').val());
                var ent_password = myTrim($('#ent_password').val());               
            }
            // alert(ent_password); 
            var pasta_indekss = myTrim($('#pasta_indekss_hide').val());
            var novads = myTrim($('#novads_hide').val());
            var pilseta = myTrim($('#pilseta_hide').val());
            var pagasts = myTrim($('#pagasts_hide').val());
            var ciems = myTrim($('#ciems_hide').val());
            var iela = myTrim($('#iela_hide').val());
            var ek_nr = myTrim($('#ek_nr_hide').val());
            var dzivoklis = myTrim($('#dzivoklis_hide').val());
            //This condition will only be true if each value is not an empty string
            if(vards && uzvards && epasts && epasts_atk && parole && parole_atk){
                    if(epasts_atk==epasts && parole_atk==parole){ 
                        if(adrese!=null){
                            $.ajax({
                                type: "POST",
                                url: "registracija.php",
                                data: "name="+ vards +"& surname="+ uzvards +"& email="+ epasts +"& email_repeat="+ epasts_atk 
                                +"& address="+ adrese  +"& password="+ parole  +"& password_repeat="+ parole_atk
                                +"& pasta_indekss_hide="+ pasta_indekss  +"& pagasts_hide="+ pagasts  +"& novads_hide="+ novads  +"& pilseta_hide="+ pilseta
                                +"& ciems_hide="+ ciems  +"& iela_hide="+ iela  +"& ek_nr_hide="+ ek_nr
                                +"& dzivoklis_hide="+ dzivoklis,
                                success: function(){
                                    window.location.replace("http://localhost/MekletAtlaides/home.php");
                                }
                            }); 
                        }else if(reg_nr!=null && ent_password!=null){
                            $.ajax({
                                type: "POST",
                                url: "registracija.php",
                                data: "name="+ vards +"& surname="+ uzvards +"& email="+ epasts +"& email_repeat="+ epasts_atk 
                                +"& password="+ parole +"& password_repeat="+ parole_atk+"& reg_nr="+ reg_nr+"& ent_password="+ ent_password
                                +"& pasta_indekss_hide="+ pasta_indekss  +"& pagasts_hide="+ pagasts  +"& novads_hide="+ novads  +"& pilseta_hide="+ pilseta
                                +"& ciems_hide="+ ciems  +"& iela_hide="+ iela  +"& ek_nr_hide="+ ek_nr
                                +"& dzivoklis_hide="+ dzivoklis,
                                success: function(){
                                    window.location.replace("http://localhost/MekletAtlaides/home.php");
                                }
                            });          
                        }        
                    }else{
                        if(epasts_atk==epasts){
                            $('#epasts_atk_e').addClass('hidden');
                            $('#epasts_atk_e').text('');
                            $('#email_repeat').css('border-color', '#545454');                
                        }else{
                            $('#epasts_atk_e').removeClass('hidden');
                            $('#epasts_atk_e').text('Epasts nesakrīt, mēginiet vēlreiz!');
                            $('#email_repeat').css('border-color', '#FC6B6B');
                        }
                        if(parole_atk==parole){
                            $('#parole_atk_e').addClass('hidden');
                            $('#parole_atk_e').text('');
                            $('#password_repeat').css('border-color', '#545454');
                        }else{
                            $('#parole_atk_e').removeClass('hidden');
                            $('#parole_atk_e').text('Epasts nesakrīt, mēginiet vēlreiz!');
                            $('#password_repeat').css('border-color', '#FC6B6B');             
                        }
                    }        

            }else{
                if(vards!=''){
                    $('#vards_e').addClass('hidden');
                    $('#vards_e').text('');
                    $('#name').css('border-color', '#545454');
                }else{
                    $('#vards_e').removeClass('hidden');
                    $('#vards_e').text('Aizpildiet lauku!');
                    $('#name').css('border-color', '#FC6B6B');

                }
                if(uzvards!=''){
                    $('#uzvards_e').addClass('hidden');
                    $('#uzvards_e').text('');
                    $('#surname').css('border-color', '#545454');
                }else{
                    $('#uzvards_e').removeClass('hidden');
                    $('#uzvards_e').text('Aizpildiet lauku!');
                    $('#surname').css('border-color', '#FC6B6B');
                }

                if(epasts!=''){
                    $('#epasts_e').addClass('hidden');
                    $('#epasts_e').text('');
                    $('#email').css('border-color', '#545454');
                }else{
                    $('#epasts_e').removeClass('hidden');
                    $('#epasts_e').text('Aizpildiet lauku!');
                    $('#email').css('border-color', '#FC6B6B');
                }

                if(epasts_atk!=''){
                    if(epasts_atk==epasts){
                        $('#epasts_atk_e').addClass('hidden');
                        $('#epasts_atk_e').text('');
                        $('#email_repeat').css('border-color', '#545454');                
                    }else{
                        $('#epasts_atk_e').removeClass('hidden');
                        $('#epasts_atk_e').text('Epasts nesakrīt, mēginiet vēlreiz!');
                        $('#email_repeat').css('border-color', '#FC6B6B');
                    }
                }else{
                    $('#epasts_atk_e').removeClass('hidden');
                    $('#epasts_atk_e').text('Aizpildiet lauku!');
                    $('#email_repeat').css('border-color', '#FC6B6B');
                }
                if(adrese!=null){
                    if(adrese!=''){
                        $('#adrese_e').addClass('hidden');
                        $('#adrese_e').text('');
                        $('#address').css('border-color', '#545454');
                    }else{
                        $('#adrese_e').removeClass('hidden');
                        $('#adrese_e').text('Aizpildiet lauku!');
                        $('#address').css('border-color', '#FC6B6B');
                    }                 
                }


                if(parole!=''){
                    $('#parole_e').addClass('hidden');
                    $('#parole_e').text('');
                    $('#password').css('border-color', '#545454');
                }else{
                    $('#parole_e').removeClass('hidden');
                    $('#parole_e').text('Aizpildiet lauku!');
                    $('#password').css('border-color', '#FC6B6B');
                }

                if(parole_atk!=''){
                    if(parole_atk==parole){
                        $('#parole_atk_e').addClass('hidden');
                        $('#parole_atk_e').text('');
                        $('#password_repeat').css('border-color', '#545454');
                    }else{
                        $('#parole_atk_e').removeClass('hidden');
                        $('#parole_atk_e').text('Parole nesakrīt, mēginiet vēlreiz!');
                        $('#password_repeat').css('border-color', '#FC6B6B');             
                    }
                }else{
                    $('#parole_atk_e').removeClass('hidden');
                    $('#parole_atk_e').text('Aizpildiet lauku!');
                    $('#password_repeat').css('border-color', '#FC6B6B');
                }

                if(reg_nr!=null && ent_password!=null){
                    if(reg_nr!=''){
                        $('#uzn_reg_nr_e').addClass('hidden');
                        $('#uzn_reg_nr_e').text('');
                        $('#reg_nr').css('border-color', '#545454');
                    }else{
                        $('#uzn_reg_nr_e').removeClass('hidden');
                        $('#uzn_reg_nr_e').text('Aizpildiet lauku!');
                        $('#reg_nr').css('border-color', '#FC6B6B');
                    }   
                    if(ent_password!=''){
                        $('#uzn_parole_e').addClass('hidden');
                        $('#uzn_parole_e').text('');
                        $('#ent_password').css('border-color', '#545454');
                    }else{
                        $('#uzn_parole_e').removeClass('hidden');
                        $('#uzn_parole_e').text('Aizpildiet lauku!');
                        $('#ent_password').css('border-color', '#FC6B6B');
                    }                
                }

            }
            return false; //IE
        });


























        $("form#admin-form").submit(function(ev) {
            ev.preventDefault();
  
            // if($('#reg_nr').val() != null && $('#ent_password').val() != null){
            //     var reg_nr = myTrim($('#reg_nr').val());
            //     var ent_password = myTrim($('#ent_password').val());       
            //     alert(ent_password);           
            // }

            var reg_nr = myTrim($('#reg_nr').val());
            var nosaukums = myTrim(F_L_Capital($('#nosaukums').val()));
            var ties_forma = myTrim($('#ties_forma').val());
            var jurid_adrese = myTrim($('#jurid_adrese').val());
            var darb_veids = myTrim($('#darb_veids').val());
            var tel_nr = myTrim($('#tel_nr').val());
            var epasts = myTrim($('#epasts').val());
            var mates_uzn = myTrim($('#mates_uzn').val());
            var uzn_parole = myTrim($('#uzn_parole').val());


            var pasta_indekss = myTrim($('#pasta_indekss_hide').val());
            var novads = myTrim($('#novads_hide').val());
            var pilseta = myTrim($('#pilseta_hide').val());
            var pagasts = myTrim($('#pagasts_hide').val());
            var ciems = myTrim($('#ciems_hide').val());
            var iela = myTrim($('#iela_hide').val());
            var ek_nr = myTrim($('#ek_nr_hide').val());
            var dzivoklis = myTrim($('#dzivoklis_hide').val());
            //This condition will only be true if each value is not an empty string
            if(reg_nr && nosaukums && ties_forma && jurid_adrese && darb_veids && tel_nr && epasts && uzn_parole){
                $.ajax({
                    type: "POST",
                    url: "a_company_r.php",
                    data: "reg_nr="+ reg_nr +"& nosaukums="+ nosaukums +"& ties_forma="+ ties_forma +"& jurid_adrese="+ jurid_adrese 
                    +"& darb_veids="+ darb_veids  +"& tel_nr="+ tel_nr  +"& epasts="+ epasts+"& mates_uzn="+ mates_uzn+"& uzn_parole="+ uzn_parole
                    +"& pasta_indekss_hide="+ pasta_indekss  +"& pagasts_hide="+ pagasts  +"& novads_hide="+ novads  +"& pilseta_hide="+ pilseta
                    +"& ciems_hide="+ ciems  +"& iela_hide="+ iela  +"& ek_nr_hide="+ ek_nr
                    +"& dzivoklis_hide="+ dzivoklis,
                    success: function(){
                        window.location.replace("http://localhost/MekletAtlaides/a_home.php");
                    }
                });       
            }else{
                if(reg_nr!=''){
                    $('#reg_nr_e').addClass('hidden');
                    $('#reg_nr_e').text('');
                    $('#reg_nr').css('border-color', '#545454');
                }else{
                    $('#reg_nr_e').removeClass('hidden');
                    $('#reg_nr_e').text('Aizpildiet lauku!');
                    $('#reg_nr').css('border-color', '#FC6B6B');

                }
                if(nosaukums!=''){
                    $('#nosaukums_e').addClass('hidden');
                    $('#nosaukums_e').text('');
                    $('#nosaukums').css('border-color', '#545454');
                }else{
                    $('#nosaukums_e').removeClass('hidden');
                    $('#nosaukums_e').text('Aizpildiet lauku!');
                    $('#nosaukums').css('border-color', '#FC6B6B');
                }

                if(ties_forma!=''){
                    $('#ties_forma_e').addClass('hidden');
                    $('#ties_forma_e').text('');
                    $('#ties_forma').css('border-color', '#545454');
                }else{
                    $('#ties_forma_e').removeClass('hidden');
                    $('#ties_forma_e').text('Aizpildiet lauku!');
                    $('#ties_forma').css('border-color', '#FC6B6B');
                }

                if(jurid_adrese!=''){
                    $('#jurid_adrese_e').addClass('hidden');
                    $('#jurid_adrese_e').text('');
                    $('#jurid_adrese').css('border-color', '#545454');                
                }else{
                    $('#jurid_adrese_e').removeClass('hidden');
                    $('#jurid_adrese_e').text('Aizpildiet lauku!');
                    $('#jurid_adrese').css('border-color', '#FC6B6B');
                }
                if(darb_veids!=''){
                    $('#darb_veids_e').addClass('hidden');
                    $('#darb_veids_e').text('');
                    $('#darb_veids').css('border-color', '#545454');
                }else{
                    $('#darb_veids_e').removeClass('hidden');
                    $('#darb_veids_e').text('Aizpildiet lauku!');
                    $('#darb_veids').css('border-color', '#FC6B6B');
                }                 


                if(tel_nr!=''){
                    $('#tel_nr_e').addClass('hidden');
                    $('#tel_nre_e').text('');
                    $('#tel_nr').css('border-color', '#545454');
                }else{
                    $('#tel_nr_e').removeClass('hidden');
                    $('#tel_nr_e').text('Aizpildiet lauku!');
                    $('#tel_nr').css('border-color', '#FC6B6B');
                }

                if(epasts!=''){
                    $('#epasts_e').addClass('hidden');
                    $('#epasts_e').text('');
                    $('#epasts').css('border-color', '#545454');
                }else{
                    $('#epasts_e').removeClass('hidden');
                    $('#epasts_e').text('Aizpildiet lauku!');
                    $('#epasts').css('border-color', '#FC6B6B');
                }

                if(uzn_parole!=''){
                    $('#uzn_parole_e').addClass('hidden');
                    $('#uzn_parole_e').text('');
                    $('#uzn_parole').css('border-color', '#545454');
                }else{
                    $('#uzn_parole_e').removeClass('hidden');
                    $('#uzn_parole_e').text('Aizpildiet lauku!');
                    $('#uzn_parole').css('border-color', '#FC6B6B');
                }   

            }
            return false; //IE
        });





    });

        


/////////////////////////////////