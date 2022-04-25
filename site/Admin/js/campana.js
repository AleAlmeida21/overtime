$(document).ready(inicializo);

//Funcion principal de la página
function inicializo(){
    $("#btnGuardar").click(procesoGuardar);
    $("#btnChequear").click(procesoChequear);
    $("#btnRegresar").click(Regresar);
    $("#btnCerrar").click(cerrarAlert);
    $("#campFecSol" ).datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: false,        
        dateFormat: "yy-mm-dd"
    });
    $("#plaIniCamp" ).datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: false,        
        dateFormat: "yy-mm-dd"
    });    
    $("#plaFinCamp" ).datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: false,
        dateFormat: "yy-mm-dd"
    });      
    $("#btnAgregar").click(nuevoPlan);
    $("#btnGuardarMedio").click(guardarMedio);
}

function borrarMedio(){
    var pos = parseInt($(this).attr("alt"));
    lineas.splice(pos,1);
    cargoLineas();
}

function guardarMedio(){
    var linea = {};
    if($("#plaUbicacion").val()!="" && $("#plaMedio").val()!="" && $("#plaDispositivo").val()!="" && $("#plaFormato").val()!="" && $("#plaIniCamp").val()!="" && $("#plaFinCamp").val()!="" && $("#plaAdServ").val()!="" && $("#plaInversion").val()!="" && $("#plaKPI").val()!="" && $("#plaObjetivo").val()!=""){
        if($("#plaIniCamp").val() <= $("#plaFinCamp").val()){
            if(parseFloat($("#plaInversion").val())>0){
                if(parseFloat($("#plaObjetivo").val())>0){
                    linea['plaUbicacion'] = $("#plaUbicacion").val();
                    linea['plaMedio'] = $("#plaMedio").val();
                    linea['plaDispositivo'] = $("#plaDispositivo").val();
                    linea['plaFormato'] = $("#plaFormato").val();
                    linea['plaIniCamp'] = $("#plaIniCamp").val();
                    linea['plaFinCamp'] = $("#plaFinCamp").val();
                    linea['plaAdServ'] = $("#plaAdServ").val();
                    linea['plaInversion'] = $("#plaInversion").val();
                    linea['plaKPI'] = $("#plaKPI").val();
                    linea['plaObjetivo'] = $("#plaObjetivo").val();
                    linea['plaConjAnFB'] = $("#plaConjAnFB").val();

                    lineas.push(linea);
                    $("#planMedios").dialog("close");
                    cargoLineas();
                }
                else{
                    $.alert({
                            title: '¡Atención!',
                            content: 'El objetivo debe ser mayor a 0.',
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
                }                    
            }
            else{
                $.alert({
                        title: '¡Atención!',
                        content: 'La inversión debe ser mayor a 0.',
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
            }
        }
        else{
            $.alert({
                    title: '¡Atención!',
                    content: 'La fecha de inicio debe ser menor o igual a la de fin.',
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
        }
    }
    else{
	$.alert({
		title: '¡Atención!',
		content: 'Todos los datos son obligatorios.',
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
    }
}

function nuevoPlan(){
  $("#plaUbicacion").val('');
  $("#plaMedio").val(0);
  $("#plaDispositivo").val(0);
  $("#plaFormato").val(0);
  $("#plaIniCamp").val('');
  $("#plaFinCamp").val('');
  $("#plaAdServ").val('');
  $("#plaInversion").val(0);
  $("#plaKPI").val('');
  $("#plaObjetivo").val('');
  $("#plaConjAnFB").val('');
  
  $("#planMedios").dialog({
    appendTo: '#dialog',
    title: "Nuevo Medio",
    width: 500
  });
}

//Cierro el mensaje
function cerrarAlert(){
  $("#mensaje").removeClass("show");
  $("#mensaje").addClass("hide");  
}

// Funcion para enviar datos al servidor
function Regresar(){
    window.location = "campanas.php";
}

function procesoGuardar(){
    if($("#campAgencia").val()!="" && $("#cliId").val()!="" && $("#campNombre").val()!="" && $("#campFecSol").val()!="" && $("#campInvers").val()!=""){
        if(validateUrl($("#campLanding").val())){
            if(parseFloat($("#campInvers").val())>0){
                $.ajax({
                    type: "POST",
                    url: "actCampana.php",
                    data: {"campId" : $("#campId").val(), "campAgencia" : $("#campAgencia").val(), "accion" : $("#accion").val(), "cliId" : $("#cliId").val(), "campNombre" : $("#campNombre").val(), "campFecSol" : $("#campFecSol").val(), "campInvers" : $("#campInvers").val(), "campLanding" : $("#campLanding").val(), "campTargComent" : $("#campTargComent").val(), "lineasMedios" : lineas, "campIdFb" : $("#campIdFb").val(), "campEstado" : $("#campEstado").val()},
                    dataType: "json",
                    success: respuestaprocesoGuardar
                });   
                $("#btnGuardar").prop("disabled",true);
            }
            else{
                $.alert({
                        title: '¡Atención!',
                        content: 'La campaña debe tener inversión.',
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
            }
        }
        else{
            $.alert({
                    title: '¡Atención!',
                    content: 'La URL no tiene formato correcto.',
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
        }
    }
    else{
	$.alert({
		title: '¡Atención!',
		content: 'Todos los datos son obligatorios.',
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
    }
    
}

//Función respuesta al recibir respuesta del servidor
function respuestaprocesoGuardar(data){
    if(data['status']=="OK"){
        //Valido el usuario
        window.location = "campanas.php";
    }
    else{
        //Mensaje datos no validos     
        $("#mensaje").removeClass("hide");
        $("#mensaje").addClass("show"); 
        $("#btnGuardar").prop("disabled",false);
    }
}

function cargoLineas(){
    $("#cuerpo").empty();
    var inversion = 0;
    for(x=0;x<=lineas.length-1;x++){
        var linea = lineas[x];
        var fila = '<tr class="tr-shadow">';
        fila = fila + '<td>' + linea['plaUbicacion'] + '</td>';
        fila = fila + '<td>' + linea['plaMedio'] + '</td>';
        fila = fila + '<td>' + linea['plaDispositivo'] + '</td>';
        fila = fila + '<td>' + linea['plaFormato'] + '</td>';
        fila = fila + '<td>' + linea['plaIniCamp'] + '</td>';
        fila = fila + '<td>' + linea['plaFinCamp'] + '</td>';
        fila = fila + '<td>' + linea['plaAdServ'] + '</td>';
        fila = fila + '<td>' + linea['plaInversion'] + '</td>';
        fila = fila + '<td>' + linea['plaKPI'] + '</td>';
        fila = fila + '<td>' + linea['plaObjetivo'] + '</td>';
        //fila = fila + '<td>' + linea['plaConjAnFB'] + '</td>';
        fila = fila + '<td><div class="table-data-feature">';
        fila = fila + '<button type="button" data-placement="top" title="Borrar" alt="' + x + '" class="item btnBorrar">';
        fila = fila + '<i class="zmdi zmdi-delete"></i></button></div></td></tr><tr class="spacer"></tr>';
        $("#cuerpo").append(fila);
        inversion = inversion + parseFloat(linea['plaInversion']);
    }
    $(".btnBorrar").click(borrarMedio);
    $("#campInvers").val(inversion);
}

function procesoChequear(){
    campId = $("#campId").val();
    window.location = "chequeoCampana.php?id=" + campId + "&r=C"
    
}