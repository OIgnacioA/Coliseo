<?php
class Estado_Base {

    protected  $Nombre; 
    protected  $Fuerza;
    protected  $Velocidad;
    protected  $Raza;
    protected  $Ataque; 
    protected  $Inmortalidad;  
    protected  $HabilidadEx;
   


    function Estado_Base() {

        $this->Nombre="desconocido";
        $this->Fuerza=1000; 
        $this->Velocidad=1000;
        $this->Raza="desconocida" ;
        $this->Ataque="desconocido";
        $this->Inmortalidad=false;
        $this->HabilidadEx = "desconocida";

    }

}

?>