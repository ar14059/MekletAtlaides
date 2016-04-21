<?php
if(isset($_POST['name']) && !empty($_POST['surname'])){
	require '../base.php';
	$reg_nr = mysqli_real_escape_string($con, trim($_POST['name']));
	$uzn_parole = md5(mysqli_real_escape_string($con, trim($_POST['surname'])));
	$uznemumsquery = mysqli_query($con ,"SELECT * FROM uznemums 
		WHERE Reģ_nr = '".$reg_nr."' AND Uzņ_parole = '".$uzn_parole."'");
	if(mysqli_num_rows($uznemumsquery) == 1){
		$query_row = mysqli_fetch_array($uznemumsquery);
		$uzn_id = $query_row['ID'];
		$nosaukums = $query_row['Nosaukums'];
		$checkowner = mysqli_query($con ,"SELECT * FROM uznemums_lietotajs 
			WHERE Lietotaja_ID = '".$_SESSION['ID']."' AND Uzn_ID = '".$uzn_id."'");
		if(mysqli_num_rows($checkowner) == 1){
			echo "Jūs jau esat reģistrēti pie šī uzņēmuma!";
	    }else{
	        $registerowner = mysqli_query($con, "INSERT INTO uznemums_lietotajs (Lietotaja_ID, Uzn_ID) 
	            VALUES('".$_SESSION['ID']."', '".$uzn_id."');");
	        echo $nosaukums;
	    	
	    }


	}else{
		echo "Name not found!";
	}
}
?>	