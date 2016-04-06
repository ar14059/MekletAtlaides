<?php include "base.php"; ?>

<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/katalogs.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/jquery.js"></script>


    <title>Webpage</title>
</head>


<body>


    <header class="main-nav">
        <div class="nav-subject left">
            <img src="css/Pictures/lokalize_small.png">
            <div class="vieta-content">
                <p class="vieta">Saules iela 5a, Rīga</p>
                <p class="vieta-mainit">Mainīt atrašanās vietu</p>
            </div>
        </div>
        <div class="nav-subject right">
            <div id="navigation_include"></div>
            <script> 
            $(function(){
              $("#navigation_include").load("navigation.php"); 
            });
            </script> 
            <a href="home.php"><button id="nav-right-button-back" class="button_nav"></button></a>
        </div>
    </header>
    <div class="wrapper">
        <div class="reklamas-meklesana">
            <div class="margin-auto hsw">
                <button class="home-search"></button>
                <input type="text" class="home-search-input" placeholder="Pilsēta, uzņēmums vai preces"/>
            </div>
            <div class="margin-auto title"><p class="nedelas-reklamas-title">Visas šīs nedēļas reklāmas</p></div>
            <hr>
        </div>
        <section id="main-item-list">
            <section class="m-i-li-center">
                <article id="reklama1" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>

                <article id="reklama2" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama3" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama4" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama5" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama6" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama7" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama8" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama9" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama10" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama11" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
                <article id="reklama12" class="reklamas">
                    <p class="add-placeholder">Ad Placeholder</p>
                    <p class="veikals">Veikals</p>
                    <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    <article id="reklama-hover1" class="reklamas-hover">
                        <button class="google-map"></button>
                        <button class="star"></button>
                        <div class="radit-div">
                            <div class="radit-div-center">
                            <button class="radit"></button>
                            </div>
                        </div>
                        <p class="veikals">Veikals</p>
                        <p class="der-termins">Beidzas pēc <span>x</span> dienām</p>
                    </article>
                </article>
            </section>
        </section>
        <div class="radit-vel-div">
            <div class="radit-vel-div-center">
            <button class="radit-vel"></button>
            </div>
        </div>
        <header class="main-subject-header"><p class="main-subject-title">Populārākie pārdevēji</p></header>
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
            
    </div>
    <div id="footer_include"></div>
    <script> 
    $(function(){
      $("#footer_include").load("footer.html"); 
    });
    </script>

    <div id="katalogs-wrapper-up" class="wrapper-up hidden">
        <div id="email-div" class="email-div hidden">
            <div class="email-div-center">
                <button class="star_fill"></button>
                <button id="wrapper-email-close" class="close"></button>
                <section id="email-form">
                    <p>Ievadiet E-pastu, lai saņemtu jaunumus par šo piedāvājumu</p>  
                    <input type="text" id="kwu-email" class="email-input" placeholder="Epasta adrese">  
                    <button class="email-submit"></button>
                </section>
            </div>
        </div>
        <div id="showitem-div" class="email-div hidden">
            <div class="email-div-center">
                <button class="star_fill"></button>
                <button id="wrapper-showitem-close" class="close"></button>
                <section id="email-form">
                    <p>Preces apraksts</p>  
                    <input type="text" id="kwu-itemname" class="email-input" placeholder="Epasta adrese">  
                    <button class="email-submit"></button>
                </section>
            </div>
        </div>
    </div>


</body>



</html>

