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
    $u_level = $_SESSION['Lietotaja_limenis'];
    if($u_level>=2){
    ?>
        <h3>Welcome, <?php echo $_SESSION['Vards'];?> 
            <?php echo $_SESSION['Uzvards'];?> 
            <?php echo $_SESSION['Lietotaja_limenis'];?></h3>
    <?php      
    }
    else
    {
        header("location: home.php"); 
    }
}else{

    header("location: a_login.php"); 
}
?>
    

    <div id="register-wrapper-up" class="wrapper-up">
        <div id="register-wrapper-div" class="register-div">
            <div class="register-div-center">
                <a href="a_user_list.php"><button name="users_table" id="users_table" 
                class="a_buttons">Lietotāju saraksts</button></a>

                <a href=""><button name="create_concern" id="create_concern" 
                class="a_buttons">Uzņēmumu saraksts</button></a>

                <?php if($u_level==3){ ?>

                <a href="a_register.php"><button name="create_concern" id="create_concern" 
                class="a_buttons">Reģistrēt uzņ vadītāju</button></a>

                <?php 
                } else{
                ?>

                <a href="a_company_r.php"><button name="create_company" id="create_company" 
                class="a_buttons">Reģistrēt uzņēmumu</button></a>

                <?php
                }
                ?>
                <a href="a_logout.php"><button name="create_concern" id="create_concern" 
                class="a_buttons">Log Out</button></a>            
            </div>
        </div>
    </div>
</body>

</html>
