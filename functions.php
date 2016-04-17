<?php  

function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		return true;
	}else{
		return false;
	}
}

if(loggedin()){
	$my_id = $_SESSION['user_id'];
	$user_query = mysqli_query($con, "SELECT Lietotaja_limenis FROM lietotajs WHERE id='$my_id'");
	$run_user = mysqli_fetch_array($user_query);
	$user_level = $run_user['Lietotaja_limenis'];
}

?>