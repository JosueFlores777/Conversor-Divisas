<html>

    <head>
        <title>CREACION BD</title>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="css/styl.php">  
  </head>
    <body>
        <?php
		$usuario = "root";
    $password = "";
    $servidor = "localhost";
    $basededatos = "test";
   
    // creación de la conexión a la base de datos con mysql_connect()
    $conexion = mysqli_connect( $servidor, $usuario, $password) or die ("No se ha podido conectar al servidor de Base de datos");
   
    // Selección de la base de datos a utilizar
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	
	//Realizando la consulta para crear una BD si es que no existe
	$consulta="CREATE DATABASE IF NOT EXISTS BaseTarea;";
	$EjecutarConsulta = mysqli_query( $conexion, $consulta ) or die ( "No se pudo crear la base de datos"); 

  //Verificando si la BD se creo.
  if ($EjecutarConsulta)
  // echo ("La BD fue creada de Forma satisfactoria.<br>");
  $a=1;
 else
 {
   $a=2;
   echo ("Surgio problema para crear la BD.<br>");
   echo ("El problema es: <br>");
   echo ("Codigo de error: <b>". mysql_errno ()."</b><br>");
   echo ("Descripcion de error: <b>". mysql_error ()."</b><br>");
 }
   $basededatos = "BaseTarea";
  
   $db = mysqli_select_db( $conexion, $basededatos );


$consulta="CREATE TABLE Pais(Codigo INT PRIMARY KEY AUTO_INCREMENT, 
Nombre varchar(50) Not null);";


	$EjecutarConsulta = mysqli_query( $conexion, $consulta ) ; 


if ($EjecutarConsulta)
$b=1;

else
{
  $b=2;
}


$consulta="CREATE TABLE Moneda(id int  PRIMARY KEY AUTO_INCREMENT, 
nombreM varchar(50) Not null,
valorUsd float Not null,
ValorLocal float Not null);";
$EjecutarConsulta = mysqli_query( $conexion, $consulta ); 

//procedimientos almacenados

 



$consulta="CREATE PROCEDURE DeletePais
 ( 
    IN par_codigo INT
  )
  delete from  Pais  where Codigo  = par_codigo";
  $EjecutarConsulta = mysqli_query($conexion, $consulta) or die ("No se pudo crear el SP Deletepais");
  

  
  $consulta="CREATE PROCEDURE DeleteMoneda
  ( 
     IN par_codigo INT
   )
   delete from  Moneda  where id  = par_codigo";
   $EjecutarConsulta = mysqli_query($conexion, $consulta) or die ("No se pudo crear el SP DeleteMoneda");

 


   $consulta="CREATE PROCEDURE DeletePais2
   ( 
      IN par_codigo INT
    )
  delete a1, a2 from pais as a1 inner join moneda as a2 where a1.Codigo=a2.id and a1.Codigo = par_codigo;";
  $EjecutarConsulta = mysqli_query($conexion, $consulta) or die ("No se pudo crear el SP Deletepais2");



 
 $consulta="CREATE PROCEDURE InsertPais
( 
    IN par_Nombre VARCHAR(50)
)
 
insert into Pais ( Nombre)
values (par_Nombre)";

$EjecutarConsulta = mysqli_query($conexion, $consulta) or die ("No se pudo crear el SP InsertPais");

$consulta="CREATE PROCEDURE InsertMoneda
( 

    IN nombreM varchar(50),
    IN valorUsd float,
    IN  ValorLocal float

)
insert into Moneda ( nombreM,valorUsd,ValorLocal)
values (nombreM,valorUsd,ValorLocal)";
$EjecutarConsulta = mysqli_query($conexion, $consulta) or die ("No se pudo crear el SP InsertMoneda");




//Verificando si la tabla se creo.
if ($EjecutarConsulta)
$c=1;
else
{
  $c=2;
}
$consulta="CREATE PROCEDURE  Seleccion
(
  IN par_Nombre  varchar(120)
)
SELECT * FROM Pais
where Nombre = par_Nombre;";
$EjecutarConsulta = mysqli_query( $conexion, $consulta ); 

//Verificando si la tabla se creo.
if ($EjecutarConsulta)
$d=1;
else
{
  $d=2;
}
$consulta="CREATE PROCEDURE ListarPais
(
)
SELECT Nombre  FROM Pais;";
$EjecutarConsulta = mysqli_query( $conexion, $consulta ); 
//Verificando si la tabla se creo.
if ($EjecutarConsulta)
$e=1;
else
{
  $e=2;

}

