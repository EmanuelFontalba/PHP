<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Recorrido de array asociativo</title>
	</head>
	<body>
		<?php
			/**
			* Muestra un array asociativo.
			* @author Emanuel Galván Fontalba
			*/
			
			$asignaturas=array("DAWESE"=>"8","DAWECL"=>"4","DAWEB"=>"4","DIWEB"=>"6","HLC"=>"3","EIE"=>"3");

			foreach ($asignaturas as $value) {
				echo($value." | ");
			}


			
		?>
		<p> </p>
		<a href='http://192.168.115.205/ejercicios/vercodigo.php?src=recorrerarrayasociativo.php'> Ver código fuente</a>
		| 
		<a href='http://192.168.115.205/index.html'> Inicio</a>
	</body>
</html>