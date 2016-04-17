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



	<table>
		<tr><th width="150px">Lietotāji</th><th>Statuss</th></tr>
<?php
	$list_query = mysqli_query($con, "SELECT ID, Vards, Uzvards, Lietotaja_limenis, Aktivs FROM lietotajs
		WHERE Lietotaja_limenis<>'3'");
	while($run_list = mysqli_fetch_array($list_query)){
		$u_id = $run_list['ID'];
		$name = $run_list['Vards'];
		$surname = $run_list['Uzvards'];
		$u_level = $run_list['Lietotaja_limenis'];
		$active = $run_list['Aktivs'];
?>
<tr><td><?php echo $name; ?></td><td>
<?php
	if($active == 1){
		echo "<a href='profile_active.php?u_id=$u_id&type=$active'>Deactivate</a>";
	}else{
		echo "<a href='profile_active.php?u_id=$u_id&type=$active'>Activate</a>";
	}
?>
</td></tr>
<?php
	}
?>
	</table>
    <a href="a_home.php"><button class="a_buttons">Atpakaļ</button></a>





        </div>
    </div>
</div>










</body>

</html>








