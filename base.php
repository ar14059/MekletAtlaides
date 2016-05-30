<!--1 Glabājas datubāzes dati -->
<?php
session_start(); 


$dbhost = "localhost";
$dbname = "mekletatlaides_example"; 
$dbuser = "root"; 
$dbpass = ""; 
 
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("MySQL Error: " . mysql_error());
mysqli_set_charset($con, 'utf8');
?>

<!--1-->

<?php $curr_location = $_SERVER['SCRIPT_NAME']; ?>

<!--2 Glabājas informācija par interneta pārlūkprogrammu, kurā lietotājs pašlaik lieto-->
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
<!--2-->


