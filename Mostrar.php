<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/Style.php">  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" type="text/javascript"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css"rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<title>Mostrando datos</title>
	
</head>
<body class="Bod">
<script >
			    var obj = { sta: false, ele: null };
        function EliminarR(ev) {
            if (obj.sta) { return true; };
            swal({
                title: "Estas seguro que desea eliminar el registro?",
                text: "Si le aparece este mensaje es porque usted esta intentando eliminar ",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Eliminar",
                closeOnConfirm: true
            },
function () {
    obj.sta = true;
    obj.ele = ev;
    obj.ele.click();
});
            return false;
        }
	</script>
	<?php
			include('include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
			mysqli_set_charset($conexion,"utf8");
			

			$query=" call SelectPais();";
			$resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
			echo"<table width='100%' border='1' align='center' height='15px'>";
			echo "<tr>";
			echo "<th>Codigo</th><th>Pais</th><th>Moneda</th> <th>Valor USD</th> <th>Valor local</th> <th>Eliminar</th><th>Modifcar</th>";
			echo "</tr>";

			while ($row=mysqli_fetch_array($resultado))
				{
				echo "<tr>";
				echo "<td>",$row['Codigo'],"</td>";	
				echo "<td>",$row['Nombre'],"</td>";				
				echo "<td>",$row['nombreM'],"</td>";
				echo "<td>",$row['valorUsd'],"</td>";
				echo "<td>",$row['ValorLocal'],"</td>";
				echo "<td>"."<a onClick='return EliminarR(this);'href='Eliminar.php?Codigo=".$row['Codigo']."'>Eliminar</a>"."</td>";
                 echo "<td>"."<a href='modificar.php?Codigo=".$row['Codigo']."'>Modificar</a>"."</td>";
 			
				echo "</tr>";
				}
			echo "</table>";
			
			// cerrar conexi�n de base de datos
			mysqli_close( $conexion );
		 
		 ?>
		<br><br><br>
		<CENTER>
		<script src="../Conversor/js/Logic.js"></script>
</body>
</html>