<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" type="text/javascript"></script> 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css"rel="stylesheet" />
	<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<title>Eliminar registro</title>
</head>
<body>
	
	<?php
	include('include/config.inc');
	$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($conexion,"utf8");		

	$Codigo=$_REQUEST['Codigo'];
		
	$consulta="call DeletePais2 ('$Codigo');";
	echo($consulta);
	$resultado=mysqli_query( $conexion, $consulta ) or die ( "No se puede eliminar el registro");
//otra forma de eliminar con dos procedimientos
	
	//$consulta="call DeletePais ('$Codigo');";
	//echo($consulta);
	//$resultado=mysqli_query( $conexion, $consulta ) or die ( "No se puede eliminar el registro");
	
	//$resultado=mysqli_query( $conexion, $consulta ) or die ( "No se puede eliminar el registro");
	//$consulta="call DeleteMoneda ('$Codigo');";
	//echo($consulta);
	//$resultado=mysqli_query( $conexion, $consulta ) or die ( "No se puede eliminar el registro");
	
	
	
	if($resultado)
	{
		echo '<script>
		swal({
		  title: "Buen trabajo",
		  text: "El registro se elimino con éxito!",
		  type: "success",
		  confirmButtonText: "Continuar",
		}).then(function() {
		  window.location = "Mostrarvista.php",
	
		});
	  </script>';
	
	}
	else
	{
		echo '<script>
		swal({
		  title: "Error",
		  text: "El registro nose eliminino con éxito!",
		  type: "error",
		  confirmButtonText: "Continuar"
	  
		}).then(function() {
		  window.location = "index.html";
		});
	  </script>';
	}
	// cerrar conexi�n de base de datos
	mysqli_close( $conexion );
?>
  <script src="../Conversor/js/Logic.js"></script>
 
</body>
</html>