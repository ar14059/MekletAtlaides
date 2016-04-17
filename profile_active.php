<?php include 'base.php'; ?>
<?php include 'functions.php'; ?>

<?php
	$u_id = $_GET['u_id'];
	$type = $_GET['type'];

	if($type == 1){
		mysqli_query($con, "UPDATE lietotajs SET Aktivs='0' WHERE id='$u_id'");
		header("location: a_user_list.php");
	}else{
		mysqli_query($con, "UPDATE lietotajs SET Aktivs='1' WHERE id='$u_id'");
		header("location: a_user_list.php");
	}
?>