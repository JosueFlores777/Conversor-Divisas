<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" type="text/javascript"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css"rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400"> 
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<link rel="stylesheet" href="css/tooplate-style.css">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="css/Style.php">
	<title>Conversor</title>
</head>
<body class="Bod" allowtransparency="true">
           
<?php
	include('include/config.inc');
	
	$misql = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
	mysqli_set_charset($misql,"utf8");
	
	        $Cantidad = $_POST["TxtCantidad"];
			$Codigo = $_POST["combobox"];
			
    if($Cantidad !="" && $Codigo!="Elija una Opcion"){
		
			$query = "call Mostrar_Moneda ('$Codigo');";
        $EjecutarConsulta=mysqli_query( $misql, $query );
        $datos=mysqli_fetch_array($EjecutarConsulta);
		$ValorLocal=$datos['ValorLocal'];
		$ValorUSD=$datos['valorUsd'];
        $nom_moneda=$datos['nombreM'];
		$ResultadoLocalUSD=round((($Cantidad/1)*$ValorLocal),2);
		$ResultadoUSDLocal=(($Cantidad/1)*$ValorUSD);
		echo '
		<p>Moneda: '.$nom_moneda.'</p>
		<p>Resultado de moneda local a dolar:'.$ResultadoLocalUSD.'  </p>

		<p>Resultado de dolar a moneda local:'.$ResultadoUSDLocal.' </p>
		';

	}else{
		echo '<script>
		swal({
		title: "Usted fallo con éxito",
		text: "No puede dejar campos vacios!",
		type: "error",
		confirmButtonText: "Continuar"
	
		}).then(function() {
		window.location = "Conversion.php";
		});
	</script>';	
	}
  ?>
            

</body>

</html>