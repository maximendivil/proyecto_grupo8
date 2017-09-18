<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" media="(min-width: 376px)" href="styles.css">
	<meta charset="UTF-8">
</head>
<body id="fondo">		
	<div id="contenido">
		<form action="calendario.php" method="POST">
			<fieldset>
				<legend>Consultar cuotas pagas e impagas</legend>
				<div class="labels">
					<label for="dni">DNI:</label>
					<br>
					<label for="year">AÑO: </label>
					<br>
				</div>
				<div id="inputs">
					<input type="number" name="dni" id="dni" required>
					<br>			
					<input type"number" name="year" id="year" required>
					<br>
				</div>
			</fieldset>
			<br>
			<input type="submit" name="submit" id="enviar" value="Consultar">
			<br>
		</form>
	</div>	
</body>
</html>