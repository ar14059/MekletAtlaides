<?php require "a_header.php"; ?>




<?php
if(isset($_POST['email']) && isset($_POST['password']) 
&& !empty($_POST['email']) && !empty($_POST['password'])){
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

        <div id="register-wrapper-div" class="register-div">
            <div id="comp_user_reg" class="register-div-center">
                <h3><?php echo $greeting_text; ?></h3>
                <form method="post" action="a_register.php" name="userreg-form" id="userreg-form" class="address-form">
                    <fieldset>
                        <label for="name">Vārds:</label>
                        <input type="text" id="name" class="register-input" 
                        name="name" placeholder="Vārds">
                    </fieldset>
                    <fieldset>
                        <label for="surname">Uzvārds:</label>
                        <input type="text" id="surname" class="register-input" 
                        name="surname" placeholder="Uzvārds">
                    </fieldset>
                    <fieldset>
                        <label for="email">E-pasts:</label>
                        <input type="text" id="email" class="register-input" 
                        name="email" placeholder="E - pasts">
                    </fieldset>
<!--                     <fieldset>
                        <label for="email">Atkārtot e-pastu:</label>
                        <input type="text" id="email" class="register-input" 
                        name="email" placeholder="Atkārtot e-pastu">
                    </fieldset> -->
                    <fieldset>
                        <label for="password">Parole:</label>
                        <input type="password" id="password" class="register-input" 
                        name="password" placeholder="Parole">
                    </fieldset>
<!--                     <fieldset>
                        <label for="password">Atkārtot paroli:</label>
                        <input type="password" id="password" class="register-input" 
                        name="password" placeholder="Atkārtot paroli">
                    </fieldset> -->
                    <button type="submit" name="a-submit-register" id="a-submit-register" 
                    class="a_buttons">Reģistrēt vadītāju</button>
                </form>
                <button class="a_back" onclick="goBack()">Atpakaļ</button>

            </div>
        </div>


</body>


<?php require "a_footer.php"; ?>

