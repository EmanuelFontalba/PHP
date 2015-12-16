<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Tablero de barcos</title>
	</head>
	<body>
		<?php
			/**
			* Tablero de barcos.
			* @author Emanuel Galván Fontalba
			*/
			
			$tablero=array(
				"A"=>array(false,true,true,true,true,false,false,false),
				"B"=>array(false,false,false,false,false,false,true,false),
				"C"=>array(false,false,true,true,false,false,true,false),
				"D"=>array(false,true,false,false,false,false,true,false),
				"E"=>array(false,true,false,false,false,false,false,false),
				"F"=>array(false,true,false,false,false,false,false,false),
				"G"=>array(false,false,false,false,false,false,false,false),
				"H"=>array(false,false,false,true,true,false,false,false),			
			);

			echo"<table border=line>";
			foreach ($tablero as $fila) {

				echo"<tr>";

				foreach ($fila as $casilla) {

					if($casilla){
						echo"<td bgcolor=red>Boom</td>";
					}else{
						echo"<td bgcolor=blue>Agua</td>";
					}
					
				}

				echo"</tr>";
				
			}
			echo"</table>";


			
		?>
		<p> </p>
		<a href='../ejercicios/vercodigo.php?src=tablero.php'> Ver código fuente</a>
		| 
		<a href='http://192.168.115.205/index.html'> Inicio</a>
	</body>
</html>