<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Sumando numeros</title>
		<style>
			.error{color:#F00;}
		</style>
	</head>
	<body>
		<?php
			/**
			* Formulario dinámico de sumar números.
			* @author Emanuel Galván Fontalba
			*/
			//definición de variables
			$lerror=false;
			$lerrorSuma=false;
			$cantidadErr="";
			$numerosErr=array();
			$cantidad="";
			$resultado=0;
			$numeros=array();
			//comprobamos
			if((isset($_POST['enviar']) && (!isset($_POST['sumar'])))){
				if(empty($_POST['cantidad'])){
					$cantidadErr="Campo requerido.";
					$lerror=true;
				}else{
					$cantidad=$_POST['cantidad'];
					if($cantidad < 2){
						$cantidadErr="Mínimo dos números";
						$lerror=true;
					}
					if(!preg_match("/^[0-9]*$/", $cantidad)){
						$cantidadErr="Solo puedes introducir números";
						$lerror=true;
					}
				}
			}				
			if(isset($_POST['sumar'])){
				$numeros=$_POST['numeros'];
				$cantidad=$_POST['cantidad'];
				foreach ($numeros as $key => $value) {
					if(empty($value)){
						$numerosErr[$key]="Número requerido.";
						$lerrorSuma=true;
					}else{
						if(!preg_match("/^[0-9]*$/", $value)){
							$numerosErr[$key]="Solo puedes introducir dígitos.";
							$lerrorSuma=true;
						}
					}
				}
			}
			//finaliza la validación de datos
			if(!isset($_POST['sumar'])){
				if(!isset($_POST['enviar']) OR $lerror){
					//F1
					?>
					<form  method="post" action="#">
						Cantidad de números a sumar: <input type="text" name="cantidad" value="<?php echo $cantidad;?>">
						<span class="error"><?php echo $cantidadErr;?></span>
						<input type="submit" name="enviar" value="Enviar"> <br/> 
					</form>
					<?php
				}else{
					//F2
					?>
					<form  method="post" action="#">
						Cantidad de números a sumar: <input type="text" name="cantidad" value="<?php echo $cantidad;?>">
						<span class="error"><?php echo $cantidadErr;?></span>
						<input type="submit" name="enviar" value="Enviar"> <br/>
						<?php
							for ($i=0; $i < $cantidad; $i++) { 
								?>
								Número <?php echo($i+1);?>: <input type="text" name="numeros[]" value="<?php
									if(empty($numeros[$i])){
										echo "";
									}else{
									echo $numeros[$i];
									}?>">
								<span class="error"><?php 
								if(empty($numerosErr[$i])){
									echo "";
								}else{
									echo $numerosErr[$i];
								}?></span><br/>
								<?php
							}
						?>
						<input type="submit" name="sumar" value="Sumar"><br/>
					</form>
					<?php
				}
			}else{
				if($lerrorSuma){
					//F2
					?>
					<form  method="post" action="#">
						Cantidad de números a sumar: <input type="text" name="cantidad" value="<?php echo $cantidad;?>">
						<span class="error"><?php echo $cantidadErr;?></span>
						<input type="submit" name="enviar" value="Enviar"><br/> 
						<?php
							for ($i=0; $i < $cantidad; $i++) { 
								?>
								Número <?php echo($i+1);?>: <input type="text" name="numeros[]" value="<?php
									if(empty($numeros[$i])){
										echo "";
									}else{
									echo $numeros[$i];
									}?>">
								<span class="error"><?php 
								if(empty($numerosErr[$i])){
									echo "";
								}else{
									echo $numerosErr[$i];
								}?></span><br/>
								<?php
							}
						?>
						<input type="submit" name="sumar" value="Sumar"><br/>
					</form>
					<?php
				}else{
					//resultado
					foreach ($numeros as $value) {
						$resultado+=$value;
					}
					echo "La suma de los números es: ".$resultado;
				}
			}
		?>
		<p> </p>
		<a href='../vercodigo.php?src=..<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'> Ver código fuente</a> | <a href='/index.html'> Inicio</a>
	</body>
</html>