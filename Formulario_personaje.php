<?php
session_start();
  
if($_SESSION["Logueado!"]){
 
echo "<center>" . 'Hola '  . $_SESSION['Usuario_N'] . '!' . "</center>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="Formulario_estiloxxxxx.css">
    
</head>
<body>

<div class="capa"></div>
<center>
<div class="formulario">


  <form action="Formulario_personaje.php" method="POST"  class="formulario">

   <h1>Gestor; creacion de tus personajes:</h1><br>

    <Label>Ingresar Nombre Del Personaje</Label><br>
    <input type="text" name="Nombre" placeholder="Nombre del Personaje"><br><br>

    <Label>Raza</Label><br>
    <select  id="Raza" Name="Raza">
        
      <option value="Sayan">Sayan</option>
      <option value="Namekiano">Namekiano</option>
      <option value="Kioyin">Kioyin</option>
      <option value="Humano">Humano</option>

    </select><br><br>

    <Label>Tipo de Ataque</Label><br>
    <select  id="Ataque" Name="Ataque">
        
      <option value="Ráfaga">Ráfaga</option>
      <option value="destructiva">destructiva</option>
      <option value="Física">Física</option>

    </select>
    
    <br><br>

    <label>Habilidad Extra</label><br>
    <select  id="habilidad_Extra" Name="Habilidad">
        
      <option value="Fisica">Fisica</option>
      <option value="Espiritual">Espiritual</option>
      <option value="Mental">Mental</option>

    </select>

    <br><br><br>

    <input type="Submit" value="Generar" name="but2"> <br><br>

    
    
    <input type="Submit" value ="Ver tus Personajes" name="but5">

    <br><br>

    <input type="Submit" value ="Ver Stags de todos los personajes" name="but10">

    <br><br>

    <input type="Submit" value ="Duelos" name="but11">

    <br><br>


    <label><a href="Cerrar_sesion.php">Cerrar Sesion</a></label>
    
  </form>
  
</div>
</center>    
</body>

<?php




if (isset($_POST['but2'])){  

  require("Conexion_Personajes.php");
 

  include("Guerrero.php");

  $persona=new Guerrero();

  $Nombre2 = $_POST['Nombre'];
  $Raza = $_POST['Raza'];
  $Ataque= $_POST['Ataque'];
  $HabilidadEx = $_POST['Habilidad'];//lo que va es el "name". 
 
   


  //$persona->set_Nombre($Nombre2);
  $persona->Set_Raza($Raza);
  $persona->set_HabilidadEx($HabilidadEx);
  $persona->set_Ataque($Ataque);
  


  $life = $persona->Get_Inmortalidad();
  $PoDep = $persona->Get_PoderDePelea();
  $Fue = $persona->Get_fuerza();
  $Vel = $persona->Get_Velocidad();
  


////agregado a guerrero.php los efectos de Habilidad especial y ataque: ////////////////////////////////////

 

    echo "   <center> <table border=\"2\">
    <tr>
    <td><b><center>Nombre</center></b></td>
    <td><b><center>Raza</center></b></td>
    <td><b><center>Tipo</center></b></td>
    <td><b><center>Habilidad Especial</center></b></td>
    <td><b><center>Poder de Pelea</center></b></td>
    <td><b><center>Tipo de ataque</center></b></td>
    </tr>

    <tr>
    <td><center>".$Nombre2."</center></td>
    <td><center>".$Raza."</center></td>
    <td><center>".$life."</center></td>
    <td><center>".$HabilidadEx."</center></td>
    <td><center>".$PoDep."</center></td>
    <td><center>".$Ataque."</center></td>
    </tr>
   
    </table>

   <br><br>, 
    

";


 //////////////////////optencion del ID de jugador //////////// 
 
 require("user-reg.php");                                                             

  $consultaID = "SELECT ID FROM jugador WHERE Nombre = '". $_SESSION['Usuario_N']."'";  
  
  $resultado = mysqli_query($Konexion,$consultaID);
  $consulta = mysqli_fetch_array($resultado);

  $ID_Jugador = $consulta['ID']; 
  $_SESSION['id'] = $consulta['ID']; 


  
///////////////////////////////////////////////////////////////    ingreso a la base de datos



if (mysqli_query($conexion, " INSERT INTO personaje (ID_Jugador, Nombre, Raza, Inmortalidad,  Habilidad_Especial, PoDePe, Ataque, Fuerza, Velocidad) values ( '$ID_Jugador', '$Nombre2', '$Raza', '$life', '$HabilidadEx', '$PoDep', '$Ataque', '$Fue', '$Vel' )")){ 

  echo "se realizó el ingreso de "  ; 

    include("Cerrar_BDUsuario.php");  
    include("Cerrar_Personaje.php");     

  }else {

    echo "no se pudo realizar el ingreso" ; 

    include("Cerrar_BDUsuario.php"); 
    include("Cerrar_Personaje.php"); 

  }

}



if (isset($_POST['but5'])){  
  header ("location:Ver_Personajes.php"); 
 
}

if (isset($_POST['but10'])){  
  header ("location:Rounds.php"); 
 
}

if (isset($_POST['but11'])){  
  header ("location:Duelo.php"); 
 
}

?>

</html>

<?php
  }else{
      header('Location: index.php');
      exit;
  }
?>