//Insert
$consulta= "INSERT into pais(nombre)
VALUES
('El Salvador'),
('Honduras'),
('Costa Rica'),
('Nicaragua'),
('Guatemala');";
$EjecutarConsulta = mysqli_query( $conexion, $consulta ); 
if ($EjecutarConsulta)
$f=1;
else
{
  $f=2;

}
$consulta= "INSERT into moneda(nombreM,valorUsd,ValorLocal)
VALUES('Colon SV',0.11,8.75),
('Lempira',0.041,24.30),
('Colon CR',0.0017,601.61),
('Córdoba',0.029,34.86),
('Quetzal',0.13,7.82);";
$EjecutarConsulta = mysqli_query( $conexion, $consulta );
if ($EjecutarConsulta)
$g=1;
else
{
  $g=2;

}
//vista tabla
$consulta="CREATE VIEW mostrar_tabla
as
SELECT p.Nombre,m.nombreM,m.valorUsd,m.ValorLocal
from pais p INNER JOIN moneda m on p.Codigo= m.id;";
$EjecutarConsulta = mysqli_query( $conexion, $consulta );
if ($EjecutarConsulta)
$h=1;
else
{
  $h=2;

}



$consulta="CREATE PROCEDURE SelectPais
  ( 
    
  )
  SELECT p.Codigo, p.Nombre,m.nombreM,m.valorUsd,m.ValorLocal
from pais p INNER JOIN moneda m on p.Codigo= m.id;";

$EjecutarConsulta = mysqli_query($conexion, $consulta) or die ("No se pudo crear el SP SelectPais");


 $consulta="CREATE PROCEDURE SelectMoneda
  ( 
    
  )
  SELECT * FROM Moneda";

$EjecutarConsulta = mysqli_query($conexion, $consulta) or die ("No se pudo crear el SP SelectMoneda");

$consulta="CREATE PROCEDURE UpdatePais_Moneda
 ( 
    IN Codigo INT,
    IN par_nombre VARCHAR(50),
    IN par_NombreM VARCHAR(50),
    IN par_Valorusd float,
    IN par_Valorlo float

  )
 
update pais p INNER JOIN moneda m on p.Codigo= m.id set p.Nombre= par_nombre, m.nombreM= par_nombreM,m.valorUsd= par_Valorusd,m.ValorLocal=par_Valorlo where p.Codigo = Codigo";

$EjecutarConsulta = mysqli_query($conexion, $consulta) or die ("No se pudo crear el SP UpdatePais_Moneda");

$consulta="CREATE PROCEDURE  SelectPais_ID
  (
    IN par_idpais INT
  )
  SELECT p.Codigo, p.Nombre,m.nombreM,m.valorUsd,m.ValorLocal
from pais p INNER JOIN moneda m on p.Codigo= m.id
  where p.Codigo = par_idpais;";
  
   $EjecutarConsulta = mysqli_query( $conexion, $consulta ) or die ( "No se pudo crear el procedimiento almacenado SelectPaisPorID ");





   $consulta="CREATE PROCEDURE Mostrar_Moneda
   ( 
      IN codigo int
    )
    SELECT  p.Nombre,m.nombreM,m.valorUsd,m.ValorLocal
from pais p INNER JOIN moneda m on p.Codigo= m.id
  where p.Codigo = codigo;";
   $EjecutarConsulta = mysqli_query($conexion, $consulta) or die ("No se pudo crear el SP Mostrar moneda");






   
if ($a==1 && $b==1 && $c==1 && $d==1 && $e==1 && $f==1 && $g==1 && $h==1 )
  echo '<script>
  swal({
    title: "Buen trabajo",
    text: "Todos los procesos se crearon con éxito!",
    type: "success",
    confirmButtonText: "Continuar"

  }).then(function() {
    window.location = "Index.html";
  });
</script>';
  else
  {
    echo '<script>
    swal({
      title: "Usted fallo con éxito!!!",
      text: "Error problamente ya existen los datos!",
      type: "error",
      confirmButtonText: "Continuar"
  
    }).then(function() {
      window.location = "Index.html";
    });
  </script>';
  }

        ?>
    </body>
</html>
