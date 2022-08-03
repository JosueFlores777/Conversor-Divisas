<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

	<title>Almacenando y modificando</title>
</head>
<body>
<?php
	include('include/config.inc');
	
	$misql = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($misql,"utf8");
	
	        $codigo = $_POST["txtcodigo"];
			$nombrep = $_POST["txtnombrep"];
			$nombreM = $_POST["txtnombreM"];
			$valor_usd = $_POST["txtusd"];
			$valor_lo = $_POST["txtlocal"];
    

	if($codigo != "" && $nombrep != ""  && $nombreM != "" && $valor_usd != "" && $valor_lo!= ""){
		$query = "call UpdatePais_Moneda ('$codigo', '$nombrep', '$nombreM', '$valor_usd','$valor_lo');";
		$consulta=$misql->query($query);
		echo '<script>
		swal({
		  title: "Buen trabajo",
		  text: "El registro se modifico con éxito!",
		  type: "success",
		  confirmButtonText: "Continuar"
	  
		}).then(function() {
		  window.location = "Mostrar.php";
		});
	  </script>';
	}
	else{
		echo '<script>
		swal({
		  title: "ERROR",
		  text: "No puedes dejar campos vacios!",
		  type: "error",
		  confirmButtonText: "Continuar"
	  
		}).then(function() {
		  window.location = "Mostrar.php";
		});
	  </script>';
	}
  ?>
</body>
</html>