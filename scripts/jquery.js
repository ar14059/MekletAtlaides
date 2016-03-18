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
//katalogs.html sadaļa "Galvenais kataloga saraksts". 
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
            // $('#main-settings-container')
            // $('#divID').css("background-image", "url(/myimage.jpg)");  
            button.toggleClass('active');
            box.toggle();
                    // button.mouseenter(function(login) { 
                    //         button.css("background-color", "#FFF"); 
                    //         $('#main-settings-btn').css("background-image", 'url(css/Pictures/main_option_btn_active.png)');
                    // });
                    // button.mouseleave(function(login) { 
                    //         button.css("background-color", "transparent"); 
                    //         $('#main-settings-btn').css("background-image", 'url(css/Pictures/main_option_btn.png)');
                    // });
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

$(function(){
    $(".star").click(function(){
        var wrapperEmail = $( ".wrapper-email");
        wrapperEmail.removeClass('hidden');
    });
});


$(function(){
    $("#wrapper-email-close").click(function(){
        var wrapperEmail = $( ".wrapper-email");
        wrapperEmail.addClass('hidden');
    });
});


