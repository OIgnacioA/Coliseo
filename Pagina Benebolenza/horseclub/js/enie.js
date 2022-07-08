$(document).ready(function() {
    
    $("#open").on("click" , function () {
        $(".overlay").fadeIn("slow");
    });

    $("#close").on("click" , function () {
        $(".overlay").fadeOut("slow");
    });

  

});