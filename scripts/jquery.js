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


$(function(){

    $(".flip").click(function(){
        var flipid = $(this).attr('flip-id')
        $(".panel."+flipid).slideToggle("fast");
    });
});




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



// $(function() {
//     var button = $('#nav-right-button-login');
//     var box = $('#loginBox');
//     var form = $('#loginForm');
//     var buttonClass= $("#loginContainer").attr("class");
//     button.click(function(login) {
//         if(buttonClass!='active')
//         {
//             button.toggleClass('active');
//             box.toggle();
//         } 
//     });
//     button.parents().click(function(){
//         if(buttonClass=='active')
//         {
//             button.toggleClass('active');
//             box.toggle();
//         } 
//     })
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








                // <button id="nav-right-button-login"></button>
                // <div style="clear:both"></div>
                // <div id="loginBox">                
                //     <form id="loginForm">
                //         <fieldset id="body">
                //             <fieldset>
                //                 <label for="email">Email Address</label>
                //                 <input type="text" name="email" id="email" />
                //             </fieldset>
                //             <fieldset>
                //                 <label for="password">Password</label>
                //                 <input type="password" name="password" id="password" />
                //             </fieldset>
                //             <input type="submit" id="login" value="Sign in" />
                //             <label for="checkbox"><input type="checkbox" id="checkbox" />Remember me</label>
                //         </fieldset>
                //         <span><a href="#">Forgot your password?</a></span>
                //     </form>
                // </div>







// html,body{width:100%;height:100%;padding:0;background:#fff;margin:0;font-family:arial}
// a { text-decoration:none }
// .container { width:262px; margin:0 auto; padding-top:200px; }

// #bar { width:100%; height:35px; padding:15px 0; background:url(../images/bar.png) repeat-x; }
// #container { width:960px; margin:0 auto; }

// /*-------LOGIN STARTS HERE -------*/

// /* Login Container (default to float:right) */
// #loginContainer {
//     position:relative;
//     float:right;
//     font-size:12px;
// }

// /* Login Button */
// #nav-right-button-login { 
//     display:inline-block;
//     float:right;
//     background: url("Pictures/login.png") no-repeat;
//     width: 160px;
//     height: 40px;
//     border:1px solid #899caa; 
//     border-radius:3px;
//     -moz-border-radius:3px;
//     position:relative;
//     z-index:30;
//     cursor:pointer;
// }



// #loginButton:hover {
//     background: url("Pictures/login_active.png") no-repeat;
// }

// /* Login Box */
// #loginBox {
//     position:absolute;
//     right:0;
//     display:none;
//     z-index:29;
// }

// /* If the Login Button has been clicked */    
// #loginButton.active {
//     border-radius:3px 3px 0 0;
// }

// /* A Line added to overlap the border */
// #loginButton.active em {
//     position:absolute;
//     width:100%;
//     height:1px;
//     background:#d2e0ea;
//     bottom:-1px;
// }

// /* Login Form */
// #loginForm {
//     width:248px; 
//     border:1px solid #899caa;
//     border-radius:3px 0 3px 3px;
//     -moz-border-radius:3px 0 3px 3px;
//     margin-top:-1px;
//     background:#d2e0ea;
//     padding:6px;
// }

// #loginForm fieldset {
//     margin:0 0 12px 0;
//     display:block;
//     border:0;
//     padding:0;
// }

// fieldset#body {
//     background:#fff;
//     border-radius:3px;
//     -moz-border-radius:3px;
//     padding:10px 13px;
//     margin:0;
// }

// #loginForm #checkbox {
//     width:auto;
//     margin:1px 9px 0 0;
//     float:left;
//     padding:0;
//     border:0;
//     *margin:-3px 9px 0 0; /* IE7 Fix */
// }

// #body label {
//     color:#3a454d;
//     margin:9px 0 0 0;
//     display:block;
//     float:left;
// }

// #loginForm #body fieldset label {
//     display:block;
//     float:none;
//     margin:0 0 6px 0;
// }

// /* Default Input */
// #loginForm input {
//     width:92%;
//     border:1px solid #899caa;
//     border-radius:3px;
//     -moz-border-radius:3px;
//     color:#3a454d;
//     font-weight:bold;
//     padding:8px 8px;
//     box-shadow:inset 0px 1px 3px #bbb;
//     -webkit-box-shadow:inset 0px 1px 3px #bbb;
//     -moz-box-shadow:inset 0px 1px 3px #bbb;
//     font-size:12px;
// }

// /* Sign In Button */
// #loginForm #login {
//     width:auto;
//     float:left;
//     background:#339cdf url(../images/loginbuttonbg.png) repeat-x;
//     color:#fff;
//     padding:7px 10px 8px 10px;
//     text-shadow:0px -1px #278db8;
//     border:1px solid #339cdf;
//     box-shadow:none;
//     -moz-box-shadow:none;
//     -webkit-box-shadow:none;
//     margin:0 12px 0 0;
//     cursor:pointer;
//     *padding:7px 2px 8px 2px; /* IE7 Fix */
// }

// /* Forgot your password */
// #loginForm span {
//     text-align:center;
//     display:block;
//     padding:7px 0 4px 0;
// }

// #loginForm span a {
//     color:#3a454d;
//     text-shadow:1px 1px #fff;
//     font-size:12px;
// }

// input:focus {
//     outline:none;
// }