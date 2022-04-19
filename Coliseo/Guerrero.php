<?php

require_once("Estado_Base.php"); //esto estaria funcionando igual que en "include"



class Guerrero extends Estado_Base {
    


    function Guerrero(){ 
  
        parent::__construct();  
    }


    //////////seters//////Getters /////////////////////////////////////////////// 



    public function Set_Raza($Race){


    
        if ($Race =="Sayan") {
                
               
            $this->Fuerza += 3000; 
            $this->Velocidad +=2000;
              
          
        }else if ($Race =="Namekiano") {
    
                
            $this->Fuerza += 2000; 
            $this-> Velocidad +=3000;
            
                
        }else if ($Race =="Kioyin") {
    
               
            $this->Fuerza += 1000; 
            $this-> Velocidad +=4000;
            $this-> Inmortalidad= true;
               
    
        }else if ($Race =="Humano") {
    
            $this->Fuerza += 4000; 
            $this-> Velocidad +=1000;
               
        }
    }

  


    public function set_HabilidadEx($Habilidad){


            
    
        if ($Habilidad =="Fisica") {
                
               
            $this->Fuerza += 1000; 
            $this->Velocidad -=500;
              
          
        }else if ($Habilidad =="Espiritual") {
    
                
            $this->Fuerza += 500; 
            $this-> Velocidad +=500;
            
                
        }else if ($Habilidad =="Mental") {
    
               
            $this->Fuerza -= 500; 
            $this-> Velocidad +=1000;
               
    
        }

    }
  

   
    function set_Ataque ($Atack){

        $this->Ataque = $Atack; 

    }





    function  Get_Inmortalidad(){

        
        if($this->Inmortalidad == true ){

            $this->lifex = "Inmortal";  
            
        }else {

            $this->lifex = "Mortal" ; 

        }  

        return $this->lifex;
        

    }



    function Get_Fuerza() {


        return $this->Fuerza; 

    }


    function Get_Velocidad() {


        return $this->Velocidad; 

    }





    function Get_PoderDePelea(){

        $this->PoDepe =  (($this->Fuerza * $this->Velocidad)/500); 
        
        return $this->PoDepe; 

    }





}

    //  return "<center> - Nombre:  $this->Nombre   <br><br>  
    //    -El guerrero es de raza:    $this->Raza   <br><br> 
    //    -Poder de pelea promedio:" .  (($this->Fuerza * $this->Velocidad)/500) . " <br><br> 
    //    -Tipo de técnica:   $this->Ataque   <br><br>
    //     $this->lifex    <br><br>  
    //    -Tipo de habilidad :  $this->HabilidadEx <br><br> </center>" ;



?>


