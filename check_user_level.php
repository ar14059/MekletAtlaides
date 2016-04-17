<?php include "base.php"; ?>


<?php
	$u_level = $_GET['u_level'];
	// echo $u_level;
	$_SESSION['Lietotaja_limenis']=$u_level;
	header("location: registracija.php");

	// if($type == 'a'){
	// 	mysqli_query($con, "UPDATE users SET type='d' WHERE id='$u_id'");
	// 	header("location: admin.php?type=user");
	// }else{
	// 	mysqli_query($con, "UPDATE users SET type='a' WHERE id='$u_id'");
	// 	header("location: admin.php?type=user");
	// }
?>