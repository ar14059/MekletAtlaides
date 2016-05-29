<?php include "base.php"; ?>
<?php
	$u_level = $_GET['u_level'];

	$_SESSION['Lietotaja_limenis']=$u_level;
	header("location: registracija.php");
?>