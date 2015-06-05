<html>
	<head>
	        <title>Formulario de registro</title>
	</head>
	<body>
       
       	<br /><br />
        <h2>Sus datos son:</h2>
    <?php                  
            echo'<br/>';
            if (isset($_POST['nombre']))
            {
               $nombre= $_POST['nombre'];
               echo "$nombre";
            }      
            echo'<br/>';   
            if (isset($_POST['apellido']))
            {
               $apellido = $_POST['apellido'];
               echo "$apellido";
            }
            echo'<br/>';           
            if (isset($_POST['dni']))
            {
               $dni = $_POST['dni'];
                echo "$dni";
            }              
            echo'<br/>';           
            if (isset($_POST['email']))
            {
                    $email = $_POST['email'];
                    echo "email";  
            } 
            echo'<br/>';
            if (isset($_POST['sexo']))
            {
               $sexo = $_POST['sexo'];
               echo "$sexo";
            }
            echo'<br/>';
          if (isset($_POST['dia']))
            {
               $dia = $_POST['dia'];
               echo "$dia";
            }
            echo'<br/>';
            if (isset($_POST['mes']))
            {
               $mes = $_POST['mes'];
               echo "$mes";
            }
            echo'<br/>';
            if (isset($_POST['anio']))
            {
               $anio = $_POST['anio'];
               echo "$anio";
            }                

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "base";
   
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
   	$email=$_POST['email'];
    $sexo=$_POST['sexo'];
    $dia=$_POST['dia'];
    $mes=$_POST['mes'];
    $anio=$_POST['anio'];
    $fecha=strtotime($dia.$mes.$anio);
  
    $enlace = conectarBaseDeDatos($host,$user,$pass,$db);
   
    if($enlace)
            echo "<br> Conectado exitosamente";
           
    echo '<br><br>';       
   
    //$cadena = "INSERT INTO cliente2 ('nombre','apellido','dni','email','sexo') VALUES ('$nombre','$apellido',$dni,'$email',$sexo)";
  	//$cadena = "INSERT INTO cliente2 (nombre,apellido,dni,sexo) VALUES ($nombre,$apellido,$dni,$sexo)";
      $cadena = "INSERT INTO cliente2 (nombre,apellido,email,dni,sexo,fecha) VALUES ('$nombre','$apellido','$email','$dni','$sexo','$fecha')"; 
   $consulta = mysql_query($cadena,$enlace); 
   $registros=mysql_affected_rows();  
   //echo mysql_error($enlace); 
   echo mysql_errno($enlace) . ": " . mysql_error($enlace). "\n";    
            if($registros == 1)
            {
				echo "<br> Registros dados de alta";
			}                    
            else
            {
				echo "no se pudo dar de alta"; 
			}
    echo '<br><br>';       

   
     
    function conectarBaseDeDatos($host,$user,$pass,$db)
    {
            $link=mysql_connect($host,$user,$pass) or die("Error al conectarse al servidor");
            mysql_select_db($db) or die("Error al conectarse la base de datos");
           
            return $link;
    }      
                      
?>

