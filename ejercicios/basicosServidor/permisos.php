<?php
	$acceso=false;
	$mensaje = "";

	if($permiso == "public"){
		$acceso = true;
	}else{
		if($_SESSION['usuario'] != null){
			if($_SESSION['usuario']['permisos'] == $permiso) {
				$acceso = true;
				$_SESSION['errorAcceso']="";
			}		
		}
	}

	if(!$acceso){
		header("Location:paginaPublica.php");
		$_SESSION['errorAcceso']="No tienes acceso a la página solicitada.";
	}


?>

