<!--1 Glabājas stilu lapas, meta, viewpoint dati, -->
<?php include "base.php"; ?> 
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/a_home.css">
    <link rel="stylesheet" type="text/css" href="css/alertboxes.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <title>Webpage</title>
</head>
<!--1-->
<body>
<!--2 Funkcija, kas kas nosaka lietotāja grupu, kas ir iegājis konkrētajā tīmekļa lapā. 
    Lietotājam neļauj tikt pie lapām, pie kurām viņam nav tiesību piekļūt-->
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Epasts']))
{ 
    $s_first_part = "/MekletAtlaides/";
    $url = $_SERVER['SCRIPT_NAME'];
    if($url==$s_first_part."a_company_list.php"){
        $_SESSION['activation']='company';
    }else if($url==$s_first_part."a_user_list.php"){
        $_SESSION['activation']='user';
    }
    if(!empty($_SESSION['activation'])){
        $activation=$_SESSION['activation'];
    }
    $u_level = $_SESSION['Lietotaja_limenis'];
    if($u_level>=2){
        $greeting_text = 'Welcome, '.$_SESSION['Vards'].' '.$_SESSION['Uzvards']; 
    }
    else
    {
        header("location: index.php"); 
    }
}else{
    header("location: a_login.php"); 
}
?>
<!--2-->

