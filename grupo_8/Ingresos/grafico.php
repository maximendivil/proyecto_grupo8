<?php
	$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
	);  
	
	$anio = $_POST['anio'];
	$url = 'https://grupo_8.proyecto2015.linti.unlp.edu.ar/Slim/index.php/ingresos/'.$anio.'index.php';
	$JSON = file_get_contents($url, false, stream_context_create($arrContextOptions));
	$data = json_decode($JSON,true);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>WEB EXTERNA INGRESOS</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	
		<script type="text/javascript">
			var titulo="Ingresos "+<?php echo $anio; ?>;
			var data=<?php echo json_encode($data);?>;
			var valores = new Array(0,0,0,0,0,0,0,0,0,0,0,0);
			for(var i=0;i<data.length;i++){
				valores[data[i]['mes']] =  parseInt(data[i]['monto']);
			}
			
			$(function () {
				$('#container').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: titulo
					},
					xAxis: {
						categories: [
							'Ene',
							'Feb',
							'Mar',
							'Abr',
							'May',
							'Jun',
							'Jul',
							'Ago',
							'Sep',
							'Oct',
							'Nov',
							'Dic'
						]
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Ingresos ($)'
						}
					},
					tooltip: {
						headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
							'<td style="padding:0"><b>${point.y:.1f}</b></td></tr>',
						footerFormat: '</table>',
						shared: true,
						useHTML: true
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
					series: [
						{
							name: 'Total',
							data: [
								valores[0],valores[1],valores[2],valores[3],valores[4],valores[5],valores[6],valores[7]
								,valores[8],valores[9],valores[10],valores[11]
							]
						}
					]
				});
			});
		</script>
</head>
<body>
	<script src="highcharts/js/highcharts.js"></script>
	<script src="highcharts/js/modules/exporting.js"></script>
	<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	
</body>
</html>