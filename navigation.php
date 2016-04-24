
    <?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Epasts']))
{
    if($_SESSION['Lietotaja_limenis']<2){
    ?>

        <div class="name_surname_div">
            <p id="name_surname" class="login_user_data">Lietotājs 
                <code><?=$_SESSION['Vards'];?></code> 
                <code><?=$_SESSION['Uzvards'];?></code>.
            </p>
        </div>
        <div id="main-settings-container">
            <button id="main-settings-btn"></button>
            <div id="main-settings-box">
                <p id="msb_profile" class="msb_p">Profils</p>
                <a href="logout.php"><p id="msb_sign-out" class="msb_p">Iziet</p></a>
            </div>
        </div>
      
    <?php
    }else{
        header("location: a_home.php"); 
    }
}
elseif(!empty($_POST['email']) && !empty($_POST['password']))
{
    $email_address = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
     
    $checklogin = mysqli_query($con ,"SELECT * FROM lietotajs WHERE Epasts = '".$email_address."' AND Parole = '".$password."'");
     
    if(mysqli_num_rows($checklogin) == 1)
    {
        $row = mysqli_fetch_array($checklogin);
        // $email = $row['EmailAddress'];
        $active = $row['Aktivs'];
        if($active==1){ 
            $id = $row['ID'];
            $_SESSION['ID'] = $id;
            $name = $row['Vards'];
            $surname = $row['Uzvards'];
            $user_level = $row['Lietotaja_limenis'];     
            $_SESSION['Epasts'] = $email_address;
            $_SESSION['Vards'] = $name;
            $_SESSION['Uzvards'] = $surname;
            $_SESSION['LoggedIn'] = 1;
            $_SESSION['Lietotaja_limenis'] = $user_level;  
        }else{
            // echo "<h1>Jūs nobloķēja administrators!</h1>";
        }
        header("Refresh:0");
    }
    else
    {
        // echo "<script type='text/javascript'>alert('Worked but not how expected);</script>";
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"home.php\">click here to try again</a>.</p>";
    }
}
else
{
    ?>
    <?php
        if($curr_location!="/MekletAtlaides/home.php"){
    ?>
    <a href="home.php"><button id="nav-right-button-back" class="button_nav"></button></a>
    <?php
        }
    ?>
    <button id="hidden_button_login" class="button_nav"></button>
    <div id="loginContainer">
        <button id="nav-right-button-login" class="button_nav"></button>
        <div id="loginBox">   
            <form method="post" action="<?php echo  $curr_location; ?>" name="loginForm" id="loginForm">
            <hr>  
                <fieldset id="body">
                    <fieldset>
                        <label for="email">E-pasts:</label>
                        <input type="text" name="email" id="email" />
                    </fieldset>
                    <fieldset>
                        <label for="password">Parole:</label>
                        <input type="password" name="password" id="password" />
                    </fieldset>
                    <button type="submit" name="login" id="login" value="Login"></button>
                </fieldset>
            </form>
        </div>            
    </div>
    <div id="registerContainer">
        <button id="nav-right-button-register" class="button_nav"></button>
        <div id="registerBox">   
            <form method="post" action="home.php" name="registerForm" id="registerForm">
                <?php
                echo "<a href='check_user_level.php?u_level=0' id='msb_pircejs' class='rsb_p'>Pircējs</a>";
                echo "<a href='check_user_level.php?u_level=1' id='msb_uznemums' class='rsb_p'>Uzņēmums</a>";
                ?>
        </div>            
    </div>
   <?php
}
?>