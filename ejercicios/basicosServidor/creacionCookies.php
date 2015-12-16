<?php
	$cookie = array();
	$usr=$psw="";
	$usrError=$pswError="";
	$lError=false;
	$selected = "";

	function test_input($data){
		$data = trim($data);//codifica espacios en blanco
		$data = stripslashes($data);//codifica las barras
		$data = htmlspecialchars($data);//codifica caracteres especiales
		return $data;
	}

	if(isset($_COOKIE['usr'])&&isset($_COOKIE['psw'])){
		$usr =$_COOKIE['usr'];
		$psw =$_COOKIE['psw'];
	}else{
		if(isset($_POST['enviar'])){
			if(empty($_POST['usr'])){
				$usrError="Usuario requerido";
				$lError=true;
			}else{
				$usr= test_input($_POST['usr']);
				if(!preg_match("/^[a-zA-Z ]*$/", $usr)){
					$usrError="Usuario no válido";
					$lError=true;
				}
			}

			if(empty($_POST['psw'])){
				$pswError="Contraseña requerida";
				$lError=true;
			}else{
				$psw= test_input($_POST['psw']);
				if(!preg_match("/^[a-zA-z0-9]*$/", $psw)){
					$pswError="Solo puedes poner numeros y/o letras";
					$lError=true;
				}
			}

			if(isset($_POST['guardar']) && !$lError){
				if($_POST['guardar']){
					$selected= "selected";
					setcookie('usr', $usr, time()+3600);
					setcookie('psw', $psw, time()+3600);
				}
			}
		}

	}
?>
<html>
<head><meta charset="utf-8"></head>
<body>
<?php
	if(isset($_POST['enviar'])&&!$lError){
		echo "Autentificado correctamente<br/>";
	}else{
		echo "<form method=post>
		Usuario: <input type='text' name='usr' value='$usr'>$usrError<br/>
		Contraseña <input type='text' name='psw' value='$psw'>$pswError<br/>
		<input type='checkbox' name='guardar' value='false' selected='$selected'>Guardar usuario y contraseña.
		<input type='submit' name='enviar' value='Enviar'><br/>
		</form>";
	}
?>
<a href='../vercodigo.php?src=..<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'> Ver código fuente</a>
		| 
		<a href='/index.html'> Inicio</a>
</body>
</html>