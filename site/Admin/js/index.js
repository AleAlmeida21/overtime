$(document).ready(inicializo);

//Funcion principal de la página
function inicializo(){
    $("#btnIngresar").click(procesoIngreso);
    $("#btnCerrar").click(cerrarAlert);
    $("#formulario").keydown(procesoPresionTecla);
}

function procesoPresionTecla(e){
    var tecla = e.which;
    if(tecla == 13){
        procesoIngreso();
    }
}

//Cierro el mensaje
function cerrarAlert(){
  $("#mensaje").removeClass("show");
  $("#mensaje").addClass("hide");  
}

// Funcion para enviar datos al servidor
function procesoIngreso(){
    if($("#usuId").val()!="" && $("#usuPass").val()!=""){
        if($("#usuRecordar").prop('checked')){
            usuRecordar = "S";
        }
        else{
            usuRecordar = "N";
        }
        $.ajax({
            type: "POST",
            url: "procesoLogin.php",
            data: "usuId=" + $("#usuId").val() + "&usuPass=" + $("#usuPass").val() + "&usuRecordar=" + usuRecordar,
            dataType: "json",
            success: respuestaprocesoIngreso
        });        
    }
    else{
        //Mensaje datos no validos     
        $("#mensaje").removeClass("hide");
        $("#mensaje").addClass("show");
    }
    
}

//Función respuesta al recibir respuesta del servidor
function respuestaprocesoIngreso(data){
    if(data['status']=="OK"){
        //Valido el usuario
        window.location = "principal.php";
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