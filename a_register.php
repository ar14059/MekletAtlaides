<?php require "a_header.php"; ?>



<!--1 Kods, kas dod iespēju Administratoram reģistrēt jaunu lietotāju - Vadītāju-->
<?php
if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) 
&& !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password'])){
    $email_address = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
    $checregister = mysqli_query($con ,"SELECT Epasts, Parole FROM lietotajs 
        WHERE Epasts = '".$email_address."' AND Parole = '".$password."'");
     
    if(mysqli_num_rows($checregister) == 1)
    {
        echo "<p>Tāds lietotājs jau eksistē</p>";
    }
    else{
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $surname = mysqli_real_escape_string($con, $_POST['surname']);
        $u_level = 2;
        $registeruser = mysqli_query($con, 
            "INSERT INTO lietotajs (Vards, Uzvards, Epasts, Parole, Lietotaja_limenis) 
            VALUES('".$name."', '".$surname."', '".$email_address."', '".$password."', '".$u_level."');");
        if($registeruser)
        {
            header("location: a_user_list.php"); 
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please try again.</p>";    
        } 
    }
}else{
    echo "AIZPILDIET LAUKUS";
}
?>

<!--1-->
<!--2 Reģistrācijas forma-->
<div id="register-wrapper-div" class="register-div">
    <div id="comp_user_reg" class="register-div-center">
        <h3><?php echo $greeting_text; ?></h3>
        <form method="post" action="a_register.php" name="userreg-form" id="userreg-form" class="address-form">
            <fieldset>
                <label for="name">Vārds:</label>
                <input type="text" id="name" class="register-input" 
                name="name" placeholder="Vārds">
                <p id="vards_e" class="err_m_register hidden"></p>
            </fieldset>
            <fieldset>
                <label for="surname">Uzvārds:</label>
                <input type="text" id="surname" class="register-input" 
                name="surname" placeholder="Uzvārds">
                <p id="uzvards_e" class="err_m_register hidden"></p>
            </fieldset>
            <fieldset>
                <label for="email">E-pasts:</label>
                <input type="text" id="email" class="register-input" 
                name="email" placeholder="E - pasts">
                <p id="epasts_e" class="err_m_register hidden"></p>
            </fieldset>
                <fieldset>
                    <label for="email_repeat">Atkārtot e-pastu:</label>
                    <input type="text" id="email_repeat" class="register-input" 
                    name="email_repeat" placeholder="Atkārtot e-pastu">
                    <p id="epasts_atk_e" class="err_m_register hidden"></p>
                </fieldset>
            <fieldset>
                <label for="password">Parole:</label>
                <input type="password" id="password" class="register-input" 
                name="password" placeholder="Parole">
                <p id="parole_e" class="err_m_register hidden"></p>
            </fieldset>
                <fieldset>
                    <label for="password_repeat">Atkārtot paroli:</label>
                    <input type="password" id="password_repeat" class="register-input" 
                    name="password_repeat" placeholder="Atkārtot paroli">
                    <p id="parole_atk_e" class="err_m_register hidden"></p>
                </fieldset>

            <button type="submit" name="a-submit-register" id="a-submit-register" 
            class="a_buttons">Reģistrēt vadītāju</button>
        </form>
        <a href="a_home.php"><button class="a_back">Atpakaļ</button></a>

    </div>
</div>
<!--2-->

</body>


<?php require "a_footer.php"; ?>

