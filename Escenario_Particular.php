<?php

require_once("Escenario_Base.php"); //esto estaria funcionando igual que en "include"



class Escenario_Particular extends Escenario_Base {
    


    function Escenario_Particular(){ 
  
        parent::__construct();  
    }


    //////////seters//////Getters /////////////////////////////////////////////// 



    public function Set_Escenario($Escena){//clima yendo de estable a inestable-menor a mayor- mas clima - fuerza. mas gravedad - velocidad. Mas tiempo + agotamiento


    
        if ($Escena =="Namek") {//penaliza velocidad y agotamiento
                
               
            $this->Clima -=1000; // + fuerza
            $this->Tiempo += 20; 
          
        }else if ($Escena =="Tierra") {//Penaliza la fuerza
      
       
            $this->Gravedad -=1000;// + velocidad
            $this->Tiempo += 0; 
            
                
        }else if ($Escena =="Kai-shin") {//Beneficia cansancio
    
               
            $this->Clima +=0;
            $this->Gravedad +=0;
            $this->Tiempo -=15; 
               
    }
   }


    function  Set_EscenaFuerza($Fuer){

        $this->fuer = ($Fuer - $this->Clima);
           
    }

    function  Set_EscenaVelocidad($Vel){

            
         $this->velo = ($Vel - $this->Gravedad);

    }

    function  Get_EscenaAgotamiento(){

        return  $this->Tiempo; 
    
    }




    function  Get_EscenaFuerza(){

        return $this->fuer;

    }

    function  Get_EscenaVelocidad(){

        return $this->velo;

    }
    




}
?>