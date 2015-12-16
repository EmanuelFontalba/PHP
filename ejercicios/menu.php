<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Menús</title>
	</head>
	<body>
		<?php
			/**
			* Muestra todas las combinaciones de menu.
			* @author Emanuel Galván Fontalba
			*/

			
			$primeros=array("Ensalada", "sopa", "pasta");
			$segundos=array("Chuletas", "Bacalao", "Pizza", "Estofado", "Rabo de toro");
			$postres=array("Flan", "Fruta");
			$carta=array();


				foreach ($primeros as $primero) {
					foreach ($segundos as $segundo) {
						foreach ($postres as $postre) {
							echo"<p>$primero , $segundo, $postre</p>";
						}
					}
				}
			
		?>
		<p> </p>
		<a href='http://192.168.115.205/ejercicios/vercodigo.php?src=menu.php'> Ver código fuente</a>
		| 
		<a href='http://192.168.115.205/index.html'> Inicio</a>
	</body>
</html>