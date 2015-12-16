<html>
<head><meta charset="utf-8"></head>
<body>
<?php
	$dni="";
	$error="";
	function test_input($data){
		$data = trim($data);//codifica espacios en blanco
		$data = stripslashes($data);//codifica las barras
		$data = htmlspecialchars($data);//codifica caracteres especiales
		return $data;
	}

	function calculaLetra($dni){
		$letras = array(
		'T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'
		);
		return $letras[$dni%23];
	}


	if(isset($_POST['enviar'])){
		echo "<h1>".$dni.calculaLetra($_POST['dni'])."</h1>";
	}else{
		echo"<form method='post'> DNI sin letra: <input type='text' name='dni'><br/> <input type='submit' name='enviar'></form>";
	}
?>
<a href='../vercodigo.php?src=..<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'> Ver código fuente</a>
		| 
		<a href='/index.html'> Inicio</a>
</body>
</html>