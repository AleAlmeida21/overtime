$(document).ready(inicializo);

//Funcion principal de la página
function inicializo(){
    $("#btnRecordar").click(procesoRecordar);
    $("#btnRegresar").click(procesoRegresar);
    $("#btnCerrar").click(cerrarAlert);
    $("#formulario").keydown(procesoPresionTecla);
}

function procesoPresionTecla(e){
    var tecla = e.which;
    if(tecla == 13){
        procesoRecordar();
    }
}

//Cierro el mensaje
function cerrarAlert(){
  $("#mensaje").removeClass("show");
  $("#mensaje").addClass("hide");  
}

// Funcion para enviar datos al servidor
function procesoRecordar(){
    if($("#usuId").val()!=""){
        if($("#usuRecordar").prop('checked')){
            usuRecordar = "S";
        }
        else{
            usuRecordar = "N";
        }
        $.ajax({
            type: "POST",
            url: "procesoRecordar.php",
            data: "usuId=" + $("#usuId").val(),
            dataType: "json",
            success: respuestaprocesoRecordar
        });        
    }
    //Mensaje datos no validos     
    $("#mensaje").removeClass("hide");
    $("#mensaje").addClass("show");    
}

//Función respuesta al recibir respuesta del servidor
function respuestaprocesoRecordar(data){
    //do nothing
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