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
          
            <center>

                <div class="formulario">
                    <form action="Duelo.php" method="POST"  class="formulario">
                    <h1>Duelo de Guerreros:</h1><br>

                    <Label>Ingresar ID 1er Guerrero</Label>
                   
                    <input type="number" value="ID" Name="idPersonaje_1"><br><br>

                    <Label>Ingresar ID 2do Guerrero</Label>
                   
                   <input type="number" value="ID" Name="idPersonaje_2"><br><br>
                  
                    

                        <Label>Elegir Escenario</Label>
                    
                            <select  id="ID" Name ="Escena">
                            <option value = ""></option>
                                <option value = "Namek">Namek</option>
                                <option value = "Tierra">Tierra</option>
                                <option value = "Kai-shin">Kai-shin</option>
                    

                            </select><br><br>

                            <input type="Submit" value ="Generar Duelo" name="but2"><br><br>

            </center> 
                    <br><br>

                        <input type="Submit" value="volver"name="but8"> 

                        <input type="Submit" value ="Ver personajes por Raza" name="but9">
                      
                        <select  id="Raza" Name="Raza">
                            <option value=""></option>   
                            <option value="Sayan">Sayan</option>
                            <option value="Namekiano">Namekiano</option>
                            <option value="Kioyin">Kioyin</option>
                            <option value="Humano">Humano</option>

                        </select>

                        <input type="Submit" value ="Ver Catalogo completo" name="but1">
                       <br><br>


                        <b>
                        
                    </form>
                </div>
              
        </body>
</html>

<?php

