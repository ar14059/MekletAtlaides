<?php include "base.php"; ?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/a_home.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/alertboxes.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="scripts/jquery.js"></script>



    <title>Webpage</title>
</head>


<body>


<!-- Papildus reģistrācijas forma, kurā jāievada adreses dati  -->
<!--___________________________________________________________-->

<!--1 Kods, kas nodrošina lietotāju autorizēšanos sistēmā-->
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Epasts']))
{
    header("location: a_home.php");
}else if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email_address = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));  
    $checklogin = mysqli_query($con ,"SELECT * FROM lietotajs 
        WHERE Epasts = '".$email_address."' AND Parole = '".$password."'");
    if(mysqli_num_rows($checklogin) == 1)
    {
        $row = mysqli_fetch_array($checklogin);
        $u_level = $row['Lietotaja_limenis'];
        if($u_level>=2){
            $name = $row['Vards'];
            $surname = $row['Uzvards'];
            $id = $row['ID'];
            $_SESSION['ID'] = $id;
            $_SESSION['Epasts'] = $email_address;
            $_SESSION['Vards'] = $name;
            $_SESSION['Uzvards'] = $surname;
            $_SESSION['Lietotaja_limenis'] = $u_level;
            $_SESSION['LoggedIn'] = 1; 
            header("location: a_home.php");    
        }else{

            echo "<p>You can't access admin panel</p>";
        }   
    }
    else
    {

    }
}
?>

<!--1-->
<!--2 Autorizācijas forma -->
        <div id="register-wrapper-div" class="register-div">
            <div id="login-div-center" class="register-div-center">
            <fieldset id="f_alert" class="f_alert hidden">
                <div class="alert alert-danger">
                    <strong>Uzmanību!</strong>  Aizpildiet laukus!.
                </div>
            </fieldset>
                <form method="post" action="a_login.php" name="a-login-form" id="a-login-form" class="address-form">
                    <fieldset>
                        <label for="novads" class="login-label">Epasts:</label>
                        <input type="text" id="email" class="login-input" 
                        name="email" placeholder="E - pasts">
                    </fieldset>
                    <fieldset>
                        <label for="pilseta" class="login-label">Parole:</label>
                        <input type="password" id="password" class="login-input" 
                        name="password" placeholder="Parole">
                    </fieldset>

                        <a href="#" class="forgot_uname_pword">Aizmirsi lietotājvārdu/paroli?</a>
                        <a href="index.php" class="forgot_uname_pword">Pāriet uz galveno lapu</a>

                    <button type="submit" name="a-submit-login" id="a-submit-login" 
                    class="a_buttons">Ielogoties</button>
                </form>


            </div>
        </div>
<!--2-->

</body>

</html>
