<head>
	<title></title>
</head>
<body>
<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "prueba";
 
 
 function conectarBaseDeDatos($host,$user,$pass,$db)
	{
		$link=mysql_connect($host,$user,$pass) or die("Error al conectarse al servidor");
		mysql_select_db($db) or die("Error al conectarse la base de datos");
	
		return $link;
	}
	
	$enlace = conectarBaseDeDatos($host,$user,$pass,$db);
	
	if($enlace)
		echo "Conectado exitosamente";
		
	echo '<br><br>';	
	
	$query1= "SELECT * FROM usuario WHERE id > 1 AND id < 9";
	
	$consulta = mysql_query($query1 , $enlace);
	while ($fila = mysql_fetch_array($consulta)) 
	{
		echo $fila['id'] . " - " . $fila['nombre'] . " - " . $fila['clave'] . "<br>";			
	}
	
	echo '<br><br>';
	
	$query2= "INSERT INTO usuario (id, nombre, clave) VALUES (10,'cecy','cc'),(11,'flor','ff')";
	
	$consulta2=	mysql_query($query2,$enlace);
	
		if($consulta2)
			echo "Registros dados de alta";
		else
			echo "no se pudo dar de alta";
	
 ?>
 
 
</body>
</html>