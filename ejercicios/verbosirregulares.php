<?php session_start();?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Verbos irregulares</title>
	</head>
	<body>
		<?php
			

			/**
			* Muestra los verbos irregulares.
			* @author Emanuel Galván Fontalba
			*/
			$verbos = array(
				"infinitivo"=>array("be","begin","break","bring","build","burn","buy","can","catch", "choose", "come", "cost", "cut","do","dream","drink","drive","eat","fall","feel","fight","fly","forger", "get","give","go","have","hear","know","learn","leave","lose","make","must","pay","put","read","run","say","see","show","sing","sleep","speak","spend","take","teach","think","understand","win"),
				"pasadoSimple"=>array("was/were","began","broke","brought","built","burnt","bought","could","caught", "chose", "came", "cost", "cut","did","dreamt","drank","drove","ate","fell","felt","fought","flew","forgot", "got","gave","went","had","heard","knew","learnt","left","lost","made","had to","paid","put","read","ran","said","saw","showed","sang","slept","spoke","spent","took","taught","thought","understood","won"),
				"pasadoParticipio"=>array("been","begun","broken","brought","built","burnt","bought","-","caught", "chosen", "come", "cost", "cut","done","dreamt","drunk","driven","eaten","fallen","felt","fought","flown","forgotten", "got","given","gone","had","heard","known","learnt","left","lost","made","had to","paid","put","read","ran","said","seen","shown","sung","slept","spoken","spent","taken","taught","thought","understood","won"),
				"traduccion"=>array("ser/estar","empezar","romper","traer","construir","quemar","comprar","poder","coger", "elegir", "venir", "costar", "cortar","hacer","soñar","beber","conducir","comer","caer","sentir","luchar","volar","olvidar", "obtener","dar","ir","tener/haber","oir","saber","aprender","irse/dejar","perder","hacer","tener que","pagar","poner","leer","correr","decir","ver","mostrar","cantar","dormir","hablar","gastar","tomar","enseñar","pensar","entender","ganar")
				);

			echo"<table border=line> <th>INFINITIVO</th><th>PASADO SIMPLE</th><th>PASADO PARTICIPIO</th><th>TRADUCCIÓN</th>";
			for($i = 0; $i<sizeof($verbos["infinitivo"]); $i++) {
				echo "<tr><td>".$verbos['infinitivo'][$i]."</td><td>".$verbos['pasadoSimple'][$i]."</td><td>".$verbos['pasadoParticipio'][$i]."</td><td>".$verbos['traduccion'][$i]."</td></tr>";
			}
			echo "</table>";

			$vacio=array(
				"infinitivo"=>array(),
				"pasadoSimple"=>array(),
				"pasadoParticipio"=>array(),
				"traduccion"=>array()
				);

			$error=array(
				"infinitivo"=>array(),
				"pasadoSimple"=>array(),
				"pasadoParticipio"=>array(),
				"traduccion"=>array()
				);

			function muestraForm(){
				echo "<form action='verbosirregulares.php' method='post'>";
				echo"<table border=line> <th>INFINITIVO</th><th>PASADO SIMPLE</th><th>PASADO PARTICIPIO</th><th>TRADUCCIÓN</th>";
				for($i = 0; $i<sizeof($verbos['infinitivo']); $i++) {
					echo "<tr>";
					if($vacio['infinitivo'][$i]){
						echo "<td>".$verbos['infinitivo'][$i]."</td>";
					}else{
						echo "<td><input type='text' name='respuesta['infinitivo']['".$i."']'/></td>";
					} 

					if($vacio['pasadoSimple'][$i]){
						echo "<td>".$verbos['pasadoSimple'][$i]."</td>";
					}else{
						echo "<td><input type='text' name=respuesta['pasadoSimple']['".$i."']/></td>";
					}

					if($vacio['pasadoParticipio'][$i]){
						echo "<td>".$verbos['pasadoParticipio'][$i]."</td>";
					}else{
						echo "<td><input type='text' name=respuesta['pasadoParticipio']['".$i."']/></td>";
					}

					if ($vacio['traduccion'][$i]) {
						echo "<td>".$verbos['traduccion'][$i]."</td>";
					}else{
						echo "<td><input type='text' name=respuesta['traduccion']['".$i."']/></td>";
					}

					echo "</tr>";
				}
				echo "</table>";
				echo "<input type='submit' name='enviar' value='Enviar'/>";
				echo "</form>";
			}

			function comprueba(){
				for($i = 0; $i<sizeof($verbos["infinitivo"]); $i++) {
					if($_SESSION['vacio']['infinitivo'][$i]){
						if($_POST['respuesta']['infinitivo'][$i]==$verbos['infinitivo'][$i]){
							$error['infinitivo'][$i]=false;
							$_SESSION['vacio']['infinitivo'][$i]=false;
						}else{
							$error['infinitivo'][$i]=true;
						}
					}else{
						$error['infinitivo'][$i]=false;
					} 

					if($_SESSION['vacio']['pasadoSimple'][$i]){
						if($_POST['respuesta']['pasadoSimple'][$i]==$verbos['pasadoSimple'][$i]){
							$error['pasadoSimple'][$i]=false;
							$_SESSION['vacio']['pasadoSimple'][$i]=false;
						}else{
							$error['pasadoSimple'][$i]=true;
						}
					}else{
						$error['pasadoSimple'][$i]=false;
					}

					if($_SESSION['vacio']['pasadoParticipio'][$i]){
						if($_POST['respuesta']['pasadoParticipio'][$i]==$verbos['pasadoParticipio'][$i]){
							$error['pasadoParticipio'][$i]=false;
							$_SESSION['vacio']['pasadoParticipio'][$i]=false;
						}else{
							$error['pasadoParticipio'][$i]=true;
						}
					}else{
						$error['pasadoParticipio'][$i]=false;
					}

					if ($_SESSION['vacio']['traduccion'][$i]) {
						if($_POST['respuesta']['traduccion'][$i]==$verbos['traduccion'][$i]){
							$error['traduccion'][$i]=false;
							$vacio['traduccion'][$i]=false;
						}else{
							$error['traduccion'][$i]=true;
						}
					}else{
						$error['traduccion'][$i]=false;
					}
				}
			}

			function generaHuecos(){
				for($z=0; $z<sizeof($verbos["infinitivo"]); $z++){
					if(rand(0,10)<=5){
						$vacio["infinitivo"][$z]=false;
					}else{
						$vacio["infinitivo"][$z]=true;
					}
					
					if(rand(0,10)<=5){
						$vacio["pasadoSimple"][$z]=false;
					}else{
						$vacio["pasadoSimple"][$z]=true;
					}
					
					if(rand(0,10)<=5){
						$vacio["pasadoParticipio"][$z]=false;
					}else{
						$vacio["pasadoParticipio"][$z]=true;
					}
					
					if(rand(0,10)<=5){
						$vacio["traduccion"][$z]=false;
					}else{
						$vacio["traduccion"][$z]=true;
					}
				}
			}

			if(!isset($_SESSION['vacio'])){
				generaHuecos();
				$_SESSION['vacio']=$vacio;
				$_SESSION['error']=$error;
			}else{
				$vacio=$_SESSION['vacio'];
				$error=$_SESSION['error'];
			}

			if(isset($_POST['enviar'])){
				comprueba();
				muestraForm();
			}else{
				muestraForm();
			}

			

			print_r($vacio);

			


			
		?>
		<p> </p>
		<a href='../ejercicios/vercodigo.php?src=verbosirregulares.php'> Ver código fuente</a>
		| 
		<a href='../index.html'> Inicio</a>
	</body>
</html>