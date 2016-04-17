<?php include "base.php"; ?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/a_home.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/jquery.js"></script>



    <title>Webpage</title>
</head>


<body>


<!-- Papildus reģistrācijas forma, kurā jāievada adreses dati  -->
<!--___________________________________________________________-->

<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Epasts']))
{
    header("location: a_home.php");
    // echo "You are logged in!";
}else if(!empty($_POST['email']) && !empty($_POST['password'])){
    // echo "Preparing to log in";
    $email_address = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
     
    $checklogin = mysqli_query($con ,"SELECT * FROM lietotajs 
        WHERE Epasts = '".$email_address."' AND Parole = '".$password."'");
     
    if(mysqli_num_rows($checklogin) == 1)
    {

        $row = mysqli_fetch_array($checklogin);
        // $email = $row['EmailAddress'];
        $u_level = $row['Lietotaja_limenis'];
        if($u_level>=2){
            $name = $row['Vards'];
            $surname = $row['Uzvards'];
            $_SESSION['Epasts'] = $email_address;
            $_SESSION['Vards'] = $name;
            $_SESSION['Uzvards'] = $surname;
            $_SESSION['Lietotaja_limenis'] = $u_level;
            $_SESSION['LoggedIn'] = 1; 
            // header("Refresh:0");
            header("location: a_home.php"); 
            
        }else{

            echo "<p>You can't access admin panel</p>";
        }   
    }
    else
    {
        echo "<p>Can't find user with that username and/or password</p>";
    }
}
?>
    <div id="register-wrapper-up" class="wrapper-up">
        <div id="register-wrapper-div" class="register-div">
            <div class="register-div-center">
                <form method="post" action="a_login.php" name="address-form" id="address-form" class="address-form">
                    <fieldset>
                        <label for="novads">Epasts:</label>
                        <input type="text" id="email" class="register-input" 
                        name="email" placeholder="E - pasts">
                    </fieldset>
                    <fieldset>
                        <label for="pilseta">Parole:</label>
                        <input type="password" id="password" class="register-input" 
                        name="password" placeholder="Parole">
                    </fieldset>
                    <button type="submit" name="a-submit-login" id="a-submit-login" 
                    class="a_buttons">Ielogoties</button>
                </form>


            </div>
        </div>
    </div>

</body>

</html>
