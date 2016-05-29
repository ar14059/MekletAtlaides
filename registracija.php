<?php include "base.php"; ?>

<html>
<head>
    


    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/registracija.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <title>Webpage</title>
</head>
<body>




    <section class="body-welcome">
        <header class="main-nav">
            <div class="header-right">
                <button id="nav-right-button-back" class="button_nav" onclick="goBack()"></button>
                <!-- <button id="nav-right-button-back" class="button_nav"></button> -->
            </div>
        </header>
        <section id="body-content">


<?php


if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['surname']) 
    && !empty($_POST['email_repeat']) && !empty($_POST['password_repeat']))
{
    $email_address = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    if($_SESSION['Lietotaja_limenis']==1){
        $uzn_reg_nr = mysqli_real_escape_string($con, $_POST['reg_nr']);
        $uzn_password = md5(mysqli_real_escape_string($con, $_POST['ent_password']));
    }else if($_SESSION['Lietotaja_limenis']==0){
        $pasta_indekss = mysqli_real_escape_string($con, $_POST['pasta_indekss_hide']);
        $novads = mysqli_real_escape_string($con, $_POST['novads_hide']);
        $pilseta = mysqli_real_escape_string($con, $_POST['pilseta_hide']);
        $pagasts = mysqli_real_escape_string($con, $_POST['pagasts_hide']);
        $ciems = mysqli_real_escape_string($con, $_POST['ciems_hide']);
        $iela = mysqli_real_escape_string($con, $_POST['iela_hide']);
        $ek_nr = mysqli_real_escape_string($con, $_POST['ek_nr_hide']);
        $dzivoklis = mysqli_real_escape_string($con, $_POST['dzivoklis_hide']);
        $pilna_adrese = mysqli_real_escape_string($con, $_POST['address']);
    }
     
    $checkemail = mysqli_query($con, "SELECT Epasts FROM lietotajs WHERE Epasts = '".$email_address."'");
      
    if(mysqli_num_rows($checkemail) == 1)
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
    }
    else
    {
        if($_SESSION['Lietotaja_limenis']==0){
            $registeraddress = mysqli_query($con, 
                "INSERT INTO lietotaja_adrese (Pasta_indekss, Novads, Pilsēta, Pagasts, Ciems, Iela, Ēkas_nr, Dzīvokļa_nr, Pilna_adrese, Īpašnieks) 
                VALUES('".$pasta_indekss."', '".$novads."', '".$pilseta."', '".$pagasts."', '".$ciems."', '".$iela."', '".$ek_nr."', '".$dzivoklis."', '".$pilna_adrese."', 'lietotājs');"); 
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
            }
            else
            {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
            }   
        }else if($_SESSION['Lietotaja_limenis']==1){  
            $registercompany = mysqli_query($con ,"SELECT * FROM uznemums 
                WHERE Reģ_nr = '".$uzn_reg_nr."' AND Uzņ_parole = '".$uzn_password."'");

            if(mysqli_num_rows($registercompany) == 1){
                $company_row = mysqli_fetch_array($registercompany);
                $c_id = $company_row['ID'];
                $registerquery = mysqli_query($con, "INSERT INTO lietotajs (Vards, Uzvards, Epasts, Parole, Lietotaja_limenis) 
                    VALUES('".$name."', '".$surname."', '".$email_address."', '".$password."', '1');");
                if($registerquery)
                {
                    $last_id = mysqli_insert_id($con);
                    $registerworker = mysqli_query($con, "INSERT INTO uznemums_lietotajs (Lietotaja_ID, Uzn_ID) 
                        VALUES('".$last_id."', '".$c_id."');");
                    $_SESSION['Epasts'] = $email_address;
                    $_SESSION['LoggedIn']=1;
                    $_SESSION['Vards'] = $name;
                    $_SESSION['Uzvards'] = $surname;
                }
                else
                {
                    echo "<h1>Error</h1>";
                    echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
                }    
            }else{
            }        
        }
    }
}

else
{
    ?>

    <?php require "address_form.php"; ?>


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
                        <p id="vards_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="surname">Uzvards:</label>
                        <input type="text" name="surname" id="surname" />
                        <p id="uzvards_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="email">E-pasts:</label>
                        <input type="text" name="email" id="email" />
                        <p id="epasts_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="email_repeat">Atkārtot E-pastu:</label>
                        <input type="text" name="email_repeat" id="email_repeat" />
                        <p id="epasts_atk_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <?php if($_SESSION['Lietotaja_limenis']==0){  ?>
                    <fieldset>
                        <label for="address">Adrese</label>
                        <div class="address-div">
                            <input type="text" name="address" id="address" 
                            value="" readonly />
                            <div id="address-edit">Mainīt</div>
                            <div id="address_form_btn" class="address_form_btn">
                                <p class="a_f_b_title">Aizpildi adreses laukus</p>
                            </div>
                        </div>
                        <p id="adrese_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <?php } ?> 
                    <fieldset>
                        <label for="password">Parole:</label>
                        <input type="password" name="password" id="password" />
                        <p id="parole_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="password_repeat">Atkārtot Paroli:</label>
                        <input type="password" name="password_repeat" id="password_repeat" />
                        <p id="parole_atk_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <?php if($_SESSION['Lietotaja_limenis']==1){ ?>
                    <hr class="form-hr">
                    <fieldset>
                        <label for="reg_nr">Uzņ.reģ.nr.:</label>
                        <input type="text" name="reg_nr" id="reg_nr" />
                        <p id="uzn_reg_nr_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <fieldset>
                        <label for="password">Uzņēmuma parole:</label>
                        <input type="password" name="ent_password" id="ent_password" />
                        <p id="uzn_parole_e" class="err_m_register hidden"></p>
                    </fieldset>
                    <p id="uzn_e" class="err_m_register"></p>
                    <?php } ?>


                    <fieldset class="hidden">
                        <input type="text" name="pasta_indekss_hide" id="pasta_indekss_hide">
                        <input type="text" name="novads_hide" id="novads_hide" />
                        <input type="text" name="pilseta_hide" id="pilseta_hide">
                        <input type="text" name="pagasts_hide" id="pagasts_hide">
                        <input type="text" name="ciems_hide" id="ciems_hide">
                        <input type="text" name="iela_hide" id="iela_hide">
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
            </form>

        </div>
    </section>
    <?php
}

?>

        </section>


    </section>





</body>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/javascript.js"></script>


</html>

