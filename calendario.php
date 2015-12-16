<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Calendario</title>
		<link href='estilos/calendario.css' type='text/style' rel='stylesheet'>
	</head>
	<body>
		<?php
			/**
			* Muestra el calendario del mes y año introducido en variables.
			* @author Emanuel Galván Fontalba
			*/
			$mesRecibido="";
			$anioRecibido="";
			$esBisiesto=FALSE;
			define('fechaPartida','2015-09-21');
			$errorMes = "";
			$errorAnno = "";
			$paternMes = "/^(0[1-9]|1[012])$/";
			$paternAnno = "/^(201[5-9]|20[2-9]\d|2[1-9]\d\d|[3-9]\d\d\d)$/";

			if(isset($_POST['botonEnviar'])){
				$mesRecibido = $_POST['mes'];
				$anioRecibido = $_POST['anno'];

				if($mesRecibido=="" || !preg_match($paternMes, $mesRecibido)){
					$errorMes = "*";
					$mesRecibido = "";
				}else{
					$errorMes = "";
				}
				if($anioRecibido=="" || !preg_match($paternAnno, $anioRecibido)){
					$errorAnno = "*";
					$anioRecibido = "";
				}else{
					$errorAnno = "";
				}
			}else{
				$mesRecibido = "";
				$anioRecibido = "";
			}

			echo "
					<form action='calendario.php' method='post'>
						Mes:&nbsp&nbsp<input type='text' name='mes' value='".$mesRecibido."'/>".$errorMes."
						&nbsp&nbspAño:&nbsp&nbsp <input type='text' name='anno' value='".$anioRecibido."'/>".$errorAnno."
						&nbsp&nbsp<input type='submit' name='botonEnviar' value='Enviar' /> 
					</form>
				";

			if($mesRecibido!="" && $anioRecibido!="" ){

					/**
				* Cálculo del año bisiesto.
				*/
				if(!($anioRecibido%4) && ($anioRecibido%100) || !($anioRecibido%400)){
					$esBisiesto=TRUE;
				}else{
					$esBisiesto=FALSE;
				}	

				/**
				* Cuenta dias desde una fecha de partida.
				*/
				$dias=(strtotime(fechaPartida)-strtotime($anioRecibido.'-'.$mesRecibido.'-1'))/86400;
				$dias=abs($dias);

				/**
				* Números de dias del mes.
				*/
				switch ($mesRecibido) {
					case 2:
						if($esBisiesto){
							$numeroDiasMes=29;
						}else{
							$numeroDiasMes=28;
						}
						break;
					case 4:
					case 6:
					case 9:
					case 11:
						$numeroDiasMes=30;
						break;
					default:
						$numeroDiasMes=31;
						break;
					}

				/**
				* Cálculo del dia de la semana.
				*/
				$diaSemana = $dias % 7;

				$dia=1;
				$i=0;

				

				echo ("<table border='1'> <tr> <th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr><tr>");

				while ($i <= 37){
					if($i%7==0){
						echo"</tr><tr>";
					}
					if(($diaSemana>$i) || ($dia>$numeroDiasMes)){
						echo "<td>&nbsp</td>";
					}
					else{
						echo "<td>$dia</td>";
						$dia++;
					}
					$i++;
				}

				echo("</tr></table>");

			}
		?>
		<p> </p>
		<a href='/ejercicios/vercodigo.php?src=..<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'> Ver código fuente</a>
		| 
		<a href='/index.html'> Inicio</a>
	</body>
</html>