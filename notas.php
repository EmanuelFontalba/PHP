<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Notas de alumnos</title>
	</head>
	<body>
		<?php
			/**
			* Muestra las notas de los alumnos.
			* @author Emanuel Galván Fontalba
			*/
			$notas=array(
				"nombre"  	=>array("Fran"		,"David"	,"Rafa"		,"Emanuel"	,"Ulises"	,"Elisa"),
				"apellido"	=>array("Guerrero"	,"Peralvo"	,"Miranda"	,"Galván"	,"Luque"	,"Navarro"),
				"1ev" 		=>array("8"			,"7"		,"9"		,"8"		,"7"		,"9"	),
				"2ev" 		=>array("6"			,"6"		,"10"		,"9"		,"8"		,"10"	),
				"final" 	=>array("9"			,"8"		,"9"		,"9"		,"9"		,"10"	),

				);
			
			for($i = 0; $i<6; $i++) {
				$nombre = $notas["nombre"][$i];
				$apellido = $notas["apellido"][$i];
				$ev1 = $notas["1ev"][$i];
				$ev2 = $notas["2ev"][$i];
				$final = $notas["final"][$i];
				
				echo"<p>$nombre $apellido: $ev1 | $ev2 | $final</p>";


			}

			
		?>
		<p> </p>
		<a href='../ejercicios/vercodigo.php?src=notas.php'> Ver código fuente</a>
		| 
		<a href='../index.html'> Inicio</a>
	</body>
</html>