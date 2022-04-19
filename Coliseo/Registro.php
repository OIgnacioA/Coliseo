<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coliseo</title>
    <link rel="stylesheet" href="registro.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
  <body > 

    <div class="Login">

      <center>
      <form action="Registro.php" method="POST">
        <h1>Registro de Nuevo Jugador</h1>

        <label><b>Registre su Nombre </b></label><br>
        <input type="text" name="nombre" id='nom' placeholder ="Nombre"><br><br>

        <label><b>Elija contraseña</b></label><br>
        <input type="password" name="clave" id="password">



        <input type="button" name="wf" onclick="mostrar()" value="Ver">
        <br><br>

        <br><br>     <br>

        <input type="Submit" value="Registrarme" name="but"> <br> <br>

        <br><br>
        <input type="Submit" value="Volver a página Principal" name="but4">
      
       </center>

      </form>

    </div>

  </body>
<?php
  if (isset($_POST["but"])) {


  include("user-reg.php");

  $Name = $_POST['nombre'];
  $Pass = $_POST['clave'];


  if (mysqli_query($Konexion, " INSERT INTO jugador (Nombre, pass) values ('$Name', '$Pass')")){ 

    echo "se realizó el ingreso" ; 

  }else {

    echo "no se pudo realizar el ingreso" ; 

  }

  }

  if (isset($_POST["but4"])) {

  header ("location:index.php"); 

  }

  ?>

</html>

<script type="text/javascript">
function mostrar() {
  var tipo = document.getElementById("password");
  if(tipo.type == 'password'){
    tipo.type = 'text';
  }else{ 
    tipo.type = 'password'; 
  }
}
</script>