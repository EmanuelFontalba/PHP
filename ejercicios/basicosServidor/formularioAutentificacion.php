<?php
	function botonCerrarSesion(){
		echo "<form method='post'>
				<input type='submit' name='logOut' value='Cerrar Sesion'>
			</form>";
	}

	function formulario($error){
		echo '<h1>'.$error.'</h1>
			<form method="post">
				Nombre: <input name="usr" type="text"><br/>
				Contraseña: <input name="psw" type="password"><br/>
				<input type="submit" name="entrar" value="Entrar">
			</form>';
	}

	if($_SESSION['autentificado']){
		botonCerrarSesion();
	}else{
		formulario($errorInicioSesion);
	}
?>