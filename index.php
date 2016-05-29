
<?php include "base.php"; ?>
<html>
<head>

    <?php require "head.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Webpage</title>
</head>


<body>
    <section class="body-welcome">
        <header class="main-nav">
            <div class="header-right">
 
                <?php require "navigation.php"; ?>

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
    <?php require "footer.php"; ?>
</body>


<!-- 
    <div id="message-wrapper-up">
        <div id="message-div" class="message-div">
          <div class="alert alert-success hidden">
            <strong>Success!</strong> This alert box could indicate a successful or positive action.
          </div>

          <div class="alert alert-info hidden">
            <strong>Info!</strong> This alert box could indicate a neutral informative change or action.
          </div>
          <div class="alert alert-warning hidden">
            <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
          </div>
          <div class="alert alert-danger">
            <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
          </div>

        </div>
    </div> -->



<script src="scripts/jquery.js"></script>

</html>

