<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Meses</title>
	</head>
	<body>
		<?php
			/**
			* Muestra los meses del año.
			* @author Emanuel Galván Fontalba
			*/
			
			$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

			foreach ($meses as $mes) {
				echo($mes." | ");
			}


			
		?>
		<p> </p>
		<a href='http://192.168.115.205/ejercicios/vercodigo.php?src=meses.php'> Ver código fuente</a>
		| 
		<a href='http://192.168.115.205/index.html'> Inicio</a>
	</body>
</html>