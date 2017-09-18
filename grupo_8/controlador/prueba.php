<?php
	function array_recibe($url_array) { 
	    $tmp = stripslashes($url_array); 
	    $tmp = urldecode($tmp); 
	    $tmp = unserialize($tmp); 
	   return $tmp; 
	} 
	$array=$_POST['alumnos'];
	echo $array;
	//echo $_POST["alumnos"];
?>