<!--1 Lapā "index.php", tiek pārbaudīts,kādas grupas lietotāju grib piereģistrēt viesis 
	(Kā Pircējs vai Publicētājs)-->

<?php include "base.php"; ?>
<?php
	$u_level = $_GET['u_level'];

	$_SESSION['Lietotaja_limenis']=$u_level;
	header("location: registracija.php");
?>
<!--1-->