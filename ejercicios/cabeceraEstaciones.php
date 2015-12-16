<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Cabeceras Estaciones</title>
		
	</head>
	<body>

		<?php
			/**
			* Cambio de cabecera dependiendo de la fecha.
			* @author Emanuel Galván Fontalba
			* @version 1.0
			*/
			$fecha = getdate ();
			$color;
			if (isset($_GET['color'])) {
				$color='#'.$_GET['color'];
			}
			else $color='#ffffff';
			
			$mesName = $fecha['month'];
			$cabecera;
			$day= $fecha['mday'];

			switch ($mesName) {
				case 'January':
					$cabecera=1;
					break;
				case 'February':
					$cabecera=1;
					break;
				case 'March':

					if($day>=22){
						$cabecera=2;
					}else{
						$cabecera=1;
					}
					break;
				case 'April':
					$cabecera=2;
					break;
				case 'May':
					$cabecera=2;
					break;
				case 'June':
					if($day>=22){
						$cabecera=3;
					}else{
						$cabecera=2;
					}
					break;
				case 'July':
					$cabecera=3;
					break;
				case 'August':
					$cabecera=3;
					break;
				case 'September':
					if($day>=22){
						$cabecera=4;
					}else{
						$cabecera=3;
					}
					break;
				case 'October':
					$cabecera=4;
					break;
				case 'November':
					$cabecera=4;
					break;
				case 'december':
					if($day>=22){
						$cabecera=1;
					}else{
						$cabecera=4;
					}
					break;
				default:
					$cabecera=0;
					break;
			}
			
  			switch ($cabecera) {
  				case '1':
  					echo "<div style='width=100%; height: 280px; background-color: ".$color.";'><img src='http://192.168.115.205/ejercicios/cabeceras/cabeceraInvierno.jpg'</div>";
  					break;
  				case '2':
  					echo "<div style='width=100%; height: 280px; background-color: ".$color.";'><img src='http://192.168.115.205/ejercicios/cabeceras/cabeceraPrimavera.png'</div>";
  					break;
  				case '3':
  					echo "<div style='width=100%; height: 280px; background-color: ".$color.";'><img src='http://192.168.115.205/ejercicios/cabeceras/cabeceraVerano.jpg'</div>";
  					break;
  				case '4':
  					echo "<div style='width=100%; height: 280px; background-color: ".$color.";'><img src='http://192.168.115.205/ejercicios/cabeceras/cabeceraOtonio.jpg'</div>";
  					break;
  					
  				default:
  					echo"Se ha producido un error en la carga de la cabecera";
  					break;
  			}

  			

		?>
		<p> </p>
		<a href='http://192.168.115.205/ejercicios/vercodigo.php?src=cabeceraEstaciones.php'> Ver código fuente</a>
		| 
		<a href='http://192.168.115.205/index.html'> Inicio</a>
	</body>
</html>