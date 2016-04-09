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

<!-- Papildus reģistrācijas forma, kurā jāievada adreses dati  -->
<!--___________________________________________________________-->
    <div id="register-wrapper-up" class="wrapper-up hidden">
        <div id="register-div" class="register-div hidden">
            <div class="register-div-center">
<!--                 <button class="star_fill"></button> -->
                <button id="wrapper-register-close" class="close"></button>


<?php


if(!empty($_POST['novads']))
{
    $novads = mysqli_real_escape_string($con, $_POST['novads']);
    $pilna_adrese=$novads;

        // $regquery_address = mysqli_query($con, "INSERT INTO lietotaja_adrese (Novads, Pilna_adrese) 
        //     VALUES('".$novads."', '".$pilna_adrese."');");
        // if($regquery_address)
        // {
        //     $_SESSION['Novads'] = $novads;
        //     $_SESSION['Pilna_adrese'] = $pilna_adrese;
        // }
        // else
        // {
        //     echo "<h1>Error</h1>";
        //     echo "<p>Sorry, your registration failed. Address.</p>";    
        // } 

}
else
{
    $novads = "";
    $pilna_adrese=$novads; 
    // $_SESSION['Novads'] = "";
    // $_SESSION['Pilna_adrese'] = "";
    ?>

    <form method="post"  name="address-form" id="address-form" >
        <fieldset>
            <label for="novads">Novads:</label>
            <input type="text" id="novads" class="register-input" 
            name="novads" placeholder="Novads" 
            value="<?php echo htmlspecialchars($novads); ?>">
        </fieldset>
        <fieldset>
            <label for="pilseta">Pilsēta:</label>
            <input type="text" id="pilseta" class="register-input" 
            name="pilseta" placeholder="Pilsēta">
        </fieldset>
        <fieldset>
            <label for="pagasts">Pagasts:</label>
            <input type="text" id="pagasts" class="register-input" 
            name="pagasts" placeholder="Pagasts">
        </fieldset>
        <fieldset>
            <label for="ek_nr">Ēkas nr./Nos, korpuss:</label>
            <input type="text" id="ek_nr" class="register-input" 
            name="ek_nr" placeholder="Ēkas nr./Nos, korpuss">
        </fieldset>
        <fieldset>
            <label for="novads">Telpu grupa (dzīvoklis):</label>
            <input type="text" id="dzivoklis" class="register-input" 
            name="dzivoklis" placeholder="Telpu grupa (dzīvoklis)">
        </fieldset>
        <button type="submit" name="reg-submit-address" id="reg-submit-address" 
        class="reg-submit-address">Saglabāt</button>
    </form>

    <?php
}
?>

<?php

?>




            </div>
        </div>
    </div>










































































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
    // $city = mysqli_real_escape_string($con, $_POST['city']);
    // $address = mysqli_real_escape_string($con, $_POST['address']);
     
    $checkemail = mysqli_query($con, "SELECT Epasts FROM lietotajs WHERE Epasts = '".$email_address."'");
      
    if(mysqli_num_rows($checkemail) == 1)
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
    }
    else
    {

        $registerquery = mysqli_query($con, "INSERT INTO lietotajs (Vards, Uzvards, Epasts, Parole) 
            VALUES('".$name."', '".$surname."', '".$email_address."', '".$password."');");
        if($registerquery)
        {
            $_SESSION['Epasts'] = $email_address;
            $_SESSION['LoggedIn']=1;
            $_SESSION['Vards'] = $name;
            $_SESSION['Uzvards'] = $surname;
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


    <section class="registracija">
        <div id="registracija_content">
            <form method="post" action="registracija.php" name="registerform" 
            id="registerform" class="content">
            <!-- <section class="content"> -->
                <p class="subject-title">Reģistrācija</p>
                <hr>
                <fieldset id="input_area" class="content_area">
                    <fieldset>
                        <label for="name">Vards:</label>
                        <input type="text" name="name" id="name" />
                    </fieldset>
                    <fieldset>
                        <label for="surname">Uzvards:</label>
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
                        <label for="address">Adrese</label>
                        <div class="address-div">
                            <input type="text" name="address" id="address" 
                            value="<?php echo htmlspecialchars($novads); ?>" readonly />

                            <div id="address-edit">Hi</div>
                            <?php
                                if($novads!=""){
                                    // echo "<script type='text/javascript'>alert('$novads');</script>";
                            ?>
                            <style type="text/css">#address_form_btn{
                                display:none;
                            }</style>
                            <?php
                                }else{
                            ?>
                            <style type="text/css">#address_form_btn{
                                display:block;
                            }</style> 
                            <?php
                            }
                            ?>
                            <div id="address_form_btn" class="address_form_btn">
                                <p class="a_f_b_title">Aizpildi adreses laukus</p>

                            </div>
                        </div>
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
                        <button type="submit" name="registreties_submit" id="registreties_submit"  
                        class="submit_button"></button>
                    </fieldset>
                </fieldset>
            <!-- </section> -->
            </form>
        </div>
    </section>
    <?php
}
// $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo "<script type='text/javascript'>alert('$actual_link');</script>";
?>

        </section>


    <div id="footer_include"></div>
    <script> 
    $(function(){
      $("#footer_include").load("footer.html"); 
    });
    </script>
    </section>





</body>


<!-- <script type="text/javascript" src="scripts/backspace_disable.js"></script> -->


</html>

