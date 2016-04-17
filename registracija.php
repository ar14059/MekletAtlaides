<?php include "base.php"; ?>
<?php include 'functions.php'; ?>
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

<p><?php 
// echo $_SESSION['u_level']; 
?></p>


<!-- Papildus reģistrācijas forma, kurā jāievada adreses dati  -->
<!--___________________________________________________________-->
    <div id="register-wrapper-up" class="wrapper-up hidden">
        <div id="register-wrapper-div" class="register-div hidden">
            <div class="register-div-center">
<!--                 <button class="star_fill"></button> -->
                <button id="wrapper-register-close" class="close"></button>
                <form name="address-form" id="address-form" >
                    <fieldset>
                        <label for="novads">Novads:</label>
                        <input type="text" id="novads" class="register-input" 
                        name="novads" placeholder="Novads" 
                        value="">
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
                        <label for="dzivoklis">Telpu grupa (dzīvoklis):</label>
                        <input type="text" id="dzivoklis" class="register-input" 
                        name="dzivoklis" placeholder="Telpu grupa (dzīvoklis)">
                    </fieldset>
                </form>
                <button name="reg-submit-address" id="reg-submit-address" 
                class="reg-submit-address">Saglabāt</button>
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
    if($_SESSION['Lietotaja_limenis']==1){
        $uzn_reg_nr = mysqli_real_escape_string($con, $_POST['reg_nr']);
        $uzn_password = md5(mysqli_real_escape_string($con, $_POST['ent_password']));
    }else if($_SESSION['Lietotaja_limenis']==0){
    $novads = mysqli_real_escape_string($con, $_POST['novads_hide']);
    $pilseta = mysqli_real_escape_string($con, $_POST['pilseta_hide']);
    $pagasts = mysqli_real_escape_string($con, $_POST['pagasts_hide']);
    $ek_nr = mysqli_real_escape_string($con, $_POST['ek_nr_hide']);
    $dzivoklis = mysqli_real_escape_string($con, $_POST['dzivoklis_hide']);
    }

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
        $registeraddress = mysqli_query($con, 
            "INSERT INTO lietotaja_adrese (Novads, Pilsēta, Pagasts, Ēkas_nr, Dzīvokļa_nr) 
            VALUES('".$novads."', '".$pilseta."', '".$pagasts."', '".$ek_nr."', '".$dzivoklis."');"); 
        // if (mysqli_query($con, $registeraddress)) {
        if ($registeraddress) {
            $last_id = mysqli_insert_id($con);
        } else {
            echo "Error: " . $registeraddress . "<br>" . mysqli_error($con);
        }

        $registerquery = mysqli_query($con, "INSERT INTO lietotajs (Vards, Uzvards, Epasts, Parole, Adreses_ID) 
            VALUES('".$name."', '".$surname."', '".$email_address."', '".$password."', '".$last_id."');");
        if($registerquery)
        {
            $_SESSION['Epasts'] = $email_address;
            $_SESSION['LoggedIn']=1;
            $_SESSION['Vards'] = $name;
            $_SESSION['Uzvards'] = $surname;
            // $_SESSION['Lietotaja_limenis'] = $_SESSION['u_level'];
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
    // if($_SESSION['u_level']==0){
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
                        <input type="text" name="name" id="name" value=""/>
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
                    <?php if($_SESSION['Lietotaja_limenis']==0){  ?>
                    <fieldset>
                        <label for="address">Adrese</label>
                        <div class="address-div">
                            <input type="text" name="address" id="address" 
                            value="" readonly />
                            <div id="address-edit">Hi</div>
                            <div id="address_form_btn" class="address_form_btn">
                                <p class="a_f_b_title">Aizpildi adreses laukus</p>
                            </div>
                        </div>
                    </fieldset>
                    <?php } ?> 
                    <fieldset>
                        <label for="password">Parole:</label>
                        <input type="password" name="password" id="password" />
                    </fieldset>
                    <fieldset>
                        <label for="password_repeat">Atkārtot Paroli:</label>
                        <input type="password" name="password_repeat" id="password_repeat" />
                    </fieldset>
                    <?php if($_SESSION['Lietotaja_limenis']==1){ ?>
                    <hr class="form-hr">
                    <fieldset>
                        <label for="email">Uzņemuma reģ.nr.:</label>
                        <input type="text" name="reg_nr" id="reg_nr" />
                    </fieldset>
                    <fieldset>
                        <label for="password">Uzņēmuma parole:</label>
                        <input type="password" name="ent_password" id="ent_password" />
                    </fieldset>
                    <?php } ?>

                    <fieldset class="hidden">
                        <input type="text" name="novads_hide" id="novads_hide" />
                        <input type="text" name="pilseta_hide" id="pilseta_hide">
                        <input type="text" name="pagasts_hide" id="pagasts_hide">
                        <input type="text" name="ek_nr_hide" id="ek_nr_hide">
                        <input type="text" name="dzivoklis_hide" id="dzivoklis_hide">
                    </fieldset>


                </fieldset>
                <fieldset id="submit_area" class="content_area">
                    <fieldset>
                        <div><p class="vertical_align"><input type="checkbox" class="checkbox_css" ><span>Piekrītu lietošanas noteikumiem</span></p></div>
                        <button name="registreties_submit" id="registreties_submit"  
                        class="submit_button" onclick="submitForms()"></button>
                    </fieldset>
                </fieldset>
            <!-- </section> -->
            </form>
<!--                 <fieldset id="submit_area" class="content_area">
                    <fieldset>
                        <div><p class="vertical_align"><input type="checkbox" class="checkbox_css" ><span>Piekrītu lietošanas noteikumiem</span></p></div>
                        <button name="registreties_submit" id="registreties_submit"  
                        class="submit_button" onclick="submitForms()"></button>
                    </fieldset>
                </fieldset> -->
        </div>
    </section>
    <?php
    // }else{
    //     echo "Errrrrrrrrrrrrrrrrrrrrrrrrrrrrrror";
    // }
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

