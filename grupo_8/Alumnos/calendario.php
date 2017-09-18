<?php	

	if ((isset($_POST["dni"]))&(isset($_POST["year"]))){			
		$dni = $_POST["dni"];
		$year = $_POST["year"];
		$arrContextOptions=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
			);
		$url = 'https://grupo_8.proyecto2015.linti.unlp.edu.ar/Slim/index.php/cuotasPagas/'.$dni.'/'.$year.'index.php';
		$JSON = file_get_contents($url, false, stream_context_create($arrContextOptions));
		$pagas = json_decode($JSON, true);

		$url = 'https://grupo_8.proyecto2015.linti.unlp.edu.ar/Slim/index.php/cuotasImpagas/'.$dni.'/'.$year.'index.php';
		$JSON = file_get_contents($url, false, stream_context_create($arrContextOptions));
		$apagar = json_decode($JSON, true);

	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>WEB EXTERNA ALUMNOS</title>
	<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
	<link rel='stylesheet' href='styles.css' />
	<script src='fullcalendar/lib/jquery.min.js'></script>
	<script src='fullcalendar/lib/moment.min.js'></script>
	<script src='fullcalendar/fullcalendar.js'></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				events: [
						<?php for($i=0;$i<sizeof($pagas);$i++) 
							echo "{ title: 'Mes:".$pagas[$i]['mes']." Monto: $".$pagas[$i]['monto']."', 
									start: '".$pagas[$i]['fecha']."',
									color: 'green',
									textColor: 'white'},";
						?>
						
						<?php for($i=0;$i<sizeof($apagar);$i++) 
							echo "{ title: 'Mes:".$apagar[$i]['mes']." Monto: $".$apagar[$i]['monto']."', 
									start: '".$apagar[$i]['anio']."-".$apagar[$i]['mes']."-01',
									color: 'red',
									textColor: 'white'},";
						?>
					]
			})
		});	
	</script>
</head>
<body>
	<center><h2>Calendario de cuotas pagas e impagas</h2></center>
	<p style="margin-left: 10%;">Pagas <span style="background-color:green; color:white; margin-left: 2%; padding-right: 2%;">  </span></p>
	<p style="margin-left: 10%;">Impagas <span style="background-color:red; color:white; margin-left: 2%; padding-right: 2%;">  </span></p>
	
	<div id='calendar'></div>
</body>
</html>