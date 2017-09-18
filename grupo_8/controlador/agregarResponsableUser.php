<?php
	session_start();

	$user = $_GET["user"];
	
	require("../vista/agregar_responsable.html");
?>