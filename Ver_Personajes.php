<?php

session_start();
  
if($_SESSION["Logueado!"]){
   
 //////////////////////optencion del ID de jugador //////////// 
 
 require("user-reg.php");                                                              

 $consultaID = "SELECT ID_J FROM jugador WHERE Nombre_Jugador = '". $_SESSION['Usuario_N']."'";  
 
 $resultado = mysqli_query($Konexion,$consultaID);
 $consulta = mysqli_fetch_array($resultado);

 $_SESSION['id'] = $consulta['ID_J']; 

//// este codi aparece dos veces en el proyecto: tarea: que se haga uan vez y se pueda "llamar" en cada caso.
 
//////////////////////////////////////////////////////////////

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body  background="stags.jpg">
<center>
<form action="Ver_Personajes.php" method="POST" >

    <input type="Submit" value="Formulario Principal" name="but6"><br><br>

</form> 

  

<?php 

   echo  "<center> Hola " . $_SESSION["Usuario_N"] . "! Estos son tus personjes creados <br><br> </center>" ;

   require("Conexion_Personajes.php");

   $ID_J = $_SESSION['id']; ///traemos el ID del Jugador para la busqueda de SUS parsonajes. 

    $consult = "SELECT * FROM personaje WHERE ID_Jugador = '$ID_J' "; 

    $resultados = mysqli_query($conexion,$consult);
    
    while($consulta = mysqli_fetch_array($resultados)){

      echo "<center> <table border=\"3\">

      <tr>
        </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <td><font color='blue'><b><center>Nombre:</center></b></font></td>
        <td><center>".$consulta['Nombre']."</center></td>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
      <tr>

      <tr>
      <td><b><center>Velocidad</center></b></td>
      <td><b><center>Fuerza</center></b></td>
      <td><b><center>Poder de Pelea</center></b></td>
      <td><b><center>Raza</center></b></td>
      <td><b><center>Habilidad Especial</center></b></td>
      <td><b><center>Tipo de ataque</center></b></td>
      <td><b><center>Tipo</center></b></td>
      <td><b><center>ID</center></b></td>
    </tr>


    <tr>
      <td><center>".$consulta['Velocidad']."</center></td>
      <td><center>".$consulta['Fuerza']."</center></td>
      <td><center>".$consulta['PoDepe']."</center></td>
      <td><center>".$consulta['Raza']."</center></td>
      <td><center>".$consulta['Habilidad_Especial']."</center></td>
      <td><center>".$consulta['Ataque']."</center></td>
      <td><center>".$consulta['Inmortalidad']."</center></td>
      <td><center>".$consulta['ID']."</center></td>
    </tr>

    </table>
   
    <br><br>
      

   ";
   
    }

?>
    

   
</center>

<?php

   if (isset($_POST['but6'])){  

    header ("Location:Formulario_personaje.php");
    

   }
?>


<label><a href="Cerrar_sesion.php">Cerrar Sesion</a></label><br><br>


</body>
</html>

<?php
  }else{
      header('Location: index.php');
      exit;
  }
?>