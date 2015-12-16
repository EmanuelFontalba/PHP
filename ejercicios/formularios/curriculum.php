<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Curriculum Vitae</title>
		<link href='estilos/calendario.css' type='text/style' rel='stylesheet'>
	</head>
	<body>
		<?php
			/**
			* Gestión de curriculum vitae
			* @author Emanuel Galván Fontalba
			*/

			funcion cargarImagen(){

				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["foto"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				    }
				}
				// Check if file already exists
				if (file_exists($target_file)) {
				    echo "Sorry, file already exists.";
				    $uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				        return $target_file;
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				        return "";
				    }
				}
			}

			$nombre="";
			$apellidos="";
			$dni="";
			$telefono="";
			$email="";
			$foto="";
			$sexo="";

			$error_nombre="";
			$error_apellidos="";
			$error_dni="";
			$error_telefono="";
			$error_email="";
			$error_foto="";
			$error_sexo="";

			if(isset($_POST['enviar'])){
				$nombre=$_POST['nombre'];
				$apellidos=$_POST['apellidos'];
				$dni=$_POST['dni'];
				$telefono=$_POST['telefono'];
				$email=$_POST['mail'];
				$foto=cargarImagen();
				$sexo=$_POST['sexo'];

				if($error_nombre == ""){
					$error_nombre= "*";					
				}
				if($error_apellidos == ""){
					$error_apellidos = "*";
				}
				if($error_dni == ""){
					$error_dni = "*";
				}
				if($error_telefono == ""){
					$error_telefono = "*";
				}
				if($error_email == ""){
					$error_email = "*";
				}
				if($error_foto == ""){
					$error_foto = "*";
				}
				if($error_sexo == ""){
					$error_sexo = "*";
				}
			}else{
				$nombre="";
				$apellido="";
				$dni="";
				$telefono="";
				$email="";
				$foto="";
				$sexo="";
			}

			echo'<form action="curriculum.php" method="post" enctype="multipart/form-data">
					Nombre:<input type="text" name="nombre"></br>
					Apellidos:<input type="text" name="apellidos"></br>
					DNI:<input type="text" name="dni"></br>
					Telefono:<input type="text" name="telefono"></br>
					Email:<input type="text" name="mail"></br>
					Foto:<input type="file" name="foto"></br>
					Sexo:<input type="radio" name="sexo" value="masc">Masculino <input type="radio" name="sexo" value="fem">Femenino</br>
					
					<input type="submit" name="enviar" value="Enviar">
					<input type="reset" name="borrar" value="Reestablecer datos"></br>
				</form>';

			
		?>
		<p> </p>
		<a href='/ejercicios/vercodigo.php?src=..<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'> Ver código fuente</a>
		| 
		<a href='/index.html'> Inicio</a>
	</body>
</html>