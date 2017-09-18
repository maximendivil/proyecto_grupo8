<?php
	if (isset($_POST["submit"])){
		if ((isset($_POST["dni"]))&(isset($_POST["year"]))){
			$dni = $_POST["dni"];
			$year = $_POST["year"];
			$data = file_get_contents("Slim/$dni/$year");
			$products = json_decode($data, true);

			foreach ($products as $product) {
			    print_r($product);
			}
		}		
	}
?>