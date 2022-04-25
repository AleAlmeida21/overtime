$(document).ready(inicializo);

//Funcion principal de la página
function inicializo(){
    $("#btnRegresar").click(Regresar);
    $("#btnCerrar").click(cerrarAlert);
}

//Cierro el mensaje
function cerrarAlert(){
  $("#mensaje").removeClass("show");
  $("#mensaje").addClass("hide");  
}

// Funcion para enviar datos al servidor
function Regresar(){
    destino = $(this).attr("alt");
    window.location = destino;
}

      