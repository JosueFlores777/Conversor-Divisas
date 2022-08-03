<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="css/Style.php">    	
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" type="text/javascript"></script> 
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css"rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400"> 
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<link rel="stylesheet" href="css/tooplate-style.css">
	<title>Modificando datos</title>
</head>
<body class="Bod">
<script>
	var obj = { sta: false, ele: null };
        function Update(ev) {
            if (obj.sta) { return true; };
            swal({
                title: "Estas seguro de actualizar el registro?",
                text: "Si le aparece este mensaje es porque usted esta intentando modificar campos de un usuario",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Actualizar",
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
     //capturar el codigo a modificar
     $codigo = $_REQUEST['Codigo'];
 
//cargar la conexion y octener la conexion activa $mysql
     include('include/config.inc');
     $conexion = mysqli_connect($servidor,$usuario,$contrasena,$basededatos);
     mysqli_set_charset($conexion,"utf8");

     $query="call SelectPais_ID('$codigo');";
     $consulta=$conexion->query($query);
     $row=$consulta->fetch_assoc(); 
     mysqli_close($conexion);    

 ?>

     Informacion del registro seleccionada
     <form method = "post" name="frmvalor" action="Modificaralmacenamiento.php">
        
        Pais :  <input class="form-control"  placeholder="Codigo"  size="2" type="text" name="txtnombrep" value="<?php echo $row['Nombre'];?>"><br><br>
        Moneda :  <input class="form-control"  placeholder="Codigo"  size="2" type="text" name="txtnombreM" value="<?php echo $row['nombreM'];?>"><br><br>
        valor usd:<input class="form-control"  placeholder="Codigo"  size="2" type="text" name="txtusd" value="<?php echo $row['valorUsd'];?>"><br><br>    
        valor local:<input class="form-control"  placeholder="Codigo"  size="2" type="text" name="txtlocal" value="<?php echo $row['ValorLocal'];?>"><br><br>  
        <input type="text" name="txtcodigo" style="visibility:hidden" value="<?php echo $row['Codigo'];?>"><br><br>


 <br>

 <input type="submit" class="btnConver" onClick='return Update(this);' name="btnModificar" value="Modificar">
 
 <script src="../Conversor/js/Logic.js"></script>
</body>
</html>