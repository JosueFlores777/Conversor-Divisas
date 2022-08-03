<html>
	<head>
        <title>Mostrar datos de tabla con MySQL</title>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<link rel="stylesheet" type="text/css" href="css/styl.php"> 

	</head>
	    <body >
             
		<?php
               include('include/config.inc');
			$conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
            mysqli_set_charset($conexion,"utf8");
         
			
            $query="select * from mostrar_tabla;";
            $resultado=mysqli_query($conexion,$query);
            echo"<table width='60%' border='1' align='center'>";
        
            echo "<th>Pais</th> <th>Moneda</th> <th>Dolar</th> <th>Local</th>";

            while ($row=mysqli_fetch_array($resultado))
            {
                echo "<tr align='center'>";                
                echo "<td>",$row['Nombre'],"</td>";
                echo "<td>",$row['nombreM'],"</td>";
                echo "<td>",$row['valorUsd'],"</td>";
                echo "<td>",$row['ValorLocal'],"</td>";
                echo "<tr>";
            }

        ?>

    </body >

</html>