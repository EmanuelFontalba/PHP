<!DOCTYPE HTML>
<html>
<head>
	<style>
	.error{color:#F00;}
	</style>
</head>
<body>
	
	<?php

	function test_input($data){
		$data = trim($data);//codifica espacios en blanco
		$data = stripslashes($data);//codifica las barras
		$data = htmlspecialchars($data);//codifica caracteres especiales
		return $data;
	}

	//definimos una serie de mensajes de error
	$lerror=FALSE;
	$nameErr=$emailErr=$genderErr=$websiteErr="";

	//variables para cargar valores en el formulario
	$name=$email=$gender=$comment=$website="";

	//Detectamos si llega por el boton enviar
	if(isset($_POST['submit'])){
		//boton enviar pulsado, validadmos datos
		//nombre
		if(empty($_POST['name'])){
			$nameErr="Nombre requerido.";
			$lerror=TRUE;
		}else{
			$name=test_input($_POST['name']);
			//comprobamos con expresion regular
			if(!preg_match("/^[a-zA-Z ]*$/", $name)){
				$nameErr="Solo puedes introducer letras y espacios en blanco.";
				$lerror=TRUE;
			}
		}
		//email
		if(empty($_POST['email'])){
			$emailErr="Email requerido.";
			$lerror=TRUE;
		}else{
			$email=test_input($_POST['email']);
			//comprobamos el email con su propio filtro
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailErr="Email invalido.";
				$lerror=TRUE;
			}
		}
		//website
		if(empty($_POST['website'])){
			//Este campo no es requerido
			$website="";
		}else{
			$website=test_input($_POST['website']);
			//comprobamos el website con su propio filtro
			if(!filter_var($website, FILTER_VALIDATE_URL)){
				$websiteErr="Sitio web invalido.";
				$lerror=TRUE;
			}
		}
		//comentario
		if(empty($_POST['comment'])){
			//Este campo no es requerido
			$comment="";
		}else{
			$comment=test_input($_POST['comment']);
		}
		//sexo
		if(empty($_POST['gender'])){
			$genderErr="Sexo requerido.";
			$lerror=TRUE;
		}else{
			$gender=test_input($_POST['gender']);
		}
	}
	//finaliza la validación de campos
	//comprobamos cuando mostrar los datos o cuando mostrar de nuevo el formulario
	if(!isset($_POST['submit']) OR $lerror){
		//mostrar formulario
		?>
		<h2>PHP Form Validation Example</h2>
		<p><span class="error">* required field.</span></p>
		<form method="post" action="#">  
		  Name: <input type="text" name="name" value="<?php echo $name;?>">
		  <span class="error">* <?php echo $nameErr;?> </span>
		  <br><br>
		  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
		  <span class="error">* <?php echo $emailErr;?></span>
		  <br><br>
		  Website: <input type="text" name="website" value="<?php echo $website;?>">
		  <span class="error"><?php echo $websiteErr;?></span>
		  <br><br>
		  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
		  <br><br>
		  Gender:
		  <input type="radio" name="gender"  <?php if(isset($gender)&&$gender=="female") echo "checked"?> value="female">Female
		  <input type="radio" name="gender"  <?php if(isset($gender)&&$gender=="male") echo "checked"?> value="male">Male
		  <span class="error">* <?php echo $genderErr;?></span>
		  <br><br>
		  <input type="submit" name="submit" value="Submit">  
		</form>
	<?php
	}else{
		//mostrar los datos
		?>
		Name: <?php echo $name;?> <br/>
		Email: <?php echo $email;?> <br/>
		Website: <?php echo $website;?> <br/>
		Comment: <?php echo $comment;?> <br/>
		Gender: <?php echo $gender;?> <br/>
		<?php
	}


	?>

</body>
</html>