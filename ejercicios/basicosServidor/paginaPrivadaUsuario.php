<?php include("creacionDeSesion.php");?>
<?php include("autentificacion.php");?>
<?php $permiso = "normal";?>
<?php include("permisos.php");?>

<html>
<head>
	<meta charset="utf-8">
	<title>Página privada de usuario</title>
</head>
<body>
	<nav> ...Navegación...<br/>
		<?php include("formularioAutentificacion.php");?>
		...Fin de navegación...<br/>
	</nav>
	<h1>Esto es una página privada de usuario</h1>
	<ul>
		<li><a href="paginaPublica.php">Ir a página publica</a></li>

		<?php
		if($_SESSION['usuario']['permisos']=='admin') {
			echo '<li><a href="paginaPrivadaAdmin.php">Ir a página privada de administrador</a></li>';
		}
		if($_SESSION['usuario']['permisos']=='normal'){
			echo '<li><a href="paginaPrivadaUsuario.php">Ir a página privada de usuario</a></li>';
		}
		?>
	</ul>
</body>
</html>