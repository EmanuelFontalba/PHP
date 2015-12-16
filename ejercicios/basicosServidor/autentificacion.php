
<?php
	$usuarios = array(
		array('usr' => "Admin" , 'contra' => "123", 'permisos' => "admin"),
		array('usr' => "Usuario" , 'contra' => "123", 'permisos' => "normal")
		);

	if(isset($_POST["entrar"])){
		$usuarioEncontrado = buscaUsuario($_POST['usr'],$usuarios);
		if($usuarioEncontrado!=null && $_POST['psw']== $usuarioEncontrado['contra']){
			$_SESSION['autentificado']=true;
			$_SESSION['usuario']=$usuarioEncontrado;
		}else{
			$errorInicioSesion="Nombre de usuario o contraseña no válidos.";
			$_SESSION['autentificado']=false;
		}
	}

	if(isset($_POST['logOut'])){
		session_unset();
		session_destroy();
		header("location:paginaPublica.php");
	}

	function buscaUsuario($usrBuscar, $usuarios){
		foreach ($usuarios as $user) {
			foreach ($user as $usr => $nomUsr) {
				if($nomUsr == $usrBuscar){
					return $user;
				}
			}
		}
		return null;
	}
?>