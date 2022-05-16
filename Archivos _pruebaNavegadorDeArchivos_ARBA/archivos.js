function comenzar(){

    zonadatos=document.getElementById("zonadatos");
    var archivos=document.getElementById("archivos");
    archivos.addEventListener("change", procesar, false);

}

function procesar (e){

    var archivos=e.target.files;
    var mi_archivo = archivos[0];

    var lector = new FileReader();

    lector.readAsText(mi_archivo);

    lector.addEventListener("load", mostrar_en_web, false);



    /* type.match:  ver que tipo de archivo es el seleccionado. 
   
    alert(mi_archivo.type);

    //alert que ve que no se trata de determinado tipo de archivo. 

   if (!mi_archivo.type.match(/image/)) {

        alert ("selecciona una imagen por favor");

   }
   
   /*else { //nombre y tamaño del archivo en pantalla

    zonadatos.innerHTML+="nombre del archivo: " + mi_archivo.name + "<br>";
    zonadatos.innerHTML+="Tamaño del archivo: " + Math.round(mi_archivo.size/1024) + "Kb  <br>";

    var lector = new FileReader(); 

    lector.readAsDataURL(mi_archivo);


    lector.addEventListener("load", mostrar_en_web, false);


   }

*/

}


function mostrar_en_web(e){

    var resultado = e.target.result;
    
   // zonadatos.innerHTML+="<img src=' " + resultado + "' width='85%' > ";

    zonadatos.innerHTML=resultado;


}

window.addEventListener("load", comenzar, false);