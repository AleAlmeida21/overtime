$(document).ready(inicializo);

//Funcion principal de la página
function inicializo(){
    $("#btnAgregar").click(procesoAgregar);
    $(".btnEditar").click(procesoEditar);
    $(".btnBorrar").click(procesoBorrar);
    $("#btnConfirmar").click(accionBorrar)
    $("#filtro").change(cargoFiltro);
    $("#campEstado").change(cargoFiltro);
    $(".btnChequear").click(procesoChequear);
    $("#btnCheckAll").click(procesoChequearAll);
    
}

function cargoFiltro(){
    window.location = "campanas.php?f=" + $("#filtro").val() + "&e=" + $("#campEstado").val();
}

//Cierro el mensaje
function cerrarAlert(){
  $("#mensaje").removeClass("show");
  $("#mensaje").addClass("hide");  
}

// Funcion para enviar datos al servidor
function procesoAgregar(){
    window.location = "campana.php?a=a";
}

function procesoEditar(){
    var campId = $(this).attr("alt");
    window.location = "campana.php?a=e&id=" + campId;
}

function procesoBorrar(){
    var campId = $(this).attr("alt");
    $("#btnConfirmar").attr("alt",campId);
}

function accionBorrar(){
    var campId = $(this).attr("alt");
    window.location = "campana.php?a=b&id=" + campId;    
}

var campId;

function procesoChequear(){
        campId = $(this).attr("alt");
	$.confirm({
		title: '¡Importante!',
		content: '¿Desea generar una salida visual del proceso de chequeo?',
		icon: 'fa fa-rocket',
		animation: 'scale',
		closeAnimation: 'scale',
		buttons: {
			si: {
				text: 'Si',
				btnClass: 'btn-blue',
                                action: function(){
                                    screenLoader_Global();
                                    window.location = "chequeoCampana.php?id=" + campId + "&v=1";    
                                }
			},
                        no: {
				text: 'No',
				btnClass: 'btn-blue',
                                action: function(){
                                    screenLoader_Global();
                                    window.location = "chequeoCampana.php?id=" + campId + "&v=0";    
                                }
                               
                        }
		}
	});       
}

function procesoChequearAll(){
    screenLoader_Global();
    window.location = "chequeoCampana.php?v=0";    
}

/*-----------------------------------------------------
		global screen loader add/remove
------------------------------------------------------*/
function screenLoader_Global() {
  $('<div class="loader-mask"><div class="loader"></div></div>').appendTo('body');
}

function remove_screenLoader_Global() {
  $('.loader-mask').remove();
}

//    //display loader
//    screenLoader_Global();
//		//just for testing, remove loader
//    setTimeout(function() {
//      remove_screenLoader_Global();
//    }, 3000);