$(document).ready(inicializo);

var nombreUsuario = "";

//Funcion principal de la página
function inicializo(){
    $("#pieAprovado").change(cambioEstado);
    //$("#notObserv").blur(cambioEstado);
    $(".lstPiezas").click(seleccionoPieza);
    //Abro el Modal
    $("#solicitoNombre").trigger('click');
    $("#btnConfirmar").click(cierroModal)
}

function cierroModal(){
   nombreUsuario = $("#txtNombre").val();
   if(nombreUsuario != ""){
        $("#nombreUsuario").html(nombreUsuario);
        $("#solicitoNombre").trigger('click'); 
   }
   else{
        $("#mensajeNombre").show();       
   }
}

function seleccionoPieza(){
    var pieId = $(this).attr("alt");
    var pieza = traigoPieza(pieId);
    $("#pieAprovado").val(pieza['pieAprovado']);
    $("#contenedorPieza").attr('src',pieza['pieURL']);
    $("#pieId").val(pieId);
    $("#selector").show();
    if($("#estado"+pieId).val()=="S"){
        $("#notObserv").prop('disabled', true);
        $("#pieAprovado").prop('disabled', true);
    }
    else{
        $("#notObserv").prop('disabled', false);
        $("#pieAprovado").prop('disabled', false);
    }
    $.ajax({
        type: "POST",
        url: "clienteVio.php",
        data: "pieId=" + $("#pieId").val() + "&nombreUsuario=" + nombreUsuario,
        dataType: "json",
        success: respuestaClienteVio
    });      
}

function respuestaClienteVio(data){ 
    if(data['status'] == "OK"){
        $("#visto" + data['pieId']).attr("src","imagenes/visto.png");
    }
    else{
        console.log("Error al actualizar Pieza: " + data['message'])
    }
}

function traigoPieza(pieza){
    var retorno = {};
    var pos = 0;
    var salir = false;
    while(pos <= piezas.length - 1 && !salir){
        if(piezas[pos]['pieId'] == pieza){
            retorno = piezas[pos];
            salir = true;
        }
        pos++;
    }
    return retorno;
}

// Funcion para enviar datos al servidor
function cambioEstado(){
    $.ajax({
        type: "POST",
        url: "cambioEstado.php",
        data: "pieId=" + $("#pieId").val() + "&pieAprovado=" + $("#pieAprovado").val() + "&notObserv=" + $("#notObserv").val() + "&nombreUsuario=" + nombreUsuario,
        dataType: "json",
        success: respuestaProcesoDatos
    });            
}

//Función respuesta al recibir respuesta del servidor
function respuestaProcesoDatos(data){
    if(data['status']=="OK"){
        //Que hacer si la respuesta fue la esperada
        piezas = data['piezas'];
	$.alert({
		title: '¡Información!',
		content: 'El estado y/o observacion se actualizó correctamente.',
		icon: 'fa fa-rocket',
		animation: 'scale',
		closeAnimation: 'scale',
		buttons: {
			okay: {
				text: 'Aceptar',
				btnClass: 'btn-blue'
			}
		}
	});        
        if($("#pieAprovado").val()=="S"){
            $("#pieAprovado").prop("disabled",true);
            $("#notObserv").prop("disabled",true);
        }
    }
    else{
        //Que hacer si no fue la respuesta esperada
	$.alert({
		title: '¡Atención!',
		content: 'No fue posible actualizar el estado y/o observación.',
		icon: 'fa fa-rocket',
		animation: 'scale',
		closeAnimation: 'scale',
		buttons: {
			okay: {
				text: 'Reintente',
				btnClass: 'btn-blue'
			}
		}
	});        
    }
}