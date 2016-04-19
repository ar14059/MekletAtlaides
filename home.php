<?php include "base.php"; ?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/jquery.js"></script>



    <title>Webpage</title>
</head>


<body>

    <section class="body-welcome">
        <header class="main-nav">
            <div class="header-right">

<!--                 <div id="navigation_include"></div> -->
                <script> 
                // $(function(){
                //   $("#navigation_include").load("navigation.php"); 
                // });
                </script> 

    <?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Epasts']))
{
    if($_SESSION['Lietotaja_limenis']<2){
    ?>

        <div class="name_surname_div">
            <p id="name_surname" class="login_user_data">Lietotājs 
                <code><?=$_SESSION['Vards'];?></code> 
                <code><?=$_SESSION['Uzvards'];?></code>.
            </p>
        </div>
        <div id="main-settings-container">
            <button id="main-settings-btn"></button>
            <div id="main-settings-box">
                <p id="msb_profile" class="msb_p">Profils</p>
                <a href="logout.php"><p id="msb_sign-out" class="msb_p">Iziet</p></a>
            </div>
        </div>
      
    <?php
    }else{
        header("location: a_home.php"); 
    }
}
elseif(!empty($_POST['email']) && !empty($_POST['password']))
{
    $email_address = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
     
    $checklogin = mysqli_query($con ,"SELECT * FROM lietotajs WHERE Epasts = '".$email_address."' AND Parole = '".$password."'");
     
    if(mysqli_num_rows($checklogin) == 1)
    {
        $row = mysqli_fetch_array($checklogin);
        // $email = $row['EmailAddress'];
        $active = $row['Aktivs'];
        if($active==1){ 
            $id = $row['ID'];
            $_SESSION['ID'] = $id;
            $name = $row['Vards'];
            $surname = $row['Uzvards'];
            $user_level = $row['Lietotaja_limenis'];     
            $_SESSION['Epasts'] = $email_address;
            $_SESSION['Vards'] = $name;
            $_SESSION['Uzvards'] = $surname;
            $_SESSION['LoggedIn'] = 1;
            $_SESSION['Lietotaja_limenis'] = $user_level;  
        }else{
            // echo "<h1>Jūs nobloķēja administrators!</h1>";
        }
        header("Refresh:0");
    }
    else
    {
        // echo "<script type='text/javascript'>alert('Worked but not how expected);</script>";
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"home.php\">click here to try again</a>.</p>";
    }
}
else
{
    ?>

    <button id="hidden_button_login" class="button_nav"></button>
    <div id="loginContainer">
        <button id="nav-right-button-login" class="button_nav"></button>
        <div id="loginBox">   
            <form method="post" action="home.php" name="loginForm" id="loginForm">
            <hr>  
                <fieldset id="body">
                    <fieldset>
                        <label for="email">E-pasts:</label>
                        <input type="text" name="email" id="email" />
                    </fieldset>
                    <fieldset>
                        <label for="password">Parole:</label>
                        <input type="password" name="password" id="password" />
                    </fieldset>
                    <button type="submit" name="login" id="login" value="Login"></button>
                </fieldset>
            </form>
        </div>            
    </div>
    <div id="registerContainer">
        <button id="nav-right-button-register" class="button_nav"></button>
        <div id="registerBox">   
            <form method="post" action="home.php" name="registerForm" id="registerForm">
                <?php
                echo "<a href='check_user_level.php?u_level=0' id='msb_pircejs' class='rsb_p'>Pircējs</a>";
                echo "<a href='check_user_level.php?u_level=1' id='msb_uznemums' class='rsb_p'>Uzņēmums</a>";
                ?>
        </div>            
    </div>
     
   <?php
}
?>
 


            </div>
        </header>
        <div class="home-content">
            <div class="home-content-center">
                <p class="home-content-header">Iknedēļas reklāmas un piedāvājumi</p>
                <p class="home-content-subheader">Apskati jaunākos piedāvājumus</p>

                <div class="home-search-wrapper">
                    <div class="center">
                         <button class="home-search"></button>
                         <span><input type="text" class="home-search-input" placeholder="Pilsēta, uzņēmums vai preces"/></span>
                    </div>
                </div>
                <div class="AppDownloadButtons">
                    <div><button class="google-play"></button></div>
                    <div><button class="app-store"></button></div>  
                </div>
            </div>
        </div>
    </section>
    



    <section id="body-content">
        <section class="bg">
            <section id="ka-tas-strada" class="main-content-center">
                <header><p class="main-subject-title">Kā tas strādā?</p></header>             
                <section class="sub-content">

                    <section class="image">
                        <button class="lokalize"></button>
                    </section>
                    <section class="image-content">
                        <h5>Lokalizē</h5>
                        <p>Iezīmē savu atrašanās vietu un saņem iknedēļas piedāvājumus no vietējiem pārdevējiem</p>                 
                    </section>
                </section> 
                <section class="sub-content">
                    <section class="image">
                        <button class="atrodi"></button>
                    </section>
                    <section class="image-content">
                        <h5>Atrodi</h5>
                        <p>Apskati iknedēļas piedāvajumus un atrodi labākos no sava iecienītā pārdevēja</p>                 
                    </section>
                </section>
                <section class="sub-content">
                    <section class="image">
                        <button class="ietaupi"></button>
                    </section>
                    <section class="image-content">
                        <h5>Ietaupi</h5>
                        <p>Ietaupi naudu savā nākamajā pirkumā</p>                 
                    </section>
                </section>
            </section>     
        </section>


        <section class="bg-with">
            <section id="kategorijas" class="main-content-center">
                <header><p class="main-subject-title">Kategorijas</p></header>
                <section class="desktop hidden">
                    <article>
                        <button id="mebeles"><a href="katalogs.php"></a></button>
                        <button id="sporta-preces"></button>
                        <button id="rotallietas"></button>
                        <button id="elektronika"></button>
                        <button id="darba-riki"></button>
                        <button id="atlaizu-veikali"></button>
                        <button id="automobiliem"></button>
                        <button id="universalveikali"></button>
                        <button id="kosmetika"></button>
                        <button id="apgerbi"></button>
                        <button id="majdzivnieki"></button>
                        <button id="citi"></button>
                    </article>
                </section> 
            </section>     
        </section>


        <section class="bg">
            <section id="pilsetu-parskats" class="main-content-center">
                <header><p class="main-subject-title">Pilsētu pārskats</p></header>  
                <section class="pilsetas">
                    <article class="lielakas-pilsetas">
                        <p class="sub-content-title">Lielākās pilsētas</p>
                        <div>
                            <ul>
                                <li><a href="#"><p>Rīga</p></a></li>
                                <li><a href="#"><p>Liepāja</p></a></li>
                                <li><a href="#"><p>Ventspils</p></a></li>
                                <li><a href="#"><p>Talsi</p></a></li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li><a href="#"><p>Sigulda</p></a></li>
                                <li><a href="#"><p>Balvi</p></a></li>
                                <li><a href="#"><p>Ogre</p></a></li>
                                <li><a href="#"><p>Daugavpils</p></a></li>
                            </ul>                        
                        </div>
                        <div>
                            <ul>
                                <li><a href="#"><p>Jelgava</p></a></li>
                                <li><a href="#"><p>Cēsis</p></a></li>
                                <li><a href="#"><p>Jūrmala</p></a></li>
                                <li><a href="#"><p>Rēzekne</p></a></li>
                            </ul>                       
                        </div>
                    </article>   
                    <article class="pilsetas-karte">
                        <button class="karte"></button>
                    </article>
                </section> 
                <section class="parejas-pilsetas">
                    <p  class="sub-content-title">Visas pilsētas</p>
                    <a href="#" class="letter-list"><p class="letter-list">
                        aadasfasfdfsdfds
                    </p></a>
                </section>
            </section>     
        </section>


        <section class="bg-with">
            <section id="popularakie-pardeveji" class="main-content-center">
                <header><p class="main-subject-title">Populārākie pārdevēji</p></header>
                <section class="image-slider">
                    <section class="prevnext"><div><p class="vertical_align"><button class="prev"></button></p></div></section>
                    <section class="images">
                        <img id="image-1" class="image">
                        <img id="image-2" class="image">
                        <img id="image-3" class="image">
                        <img id="image-4" class="image">
                        <img id="image-5" class="image">
                    </section>
                    <section class="prevnext"><div><p class="vertical_align"><button class="next"></button></p></div></section>
                </section>
            </section>
        </section>


        <section class="bg">
            <section id="reklamas-un-piedavajumi" class="main-content-center">
                <section class="rup-center">
                    <div class="flip 1" flip-id="1">
                        <p class="title">Iknedēļas preces un piedāvājumi</p>
                        <button class="up hidden"></button>
                        <button class="down"></button>
                    </div>
                    <div class="panel 1" panel-id="1">111111111</div>
                    <hr>
                    <div class="flip 2" flip-id="2">
                        <p class="title">Nekad nenokavē labu piedāvājumu</p>
                        <button class="up hidden"></button>
                        <button class="down"></button>
                    </div>
                    <div class="panel 2" panel-id="2">222222222</div>
                    <hr>
                    <div class="flip 3" flip-id="3">
                        <p class="title">Vietējie veikali</p>
                        <button class="up hidden"></button>
                        <button class="down"></button>
                    </div>
                    <div class="panel 3" panel-id="3">333333333</div>
                    <hr>
                </section>
            </section>
        </section>


        <section class="bg-with" >
            <section id="popularakie-produkti" class="main-content-center">
                <header><p class="main-subject-title">Populārākie produkti</p></header>
                <div id="popularakie-produkti_include"></div>
                <script> 
                $(function(){
                  $("#popularakie-produkti_include").load("popularakie_produkti.html"); 
                });
                </script> 
            </section>
        </section>
    </section>
    <div id="footer_include"></div>
    <script> 
    $(function(){
      $("#footer_include").load("footer.html"); 
    });
    </script> 
</body>



</html>
