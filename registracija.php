<?php include "base.php"; ?>
<html>
<head>
    


    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/registracija.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/jquery.js"></script>


    <title>Webpage</title>
</head>
<body>

    <section class="body-welcome">
        <header class="main-nav">
            <div class="header-right">
                <a href="home.php"><button id="nav-right-button-back" class="button_nav"></button></a>
                <!-- <button id="nav-right-button-back" class="button_nav"></button> -->
            </div>
        </header>

        <section id="body-content">


<?php
if(!empty($_POST['email']) && !empty($_POST['password']))
{
    $email_address = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    // echo "<h1>Success</h1>";
     
     $checkemail = mysqli_query($con, "SELECT * FROM users WHERE EmailAddress = '".$email_address."'");
      
     if(mysqli_num_rows($checkemail) == 1)
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
     }
     else
     {
        $registerquery = mysqli_query($con, "INSERT INTO users (EmailAddress, Password, Name, Surname, City, Address) 
            VALUES('".$email_address."', '".$password."', '".$name."', '".$surname."', '".$city."', '".$address."')");
        if($registerquery)
        {
            $_SESSION['EmailAddress'] = $email_address;
            $_SESSION['LoggedIn']=1;
            $_SESSION['Name'] = $name;
            $_SESSION['Surname'] = $surname;
            header("Location: http://localhost/MekletAtlaides/home.php");
            die();
            // echo "<h1>Success</h1>";
            // echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
        }       
     }
}
else
{
    ?>


            <section class="par-mums">
                <div id="par-mums_content">
                    <form method="post" action="registracija.php" name="registerform" id="registerform" class="content">
                    <!-- <section class="content"> -->
                        <p class="subject-title">Par mums</p>
                        <hr>
                        <fieldset id="input_area" class="content_area">
                            <fieldset>
                                <label for="name">Vārds:</label>
                                <input type="text" name="name" id="name" />
                            </fieldset>
                            <fieldset>
                                <label for="surname">Uzvārds:</label>
                                <input type="text" name="surname" id="surname" />
                            </fieldset>
                            <fieldset>
                                <label for="email">E-pasts:</label>
                                <input type="text" name="email" id="email" />
                            </fieldset>
                            <fieldset>
                                <label for="email">Atkārtot E-pastu:</label>
                                <input type="text" name="email_repeat" id="email_repeat" />
                            </fieldset>
                            <fieldset>
                                <label for="city">Pilsēta:</label>
                                <input type="text" name="city" id="city" />
                            </fieldset>
                            <fieldset>
                                <label for="address">Adrese:</label>
                                <input type="text" name="address" id="address" />
                            </fieldset>
                            <fieldset>
                                <label for="password">Parole:</label>
                                <input type="password" name="password" id="password" />
                            </fieldset>
                            <fieldset>
                                <label for="password_repeat">Atkārtot Paroli:</label>
                                <input type="password" name="password_repeat" id="password_repeat" />
                            </fieldset>
                        </fieldset>
                        <fieldset id="submit_area" class="content_area">
                            <fieldset>
                                <div><p class="vertical_align"><input type="checkbox" class="checkbox_css" ><span>Piekrītu lietošanas noteikumiem</span></p></div>
                                <button type="submit" name="registreties_submit" id="registreties_submit"  class="submit_button"></button>
                            </fieldset>
                        </fieldset>
                    <!-- </section> -->
                    </form>
                </div>
            </section>
    <?php
}
?>

        </section>


        <footer>
            <section id="footer" class="main-content-center">
                <section class="sub-content one">
                    <p class="title">Par mums</p><br>
                    <hr class="under-title">
                    <div>
                        <p class="footer-info"><a href="#">Kas ir ...?</a></p>
                        <p class="footer-info"><a href="#">Kā mēs strādājam?</a></p>
                    </div>
                </section>
                <section class="sub-content two">
                    <p class="title">Sazinies ar mums</p><br>
                    <hr class="under-title">
                    <div>
                        <p class="footer-info"><a href="#">Epasts - tirgus@tirgus.lv</a></p>
                        <p class="footer-info"><a href="#">Tālrunis - 22334455</a></p>
                        <p class="footer-info"><a href="#">Skype - TirgusLv</a></p>
                    </div>
                </section>
                <section class="sub-content three">
                    <p class="title">Seko mums</p><br>
                    <hr class="under-title">
                    <div class="buttons">
                        <p class="footer-info">
                            <button id="draugiemlv" class="soc_tikli"></button>
                            <button id="facebook" class="soc_tikli"></button>
                            <button id="twitter" class="soc_tikli"></button>
                        </p>
                    </div>
                    <hr>
                    <div class="buttons">
                        <p class="footer-info">
                            <div class="v_indekss"><button id="lv" class="valodas"></button>LV</div>
                            <div class="v_indekss"><button id="ru" class="valodas"></button>RU</div>
                            <div class="v_indekss"><button id="en" class="valodas"></button>EN</div>
                        </p>
                    </div>
                </section>
            </section>
        </footer>

    </section>
    






</body>



</html>

