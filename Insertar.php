<html>
	<head>
		<title>Insertar datos de tabla con MySQL</title>
		<link rel="stylesheet" type="text/css" href="css/styl.php">  
		<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

	</head>
	<body >
		<h1>Insertando registros en la Base de Datos</h1>
		<?php

			include('include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");
	
	        
			$nombrep = $_POST["txtnombrep"];
			$nombreM = $_POST["txtnombreM"];
			$valor_usd = $_POST["txtusd"];
			$valor_lo = $_POST["txtlocal"];

			if($nombrep !=""&&  $nombreM!=""&&  $valor_usd!=""&&  $valor_lo!="" ){
				//creando la consulta para insertar el registro
				$consulta = "call InsertPais('$nombrep');";
				$EjecutarConsulta=mysqli_query( $conexion, $consulta );	
					if($EjecutarConsulta){
						$a=1;
					}else{
						$a=2;
					}
				
					$consulta = "call InsertMoneda('$nombreM', '$valor_usd','$valor_lo');";
			
				$EjecutarConsulta=mysqli_query( $conexion, $consulta );	
	
						if($EjecutarConsulta){
							$b=1;
						}else{
							$b=2;
						}
			if ($a==1 && $b==1)
				{
					echo '<script>
					swal({
					  title: "Buen trabajo",
					  text: "Se registro con éxito!",
					  type: "success",
					  confirmButtonText: "Continuar"
				  
					}).then(function() {
					  window.location = "index.html";
					});
				  </script>';
					
				}
				else
				{
					echo '<script>
					swal({
					  title: "Error usted fallo éxito!!!",
					  text: "No se guardo nada!",
					  type: "error",
					  confirmButtonText: "Continuar"
				  
					}).then(function() {
					  window.location = "Insertar.html";
					});
				  </script>';
				}			
			}else{
				echo '<script>
				swal({
				  title: "Error usted fallo éxito!!!",
				  text: "No dejar campos vacios",
				  type: "error",
				  confirmButtonText: "Continuar"
			  
				}).then(function() {
				  window.location = "Insertar.html";
				});
			  </script>';
			}
		

			//liberando recursos y cerrando la BD;
			mysqli_close($conexion);
		?>
		<br><br>
		
	</body>
</html>|

