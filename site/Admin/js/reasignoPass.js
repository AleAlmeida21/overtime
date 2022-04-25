$(document).ready(inicializo);

//Funcion principal de la página
function inicializo(){
    $("#btnCambiar").click(procesoCambiar);
    $("#btnRegresar").click(procesoRegresar);
    $("#btnCerrar").click(cerrarAlert);
    $("#formulario").keydown(procesoPresionTecla);

}

function procesoPresionTecla(e){
    var tecla = e.which;
    if(tecla == 13){
        procesoCambiar();
    }
}

//Cierro el mensaje
function cerrarAlert(){
  $("#mensaje").removeClass("show");
  $("#mensaje").addClass("hide");  
}

// Funcion para enviar datos al servidor
function procesoCambiar(){
    if($("#nuevaClave").val()==$("#nuevaClave2").val()){
        $.ajax({
            type: "POST",
            url: "procesoreasignoClave.php",
            data: "nuevaClave=" + $("#nuevaClave").val(),
            dataType: "json",
            success: respuestaprocesoCambio
        });        
    }
    else{
        //Mensaje datos no validos     
        $("#mensaje").removeClass("hide");
        $("#mensaje").addClass("show");    
    }
}

//Función respuesta al recibir respuesta del servidor
function respuestaprocesoCambio(data){
    if(data['status']== "ERROR"){
        //Mensaje datos no validos     
        $("#mensaje").removeClass("hide");
        $("#mensaje").addClass("show");    
    }
    else{
        window.location = "index.php";
    }
}

function procesoRegresar(){
    window.location = "index.php";
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