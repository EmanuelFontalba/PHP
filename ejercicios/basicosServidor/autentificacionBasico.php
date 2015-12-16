<?php
	session_start();

	header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	$usuario = "admin";
	$password = "123";

	if(!isset($_SESSION['autentificado'])){
		$_SESSION['autentificado'] = false;
	}

	if($_SESSION['autentificado']){
		bienvenido();
	}else{
		if(isset($_POST["entrar"])){
			if($_POST['usr']==$usuario && $_POST['psw']==$password){
				$_SESSION['autentificado']=true;
				header("location:autentificacionBasico.php");
			}else{
				formulario("Nombre de usuario o contraseña no válidos.");
			}
		}else{
			formulario("");
		}
	}

	if(isset($_POST['logOut'])){
		session_unset();
		session_destroy();
		header("location:autentificacionBasico.php");
	}

	function bienvenido(){
		echo "<html>
				<head>
					<meta charset='utf-8'>
					<title>BIENVENIDO</title>
				</head>
				<body>
					<h1>Bienvenido!</h1><br/>
					<form method='post'>
						<input type='submit' name='logOut' value='Cerrar Sesion'>
					</form>
				</body>
			</html>";
	}

	function formulario($error){
		echo '<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8">
				<title>LOGIN</title>
			</head>
			<body>
				<h1>'.$error.'</h1>
				<form method="post">
					Nombre: <input name="usr" type="text"><br/>
					Contraseña: <input name="psw" type="password"><br/>
					<input type="submit" name="entrar" value="Entrar">
				</form>	
			</body>
		</html>';
	}
?>