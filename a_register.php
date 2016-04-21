<?php require "a_header.php"; ?>




<?php
if(!empty($_POST['email']) && !empty($_POST['password'])){
    // echo "Preparing to log in";
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
            echo "<p style='color:red'>Lietotājs veiksmīgi saglabāts!</p>"; 
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
            <div class="register-div-center">
                <h3><?php echo $greeting_text; ?></h3>
                <form method="post" action="a_register.php" name="admin-form" id="admin-form" class="address-form">
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
                        <label for="email">Epasts:</label>
                        <input type="text" id="email" class="register-input" 
                        name="email" placeholder="E - pasts">
                    </fieldset>
                    <fieldset>
                        <label for="password">Parole:</label>
                        <input type="password" id="password" class="register-input" 
                        name="password" placeholder="Parole">
                    </fieldset>
                    <button type="submit" name="a-submit-register" id="a-submit-register" 
                    class="a_buttons">Reģistrēt</button>
                </form>
                <a href="a_home.php"><button class="a_back">Atpakaļ</button></a>

            </div>
        </div>


</body>


<?php require "a_footer.php"; ?>

