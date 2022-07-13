flag = true; 

flag = true; 
flag1 = true; 
flag2= true;

function AbrirCerrar_Cont(val){

    var n = val;

    if(flag== true){

        $(".overlay"+n).fadeIn("slow");
        flag = false; 
    }else {
       
        $(".overlay"+n).fadeOut("slow");
        flag = true; 
    }

}

function AbrirCerrar_Text(val){

    var n = val;

    if(flag1== true){

        $(".txtDescr_"+n).fadeIn("slow");
        flag1 = false; 
    }else {
       
        $(".txtDescr_"+n).fadeOut("slow");
        flag1 = true; 
    }

}

function cambiarTexto(){

   if(flag2==true){
     
    var elem = document.getElementById('button top-3').value = "Leer Menos";
    flag2 = false;
    console.log("menos");

   }else{

     var elem = document.getElementById('button top-3').value = "Leer Mas";
     flag2=true;
     console.log("mas");
   }


    

}


