<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';

	if(!empty($_GET['reg_nr']) && !empty($_GET['uzn_parole'])){
		$reg_nr = $_GET['reg_nr'];
		$uzn_parole = $_GET['uzn_parole'];
	}
	else{
		echo "Nav ievadīts/i vajadzīgie lauki!";
	}
	$reg_nrArray = array('tuna', 'bacon', 'beef', 'loaf', 'ham');
	$uzn_paroleArray = array('water', 'fanta', 'sprite', 'cocacola', 'juice');
	if(in_array($reg_nr, $reg_nrArray) && in_array($uzn_parole, $uzn_paroleArray))
		echo 'We do have '.$reg_nr.' and '.$uzn_parole.'!';
	elseif($reg_nr=='' || $uzn_parole=='')
		echo 'Enter a food, dumass!';
	else
		echo 'Sorry punk we dont sell no '.$reg_nr.' or/and '.$uzn_parole.'!';
echo '</response>';
?>








