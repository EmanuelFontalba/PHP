<!DOCTYPE html>
<html>
<head>
	<title>Buscaminas</title>
	<style type="text/css">
		td{
			border: 1px solid black;
			border-collapse: collapse;
			background-color: #BBB;
			width: 30px;
			height: 30px;
			text-align: center;
			font-size: 20px;
			font-family: fantasy;
		}
		table{

			border: 1px solid black;
			border-collapse: collapse;
		
		}
		#pulsado{

			color: green;

		}
		#sinpulsar{
			box-shadow: inset 0px 0px 40px white;

		}
		#uno{

			color: yellow;

		}
		#dos{

			color: orange;

		}
		#tres{

			color: red;

		}
	</style>
</head>
<body>


<?php
	session_start();

	define("TAM", 10);
	define("NUMMINAS", 10);
	define("NUMCASILLAS", TAM*TAM);

	if(!isset($_SESSION['tablero'])){
		$_SESSION['tablero']=array();
		$_SESSION['visible']=array();

		crearTablero();
	}

	if(isset($_GET['fila'])){
		clickCasilla($_GET['fila'],$_GET['columna']);
	}

	function crearTablero(){
		for($i=0;$i<TAM;$i++){
			for($z=0;$z<TAM;$z++){
				$_SESSION['tablero'][$i][$z]=0;
				$_SESSION['visible'][$i][$z]=false;
			}
		}

		initTablero();
	}

	function initTablero(){
		for($i=0;$i<NUMMINAS;$i++){

			$f=0;
			$c=0;

			do{
				$f=rand(0,(TAM-1));
				$c=rand(0,(TAM-1));
			}while($_SESSION['tablero'][$f][$c]==9);

			//Pongo bomba
			$_SESSION['tablero'][$f][$c]=9;

			//Incremento valores de alrededor
			for($y=$f-1;$y<=$f+1;$y++){
				for($z=$c-1;$z<=$c+1;$z++){
					if(isset($_SESSION['tablero'][$y][$z])){
						if($_SESSION['tablero'][$y][$z]!=9){
							$_SESSION['tablero'][$y][$z]++;
						}
					}
				}
			}
		}
	}

	function comprobarGanador(){
		$gana=false;
		$visibles=0;
		foreach ($_SESSION['visible'] as $filas) {
			foreach ($filas as $elem) {
				if($elem){
					$visibles++;
				}
			}
		}
		if($visibles==NUMCASILLAS-NUMMINAS){
			$gana=true;
		}
		return $gana;
	}

	function mostrarVisible(){
		echo "<table>";
		for($i=0;$i<TAM;$i++){
			echo "<tr>";
			for($y=0;$y<TAM;$y++){
				
				if($_SESSION['visible'][$i][$y]){
					if($_SESSION['tablero'][$i][$y]==0){
						echo "<td id=pulsado>";
					}else if($_SESSION['tablero'][$i][$y]==9){
						echo "<td id=pulsado><img src='bomba.png'/>";
					}else if($_SESSION['tablero'][$i][$y]==1){
						echo "<td id=uno>".$_SESSION['tablero'][$i][$y];
					}else if($_SESSION['tablero'][$i][$y]==2){
						echo "<td id=dos>".$_SESSION['tablero'][$i][$y];
					}else if($_SESSION['tablero'][$i][$y]==3){
						echo "<td id=tres>".$_SESSION['tablero'][$i][$y];
					}else{
						echo "<td id=pulsado>".$_SESSION['tablero'][$i][$y];
					}
				}else{
					echo "<td id=sinpulsar>";
					echo "<a href='buscaminas.php?fila=".$i."&columna=".$y."'>";
					echo "<img src='boton.png'/>";
					echo "</a>";
				}
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function clickCasilla($fila, $columna){
		
		
		if(!$_SESSION['visible'][$fila][$columna]){

			$_SESSION['visible'][$fila][$columna]=true;

			if($_SESSION['tablero'][$fila][$columna]==9){
				muestraBombas();
				echo "Muerto";
			}else{
				if(comprobarGanador()){
					echo "Has ganado";
				}else{
					if($_SESSION['tablero'][$fila][$columna]==0){

						for($y=$fila-1;$y<=$fila+1;$y++){
							for($z=$columna-1;$z<=$columna+1;$z++){
								if(isset($_SESSION['tablero'][$y][$z])){
										clickCasilla($y,$z);
								}
							}
						}

					}
					
				}
			}
		}
	}

	function muestraBombas(){
		for($i=0;$i<TAM;$i++){
			for($z=0;$z<TAM;$z++){
				if($_SESSION['tablero'][$i][$z]==9){
					$_SESSION['visible'][$i][$z]=true;
				}
			}
		}

	}
	mostrarVisible();
	echo "<br/><br/><table>";
		for($i=0;$i<TAM;$i++){
			echo "<tr>";
			for($y=0;$y<TAM;$y++){
				echo "<td>";
				
						echo $_SESSION['tablero'][$i][$y];
			
				echo "</td>";
			}
			echo "</tr>";
		}

?>

</body>
</html>