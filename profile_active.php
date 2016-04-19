<?php include 'base.php'; ?>
<?php include 'functions.php'; ?>

<?php
	if($_GET['activation'] == 'user'){
		$u_id = $_GET['u_id'];
		$type = $_GET['type'];		
	}else if($_GET['activation'] == 'company'){
		$c_id = $_GET['c_id'];
		$pieslegts = $_GET['pieslegts'];			
	}
	


	if(!empty($u_id)){
		if($type == 1){
			mysqli_query($con, "UPDATE lietotajs SET Aktivs='0' WHERE id='$u_id'");
			header("location: a_user_list.php");
		}else if($type == 0){
			mysqli_query($con, "UPDATE lietotajs SET Aktivs='1' WHERE id='$u_id'");
			header("location: a_user_list.php");
		}

	}
	else if(!empty($c_id)){
		if($pieslegts == 1){
			mysqli_query($con, "UPDATE uznemums SET Pieslegts='0' WHERE id='$c_id'");
			header("location: a_company_list.php");
		}else if ($pieslegts == 0){
			mysqli_query($con, "UPDATE uznemums SET Pieslegts='1' WHERE id='$c_id'");
			header("location: a_company_list.php");
		}
	}
?>