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
    window.location = "usuarios.php";
}

function procesoGuardar(){
    if($("#usuPass").val()!="" && $("#usuCorreo").val()!=""){
        $.ajax({
            type: "POST",
            url: "actUsuario.php",
            data: "usuId=" + $("#usuId").val() + "&usuPass=" + $("#usuPass").val() + "&usuRol=" + $("#usuRol").val() + "&usuCorreo=" + $("#usuCorreo").val() + "&accion=" + $("#accion").val() + "&usuAgencia=" + $("#usuAgencia").val(),
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
        window.location = "usuarios.php";
    }
    else{
        //Mensaje datos no validos     
        $("#mensaje").removeClass("hide");
        $("#mensaje").addClass("show"); 
    }
}

//	$.alert({
//		title: 'Alerta!',
//		content: 'Funcionando.',
//		icon: 'fa fa-rocket',
//		animation: 'scale',
//		closeAnimation: 'scale',
//		buttons: {
//			okay: {
//				text: 'Listo',
//				btnClass: 'btn-blue'
//			}
//		}
//	});      