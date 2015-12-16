<?php include("creacionDeSesion.php");?>
<?php include("autentificacion.php");?>
<?php $permiso = "public";?>
<?php include("permisos.php");?>

<html>
<head>
	<meta charset="utf-8">
	<title>Página pública</title>
</head>
<body>
	<nav> ...Navegación...<br/>
		<?php include("formularioAutentificacion.php");?>
		...Fin de navegación...<br/>
	</nav>
	<?php  echo $_SESSION['errorAcceso'];?>
	<?php  $_SESSION['errorAcceso']="";?>
	<h1>Esto es una página pública</h1>
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