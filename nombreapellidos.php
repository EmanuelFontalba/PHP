<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Menús</title>
	</head>
	<body>
		<?php
			/**
			* Mi primer formulario.
			* @author Emanuel Galván Fontalba
			*/
			$errorNombre = "";
			$errorApellido = "";

			if(isset($_POST['botonEnviar'])){
				$varNombre = $_POST['nombre'];
				$varApellido = $_POST['apellidos'];
			}else{
				$varNombre = "";
				$varApellido = "";
			}

			if($varNombre==""){
					$errorNombre = "*";
				}
			if($varApellido==""){
				$errorApellido = "*";
			}

			if($varNombre!="" && $varApellido!="" ){

				echo "".$_POST['nombre']." ".$_POST['apellidos'];

			}else{

				echo "
					<form action='nombreapellidos.php' method='post'>
						Nombre:<input type='text' name='nombre' value='".$varNombre."'/>".$errorNombre."
						Apellidos:<input type='text' name='apellidos' value='".$varApellido."'/>".$errorApellido."
						<input type='submit' name='botonEnviar' value='Enviar' /> 
					</form>
				";
				
			}
			
			
		?>
		<p> </p>
		<a href='../vercodigo.php?src=..<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'> Ver código fuente</a>
		| 
		<a href='/index.html'> Inicio</a>
	</body>
</html>