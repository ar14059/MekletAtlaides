<?php include "base.php"; ?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="css/a_home.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Webpage</title>
</head>


<body>

<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Epasts']))
{ 
    $s_first_part = "/MekletAtlaides/";
    $url = $_SERVER['SCRIPT_NAME'];
    if($url==$s_first_part."a_company_list.php"){
        // echo "<script type='text/javascript'>alert('$url');</script>";
        $_SESSION['activation']='company';
    }else if($url==$s_first_part."a_user_list.php"){
        // echo "<script type='text/javascript'>alert('$url');</script>";
        $_SESSION['activation']='user';
    }
    
    $activation=$_SESSION['activation'];
    $u_level = $_SESSION['Lietotaja_limenis'];
    if($u_level>=2){
        $greeting_text = 'Welcome, '.$_SESSION['Vards'].' '.$_SESSION['Uzvards'].' '.$_SESSION['Lietotaja_limenis']; 
    }
    else
    {
        header("location: home.php"); 
    }
}else{
    header("location: a_login.php"); 
}
?>


