<?php 
	
	$host = "localhost";
	$DataBase = "dbzColiseo" ;
	$Nombre = "root";
	$password = "";   


	$tabla_dbs2 = "jugador"; 	   
	

	
	
	$Konexion = new mysqli($host,$Nombre,$password,$DataBase);


	if ($Konexion->connect_errno) {
	    echo "No es posible la conexion con la Base de Datos....";
	    exit();
	}

?>