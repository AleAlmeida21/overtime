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
    window.location = "clientes.php";
}

function procesoGuardar(){
    if($("#cliNombre").val()!="" && $("#cliAgencia").val()!="" && $("#cliFbId").val()!=""){
        $.ajax({
            type: "POST",
            url: "actCliente.php",
            data: "cliId=" + $("#cliId").val() + "&cliNombre=" + $("#cliNombre").val() + "&accion=" + $("#accion").val() + "&cliAgencia=" + $("#cliAgencia").val() + "&cliFbId=" + $("#cliFbId").val(),
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
        window.location = "clientes.php";
    }
    else{
        //Mensaje datos no validos     
        $("#mensaje").removeClass("hide");
        $("#mensaje").addClass("show"); 
    }
}
      