<?php
session_start();
 
$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "mekletatlaides_example"; // the name of the database that you are going to use for this project
$dbuser = "root"; // the username that you created, or were given, to access your database
$dbpass = ""; // the password that you created, or were given, to access your database
 
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("MySQL Error: " . mysql_error());
mysqli_set_charset($con, 'utf8');

// $browser = get_browser(null, true);
// echo $browser['browser'];
// mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>

<?php $curr_location = $_SERVER['SCRIPT_NAME']; ?>

<?php
function get_browsername() {
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE){
		$browser = 'Microsoft Internet Explorer';
	}elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) {
		$browser = 'Chrome';
	}elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
		$browser = 'Firefox';
	}elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE) {
		$browser = 'Opera';
	}elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE) {
		$browser = 'Safari';
	}else {
		$browser = 'error';
	}
	return $browser;
}
$browser = get_browsername();
?>



