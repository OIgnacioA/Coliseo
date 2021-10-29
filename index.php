
<html lang="en">

  <head> 
    <meta charset="UTF-8">
    <title>Coliseo</title>
    <link rel="stylesheet" href="index.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>
  
  <body  background="indexFondo.jpg">    

   <center>

    <form action="index.php" method="POST">
      <h1>Iniciar Sesión</h1>


        <label>Ingrese su nombres </label><br>
        <input type="text" name="Usuario"  placeholder ="Nombre"><br>
      
        <label for="password">Ingrese su contraseña</label><br>
        <input type="password" name="clave" id="password">



      <input type="button" name="wf" onclick="mostrar()" value="Ver">
      <br><br>

      <input type="Submit" value="Ingresar" name="but"><br><br><br>
      <br><br><br><br>

      <a href="Registro.php" id="frase"><u>No account? Create one!</a></u></P>

      
        
    </form>
    </center>
  </body>

  <?php

    session_start(); 

    if (isset($_POST["Usuario"])  && isset($_POST['clave']) )  {

      include("user-reg.php");

      $rs = mysqli_query($Konexion, "SELECT Nombre_Jugador FROM jugador WHERE Nombre_Jugador = '".$_POST['Usuario']."'  AND pass =  '".$_POST['clave']."';");

      $alta = mysqli_num_rows($rs); // reemplazo de la variable (!$rs) qule daba siempre positivo

      if($alta == 1){
        
        $_SESSION["Logueado!"] = true; 
        $_SESSION["Usuario_N"] = $_POST["Usuario"];  
        header ("location:Formulario_personaje.php"); 
        
        
      }else{ 
      
        echo  "<center>  <p style=color:red> El usuario o la contraseña  Ingresados No son Correctos </p></center>";  
    
      }
      
      

    

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