
<?php include "base.php"; ?>



    <script src="scripts/jquery.js"></script>

    <?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['EmailAddress']))
{
    ?>

        <div class="name_surname_div">
            <p id="name_surname" class="login_user_data">Lietotājs 
                <code><?=$_SESSION['Name'];?></code> 
                <code><?=$_SESSION['Surname'];?></code>.
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
}
elseif(!empty($_POST['email']) && !empty($_POST['password']))
{
    $email_address = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
     
    $checklogin = mysqli_query($con ,"SELECT * FROM users WHERE EmailAddress = '".$email_address."' AND Password = '".$password."'");
     
    if(mysqli_num_rows($checklogin) == 1)
    {
        $row = mysqli_fetch_array($checklogin);
        // $email = $row['EmailAddress'];
        $name = $row['Name'];
        $surname = $row['Surname'];
         
        $_SESSION['EmailAddress'] = $email_address;
        $_SESSION['Name'] = $name;
        $_SESSION['Surname'] = $surname;
        $_SESSION['LoggedIn'] = 1;
         
        header("Refresh:0");
    }
    else
    {
    	echo "<script type='text/javascript'>alert('Worked but not how expected);</script>";
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"home.php\">click here to try again</a>.</p>";
    }
}
else
{
    ?>

    <button id="hidden_button_login" class="button_nav"></button>
    <div id="loginContainer">
        <button id="nav-right-button-login" class="button_nav"></button>
        <div id="loginBox">   
            <form method="post" action="home.php" name="loginForm" id="loginForm">
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
    <a href="registracija.php"><button id="nav-right-button-register" class="button_nav"></button></a>
     
   <?php
}
?>
 

