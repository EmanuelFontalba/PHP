
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Paleta de colores</title>
	</head>
	<body>
		<?php

			/**
			* Paleta de colores.
			* @author Emanuel Galván Fontalba
			* @version 1.0
			*/

			$r=00;
			$g=00;
			$b=00;
			$inc = 15;

			echo "<table>";

			for ($r; $r < 256; $r+=$inc) { 
				
				echo "<tr>";

				for ($g; $g < 256; $g+=$inc) { 
					
					echo "<tr>";

					for ($b; $b < 256; $b+=$inc) { 

						
						
		   				$hex = str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
		  				$hex .= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
		   				$hex .= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
						

						echo"<td bgcolor=#$hex><a href='http://192.168.115.205/ejercicios/cabeceraEstaciones.php?color=$hex'>#$hex</td>";

					}
					$b=0;

					echo "</tr>";
				}
				$g=0;

				echo "</tr>";

			}

			echo"</table>";

			
		?>

		<a href='http://192.168.115.205/ejercicios/vercodigo.php?src=paletadecolores.php'> Ver código fuente</a>
		| 
		<a href='http://192.168.115.205/index.html'> Inicio</a>
	</body>
</html>