//jugador 1: carga: /////////////////////////////////////////////////////////////////////////////
if(isset($_POST['but2'])){  

    require("Conexion_Personajes.php");
    include("Escenario_Particular.php");

    $Escx = $_POST['Escena'];
    $Perso1 = $_POST['idPersonaje_1'];
    $Perso2 = $_POST['idPersonaje_2'];

   $consu = "SELECT p.ID,p.Nombre,p.Raza,p.Inmortalidad,p.Habilidad_Especial,p.PoDepe,p.Ataque,p.Fuerza,p.Velocidad,ju.Nombre_Jugador, ju.ID_J FROM `personaje` p 
        inner JOIN jugador ju on(ju.ID_J = p.ID_Jugador) 
        where p.ID = $Perso1 ;";

    $resultadd = mysqli_query($conexion,$consu);


    while($consulta = mysqli_fetch_array($resultadd)){

        $Fuer = $consulta['Fuerza'];
            $Vel = $consulta['Velocidad'];
            $Hab = $consulta['Habilidad_Especial'];
            $At = $consulta['Ataque'];
            $Ago = $consulta['PoDepe'];
            $Nom1 = $consulta['Nombre'];

        

         $planeta = new Escenario_Particular(); 

            $planeta->Set_Escenario($Escx);

            $planeta->Set_EscenaFuerza($Fuer);
            $planeta->Set_EscenaVelocidad($Vel);
            $Porcen= $planeta->Get_EscenaAgotamiento();

            $Fuer2 = $planeta->Get_EscenaFuerza();
            $Vel2 = $planeta->Get_EscenaVelocidad();

            $PodepeActual= (($Fuer2 * $Vel2) / 500); 

            $final_1 = ($PodepeActual - (($PodepeActual / 100) * $Porcen));

        echo "   <center> <table border=\"3\">
        <tr>
            </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        
            <td><font color='blue'><b><center>Nombre:</center></b></font></td>
            <td><center>".$consulta['Nombre']."</center></td>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <td><font color='blue'><b><center>Nombre de Entrenador:</center></b></font></td>
            <td><center>".$consulta['Nombre_Jugador']."</center></td>
            <td><center>".$consulta['ID_J']."</center></td>
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
        <center> <table border=\"3\">

            <tr>
                </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            
                <td><font color='blue'><b><center>Escenario:</center></b></font></td>
                <td>$Escx</td>
                <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>

            <tr>
            </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <td></td>
            <td><font color='green'><b><center>".$consulta['Nombre']."</center></b></font></td>
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
                <td><center>".$final_1."</center></td>
            </tr>
            
        </table>


    <br><br> ";

    }
    function resultado ($pri,$seg,$N1, $N2) {

        if($pri > $seg){

            echo "   <center> <table border=\"4\">
            <tr>
                <td><font color='green'><b><center>NombreGANADOR:</center></b></font></td>
                <td><center>".  $N1 ."</center></td>
            <tr>";
        }else if($pri < $seg){
        
            echo "   <center> <table border=\"4\">
            <tr>
                <td><font color='green'><b><center>NombreGANADOR:</center></b></font></td>
                <td><center>".  $N2 ."</center></td>
            <tr>";
        
        
        }else{  echo "   <center> <table border=\"4\">
            <tr>
                <td><font color='green'><b><center>Empate:</center></b></font></td>
               
            <tr>"; }
    }
    

//jugador 2: carga: /////////////////////////////////////////////////////////////////////////////


   $consu2 = "SELECT p.ID,p.Nombre,p.Raza,p.Inmortalidad,p.Habilidad_Especial,p.PoDepe,p.Ataque,p.Fuerza,p.Velocidad,ju.Nombre_Jugador, ju.ID_J FROM `personaje` p 
        inner JOIN jugador ju on(ju.ID_J = p.ID_Jugador) 
        where p.ID = $Perso2 ;";

    $resultaddd = mysqli_query($conexion,$consu2);


    while($consulta = mysqli_fetch_array($resultaddd)){

        $Fuer = $consulta['Fuerza'];
            $Vel = $consulta['Velocidad'];
            $Hab = $consulta['Habilidad_Especial'];
            $At = $consulta['Ataque'];
            $Ago = $consulta['PoDepe'];
            $Nom2 = $consulta['Nombre'];

        

         

            $planeta->Set_Escenario($Escx);

            $planeta->Set_EscenaFuerza($Fuer);
            $planeta->Set_EscenaVelocidad($Vel);
            $Porcen= $planeta->Get_EscenaAgotamiento();

            $Fuer2 = $planeta->Get_EscenaFuerza();
            $Vel2 = $planeta->Get_EscenaVelocidad();

            $PodepeActual= (($Fuer2 * $Vel2) / 500); 

            $final_2 = ($PodepeActual - (($PodepeActual / 100) * $Porcen));

        echo " <center> <table border=\"3\">

        <tr>
            </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        
            <td><font color='blue'><b><center>Escenario:</center></b></font></td>
            <td>$Escx</td>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <tr>

        <tr>
        </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <td></td>
        <td><font color='green'><b><center>".$consulta['Nombre']."</center></b></font></td>
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
            <td><center>".$final_2."</center></td>
        </tr>
        
    </table>
        
        
        <center> <table border=\"3\">
        <tr>
            </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        
            <td><font color='blue'><b><center>Nombre:</center></b></font></td>
            <td><center>".$consulta['Nombre']."</center></td>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <td><font color='blue'><b><center>Nombre de Entrenador:</center></b></font></td>
            <td><center>".$consulta['Nombre_Jugador']."</center></td>
            <td><center>".$consulta['ID_J']."</center></td>
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
       


    <br><br> ";

    }
    resultado($final_1, $final_2, $Nom1, $Nom2);

}

 



    if(isset($_POST['but9'])){  

        require("Conexion_Personajes.php");

        $Raza2 = $_POST['Raza'];

        $consul = "SELECT p.ID,p.Nombre,p.Raza,p.Inmortalidad,p.Habilidad_Especial,p.PoDepe,p.Ataque,p.Fuerza,p.Velocidad,ju.Nombre_Jugador, ju.ID_J FROM `personaje` p 
        inner JOIN jugador ju on(ju.ID_J = p.ID_Jugador) 
        where p.Raza = '$Raza2' ;"; 

        $resultadott = mysqli_query($conexion,$consul);


        while($consulta = mysqli_fetch_array($resultadott)){


            echo "   <center> <table border=\"3\">
            <tr>
                </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            
                <td><font color='blue'><b><center>Nombre:</center></b></font></td>
                <td><center>".$consulta['Nombre']."</center></td>
                <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
                <td><font color='blue'><b><center>Nombre de Entrenador:</center></b></font></td>
                <td><center>".$consulta['Nombre_Jugador']."</center></td>
                <td><center>".$consulta['ID_J']."</center></td>
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

        <br><br> ";

        }


    }

    if(isset($_POST['but1'])){  

     require("Conexion_Personajes.php");


     $consul = "SELECT p.ID,p.Nombre,p.Raza,p.Inmortalidad,p.Habilidad_Especial,p.PoDepe,p.Ataque,p.Fuerza,p.Velocidad,ju.Nombre_Jugador, ju.ID_J  FROM `personaje` p 
     inner JOIN jugador ju on(ju.ID_J = p.ID_Jugador) ;"; 

     $resultadoxt = mysqli_query($conexion,$consul);

        while($consulta = mysqli_fetch_array($resultadoxt)){


            echo "   <center> <table border=\"3\">
            <tr>
                </tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            
                <td><font color='blue'><b><center>Nombre:</center></b></font></td>
                <td><center>".$consulta['Nombre']."</center></td>
                <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
                <td><font color='blue'><b><center>Nombre de Entrenador:</center></b></font></td>
                <td><center>".$consulta['Nombre_Jugador']."</center></td>
                <td><center>".$consulta['ID_J']."</center></td>
                <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
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

        <br><br> ";

      }
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

