<?php


$host = "localhost";
$DataBase = "dbzColiseo" ;
$Nombre = "root";
$password = "";
 
$tabla_db1 = "personaje"; 

$conexion = new mysqli($host,$Nombre,$password,$DataBase);
 

if ($conexion->connect_errno){ 


    echo "no se ha podido realizar la conexion";
    exit(); 

}



?>