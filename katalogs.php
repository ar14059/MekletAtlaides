<?php include "base.php"; ?>

<html>
<head>
    <?php require "head.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/katalogs.css">
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
            <?php require "navigation.php"; ?>
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

            <?php
            for ($i = 1; $i <= 16; $i++) {
            ?>
                <article id="<?php echo 'reklama'.$i; ?>" class="reklamas">
                    <p class="rekl_virsraksts">Produkta nos</p>
                    <img class="rekl_kat_attels" src="css/pictures/green_apple.jpg">
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
            <?php
            }
            ?>

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

    <?php require "footer.php"; ?>

</body>

    <script src="scripts/jquery.js"></script>

</html>

