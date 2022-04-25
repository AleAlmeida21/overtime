$(document).ready(inicializo);

//Funcion principal de la página
function inicializo(){
    $("#btnGuardar").click(procesoGuardar);
    $("#btnRegresar").click(Regresar);
    $("#btnCerrar").click(cerrarAlert);
    $("#formulario").keydown(procesoPresionTecla);
}

function procesoPresionTecla(e){
    var tecla = e.which;
    if(tecla == 13){
        procesoGuardar();
    }
}

//Cierro el mensaje
function cerrarAlert(){
  $("#mensaje").removeClass("show");
  $("#mensaje").addClass("hide");  
}

//Cierro el mensaje
function cerrarAlert(){
  $("#mensaje").removeClass("show");
  $("#mensaje").addClass("hide");  
}

// Funcion para enviar datos al servidor
function Regresar(){
    window.location = "acceso.php";
}

function procesoGuardar(){
    if($("#appid").val()!="" && $("#secret").val()!="" && $("#token").val()!=""){
        $.ajax({
            type: "POST",
            url: "actAcceso.php",
            data: "appid=" + $("#appid").val() + "&secret=" + $("#secret").val() + "&token=" + $("#token").val(),
            dataType: "json",
            success: respuestaprocesoGuardar
        });        
    }
    else{
        //Mensaje datos no validos     
        $("#mensaje").removeClass("hide");
        $("#mensaje").addClass("show");
    }
}

//Función respuesta al recibir respuesta del servidor
function respuestaprocesoGuardar(data){
    if(data['status']=="OK"){
        //Valido el usuario
        window.location = "acceso.php";
    }
    else{
        //Mensaje datos no validos     
        $("#mensaje").removeClass("hide");
        $("#mensaje").addClass("show"); 
    }
}
      