<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando datos en combobox</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" type="text/javascript"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css"rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="css/Style.php">
    <script>
     
    </script>
    
</head>

<body class="Conversion_body">
<script>
function Reset(){
        document.getElementById('combobox').selectedIndex = 0;
        document.querySelector('#TxtCantidad').value=" ";
    }

   
</script>


                  <div class="Contenedor">  
                    <br>
                    <form action="getdata.php" method="post">
                    
                    <select id="combobox"  name="combobox" >
                        <?php
                      include('include/config.inc');
                      $conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
                      mysqli_set_charset($conexion,"utf8");
                        
                        $query="SELECT * FROM Pais";
            
                        $resultado=mysqli_query( $conexion, $query ) or die ( "No se pueden mostrar los registros");
       
                        echo '<option>Elija una Opcion</option>';
                       
                       while ($row=mysqli_fetch_array($resultado))
                        {
                            
                            echo "<option value=".$row["Codigo"].">".$row["Nombre"]."</option>";
                        }
                       
                        ?>
                        
                    </select>
                   
                    
                    <p>Ingrese la cantidad</p>
                    <input type="number" name="TxtCantidad">
                    <br>
                    <br>
                    
                    <button class="btnConver">Convertir</button>
                   
                    </form>
                    <button class="btnLimpiar"  onclick="Reset();">Limpiar</button>
                    
</div>
    <script src="../Conversor/js/Logic.js"></script>
    <a href="javascript:location.reload(true)">Refresh</a>
</body>

</html>