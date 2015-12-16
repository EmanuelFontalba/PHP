
<html><head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="scriptAuto.css">
</head><body><h1>Generación automática de script mysql</h1>
<?php

	$usuarios = array();

	if(!isset($_POST['enviar'])){
		formulario();
	}else{
		$nombreArchivo = "/home/2daw1516/gafoem/public_html/ejercicios/basicosServidor/ficheros/usersTxt/".$_FILES['archivo']['name'];
		$nombreSeparado = explode(".", $nombreArchivo);
		$extension = $nombreSeparado[count($nombreSeparado)-1];
		$sufijo = "";
		if(isset($_POST['sufijo'])){
			$sufijo = $_POST['sufijo'];
		}
		if($extension == "txt"){
			if (move_uploaded_file($_FILES['archivo']['tmp_name'], $nombreArchivo)){ 
				$alumnos=file($nombreArchivo);
				foreach ($alumnos as $value) {

					$alumnoSeparado=explode(",", decodifica($value));
					$alumnoSeparado[0]=explode(" ", $alumnoSeparado[0]);

					$nombreArray=str_split(str_replace(" ", "", $alumnoSeparado[1]));
					$apellido1Array=str_split(str_replace(" ", "", $alumnoSeparado[0][0]));
					$apellido2Array=str_split(str_replace(" ", "", $alumnoSeparado[0][1]));

					$usuario=$apellido1Array[0].$apellido1Array[1].$apellido2Array[0].$apellido2Array[1].$nombreArray[0].$nombreArray[1]."_".$sufijo;
					$bd="bd".$usuario;

					$usuarios[]= array("usuario"=>$usuario,"bd"=>$bd);
					
				}


				//creacion de script
				$saltoLinea = PHP_EOL;
				$nombreArchivoSql = "script";
				if($_POST['nombreSql'] != ""){
					$nombreArchivoSql = $_POST['nombreSql'];
				}
				$archivoScript=fopen("/home/2daw1516/gafoem/public_html/ejercicios/basicosServidor/ficheros/".$nombreArchivoSql.".sql","a+");
				foreach ($usuarios as $value) {
					fwrite($archivoScript, 
							"CREATE USER '".$value['usuario']."'@'localhost' IDENTIFIED BY ".$_POST['pss'].";".$saltoLinea."CREATE DATABASE ".$value['bd'].";".$saltoLinea."GRANT ALL PRIVILEGES ON ".$value['bd'].".* TO '".$value['usuario']."'@'localhost' IDENTIFIED BY  ".$_POST['pss'].";".$saltoLinea
						);
				}
				$bandera=fclose($archivoScript);

				if(!$bandera){
					echo "Estado: Error en la subida!!";
				}else{
					echo "Estado: Ok!!<br/><br/><br/>";
					
					echo '<a id="descarga" href="download.php?archivoDownload='.$nombreArchivoSql.'.sql" >Descargar archivo</a><br/><br/>';
					echo '<div id=script><p>';
					$archivoScript=fopen("/home/2daw1516/gafoem/public_html/ejercicios/basicosServidor/ficheros/".$nombreArchivoSql.".sql","a+");
					foreach ($usuarios as $value) {
						echo "CREATE USER '".$value['usuario']."'@'localhost' IDENTIFIED BY  ".$_POST['pss'].";<br/>CREATE DATABASE ".$value['bd'].";<br/>GRANT ALL PRIVILEGES ON ".$value['bd'].".* TO '".$value['usuario']."'@'localhost' IDENTIFIED BY  ".$_POST['pss'].";<br/>";
					}
					fclose($archivoScript);
					echo "</p></div>";

					unlink($nombreArchivo);
				}
			}else{
				echo "ERROR en la subida.";
			}

		}else{
			echo "Extension de archivo no válida";
			formulario();
		}
		
	}

	function decodifica($string){
		$no_permitidas= array ("Del ", "á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹","Å„","ń");
		$permitidas= array ("", "a","e","i","o","u","A","E","I","O","U","nn","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","nn","nn");
		$texto = str_replace($no_permitidas, $permitidas ,$string);
		$texto = strtolower($texto);
		return $texto;
	}

	function formulario(){
		?>
				<form action="creacionScriptMySql.php" method="post" enctype="multipart/form-data">
					Archivo de texto  <span id="claro">(solo .txt)</span>: <br/><input id="subir" type="file" name="archivo" /><br/><br/>
					Nombre del script sql <span id="claro">(sin extensión)</span>: <br/><input type="text" name="nombreSql" /><br/>
					Sufijo para los usuarios: <br/><input type="text" name="sufijo" /><br/>
					Contraseña para usuarios: <br/><input type="text" name="pss" /><br/>
					<input id="btn" type="submit" name="enviar" value="Enviar" /> 
				</form>
			<?php
	}

	
	
?>
<a href='/~gafoem/ejercicios/vercodigo.php?src=/home/2daw1516/gafoem/public_html/ejercicios/basicosServidor/ficheros/creacionScriptMySql.php'> Ver código fuente</a>
		| 
		<a href='/~gafoem/index.html'> Inicio</a>
		<h5>Emanuel Galván Fontalba</h5>
</body></html>