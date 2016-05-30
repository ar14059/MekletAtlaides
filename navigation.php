<!--1 Navigācijas josla galvenajām sistēmas lapām AUTORIZĒTAM LIETOTĀJAM ar 
grupu "Pircējs" un "Publicētājs"-->

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
                <a href="user_info.php"><p id="msb_profile" class="msb_p">Profils</p></a>
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
     
    $checklogin = mysqli_query($con ,"SELECT * FROM lietotajs 
    WHERE Epasts = '".$email_address."' AND Parole = '".$password."'");
     
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
        require "navigation_guest.php";
    }
}
else
{
    require "navigation_guest.php";
}
?>

<!--1-->