<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Calendario</title>
	</head>
	<body>
		<form action="../calendario.php" method="post">
		Mes:<input type='text' name='mes'/>
		Año:<input type='text' name='anno'/>
		<input type="submit" name="botonEnviar" value="Enviar" /> 
		</form>
		<p> </p>
		<a href='../vercodigo.php?src=..<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'> Ver código fuente</a>
		| 
		<a href='/index.html'> Inicio</a>
	</body>
</html>