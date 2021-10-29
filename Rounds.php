<?php
 session_start();

 if($_SESSION["Logueado!"]){

?>

    <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>

    
    <div class="formulario">
    <form action="Rounds.php" method="POST"  class="formulario">
    <input type="Submit" value="volver"name="but8"> <br>
    <center>
    <h1>Ver Personajes por Round:</h1><br>


<?php 

require("Conexion_Personajes.php");

$ID_J = $_SESSION['id']; ///traemos el ID del Jugador para la busqueda de SUS parsonajes. 

 $consult = "SELECT * FROM jugador "; 

 $resultados = mysqli_query($conexion,$consult);
 
 while($consulta = mysqli_fetch_array($resultados)){

   echo "<center> <table border=\"3\">

   <tr>
     <td><font color='blue'><b><center>Nombre:</center></b></font></td>
     <td><center>".$consulta['Nombre_Jugador']."</center></td>
     <td><center>".$consulta['ID_J']."</center></td>
   <tr>
    </table>";

 }

?>
<br>

                    <Label>Ingresar ID Jugador</Label>
                    
                    <select  id="ID" Name ="idjugador">
                        <option value = 16>16</option>
                        <option value = 17>17</option>
                        <option value = 18>18</option>
                        <option value = 19>19</option>
                        <option value = 20>20</option>
                        <option value = 21>21</option>
                        <option value = 22>22</option>
                        <option value = 23>23</option>
                        <option value = 24>24</option>
                        <option value = 25>25</option>
                        <option value = 26>26</option>
                        <option value = 27>27</option>
                        <option value = 28>28</option>
                
                    </select><br><br>

                        <Label>Elegir Escenario</Label>
                    
                            <select  id="ID" Name ="Escena">
                                <option value = "Namek">Namek</option>
                                <option value = "Tierra">Tierra</option>
                                <option value = "Kai-shin">Kai-shin</option>
                    

                            </select><br><br>


                       


                    <br><br>

                        <input type="Submit" value ="Ver Personaje" name="but9"><br><br>

                        
                    </form>
                </div>
            </center>    
        </body>
    </html>

    <?php

    if (isset($_POST['but9'])){  

        require("Conexion_Personajes.php");
        include("Escenario_Particular.php");

        $Escx = $_POST['Escena'];
        $IDJu  = $_POST['idjugador'];
        
        
        $consul = "SELECT * FROM personaje WHERE ID_Jugador = '$IDJu' "; 

        $resultadoxx = mysqli_query($conexion,$consul);

        while($consulta = mysqli_fetch_array($resultadoxx)){


            $Fuer = $consulta['Fuerza'];
            $Vel = $consulta['Velocidad'];
            $Hab = $consulta['Habilidad_Especial'];
            $At = $consulta['Ataque'];
            $Ago = $consulta['PoDepe'];

        

         $planeta = new Escenario_Particular(); 

            $planeta->Set_Escenario($Escx);

            $planeta->Set_EscenaFuerza($Fuer);
            $planeta->Set_EscenaVelocidad($Vel);
            $Porcen= $planeta->Get_EscenaAgotamiento();

            $Fuer2 = $planeta->Get_EscenaFuerza();
            $Vel2 = $planeta->Get_EscenaVelocidad();

            $PodepeActual= (($Fuer2 * $Vel2) / 500); 

            $final = ($PodepeActual - (($PodepeActual / 100) * $Porcen));


            echo "   <center> <table border=\"3\">
            <tr>
                </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            
                <td><font color='blue'><b><center>Nombre:</center></b></font></td>
                <td><center>".$consulta['Nombre']."</center></td>
                <td><b><center>Id de Jugador:</center></b></td>
                <td><center>".$consulta['ID_Jugador']."</center></td>
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

            <tr>
                </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            
                <td><font color='blue'><b><center>Escenario:</center></b></font></td>
                <td>$Escx</td>
                <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>

            <tr>
            </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <td></td><td></td><td></td>
            <td><font color='red'><b><center>Round 1</center></b></font></td>
            </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
                <td><b><center>Velacidad Act.</center></b></td>
                <td><b><center>Fuerza Act.</center></b></td>
                <td><b><center>Pod De Pelea.</center></b></td>
                <td><b><center>% de Agotamiento</center></b></td>
                <td><b><center>final</center></b></td>
            </tr>
            <tr>
                <td><center>".$Vel2."</center></td>
                <td><center>".$Fuer2."</center></td>
                <td><center>".$PodepeActual."</center></td>
                <td><center>".$Porcen."%"."</center></td>
                <td><center>".$final."</center></td>
            </tr>
            
        </table>

        <br><br> ";}

        
    }








if (isset($_POST['but8'])){  

        header ("location:Formulario_personaje.php"); 
    
    }
    
    ?>

    <?php

    }else{
        header('Location: index.php');
        exit;
    }




?>





