<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" type="text/javascript"></script> 
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css"rel="stylesheet" />
	<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<link rel="stylesheet" type="text/css" href="css/styl.php">
	<title>Eliminando base de datos</title>
</head>
<body>

	  <?php
         $usuario = "root";
		 $password = "";
		 $servidor = "localhost";
		 $basededatos = "test";
		 $conexion = mysqli_connect( $servidor, $usuario, $password);
		 $Consulta="DROP DATABASE BaseTarea;";
		 $EjecutarConsulta = mysqli_query( $conexion, $Consulta );
	
	 if ( $EjecutarConsulta) {
		echo 
		'<script>
			swal({
				title: "Enhorabuena!!!",
				text: "La base de datos se ha eliminado con exito.",
				type: "success"
			}).then(function() {
				window.location = "Index.html";
			});
		</script>';
	} else {
		echo '<script>
		swal({
			  title: "Error",
			  text: "Error base de datos ya no existe!",
			  type: "error",
			  confirmButtonText: "Continuar"

		}).then(function() {
			  window.location = "index.html";
		});
	</script>';
	}
         mysqli_close($conexion);
      ?>

</body>
</html>