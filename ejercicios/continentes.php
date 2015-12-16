<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Continentes</title>
	</head>
	<body>
		<?php
			/**
			* Muestra continentes y paises.
			* @author Emanuel Galván Fontalba
			*/
			

			$continentes=array(
				array("nombre"=>"Europa", "paises"=>array(
							array("pais"=>"España", "capital"=>"Madrid", "bandera"=>"Spain.png"),
							array("pais"=>"Hungria", "capital"=>"Budapest", "bandera"=>"Hungary.png"),
							array("pais"=>"Italia", "capital"=>"Roma", "bandera"=>"Italy.png"),
							array("pais"=>"Francia", "capital"=>"Paris", "bandera"=>"France.png"),
							array("pais"=>"Alemania", "capital"=>"Berlin", "bandera"=>"Germany.png")
						)
					),
				array("nombre"=>"Asia", "paises"=>array(
							array("pais"=>"China", "capital"=>"Pekin", "bandera"=>"China.png"),
							array("pais"=>"Japón", "capital"=>"Tokio", "bandera"=>"Japan.png"),
							array("pais"=>"Corea del norte", "capital"=>"Pionyang", "bandera"=>"NorthKorea.png")
						)
					),
				array("nombre"=>"Africa", "paises"=>array(
							array("pais"=>"Marruecos", "capital"=>"Rabat", "bandera"=>"Morocco.png"),
							array("pais"=>"Argelia", "capital"=>"Argel", "bandera"=>"Algeria.png"),
							array("pais"=>"Togo", "capital"=>"Lomé", "bandera"=>"Tonga.png")
						)
					)
				);

			echo"<table border=line><th>Continente</th><th>Pais</th><th>Capital</th><th>Bandera</th>";

			foreach ($continentes as $value) {
				$size = sizeof($value["paises"])+1;
				echo'<tr><td rowspan="'.$size.'">'.$value["nombre"].' </td></tr>';

				foreach ($value["paises"] as $inf) {
					echo'<tr><td>'.$inf["pais"].'</td><td>'.$inf["capital"].'</td><td><img src=../ejercicios/banderas/'.$inf["bandera"].'></td></tr>';
				}

			}
			echo"</table>";
		?>
		<p> </p>
		<a href='http://192.168.115.205/ejercicios/vercodigo.php?src=continentes.php'> Ver código fuente</a>
		| 
		<a href='http://192.168.115.205/index.html'> Inicio</a>
	</body>
</html>