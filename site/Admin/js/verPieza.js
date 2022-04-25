$(document).ready(inicializo);

//Funcion principal de la página
function inicializo(){
    $("#btnRefrescar").click(refrescarHistorial);
    $("#editarPieza").click(irEditarPieza);
    $("#btnRegresar").click(regresarPiezas);
}

function regresarPiezas(){
    window.location = "piezas.php?id=" + $("#camId").val();
}

// Funcion para enviar datos al servidor
function irEditarPieza(){
    window.location = "pieza.php?a=e&id=" + $("#pieId").val() + "&ca=" + $("#camId").val();
}

function refrescarHistorial(){
    $.ajax({
        type: "POST",
        url: "traigoNotificacionesHisto.php",
        data: "pieId=" + $("#pieId").val(),
        dataType: "json",
        success: respuestaproceso
    });            
}

//Función respuesta al recibir respuesta del servidor
function respuestaproceso(data){
    notificaciones =  data['notificaciones'];
    $("#listaNotifHisto").empty();
    $("#cantidadHisto").html(notificaciones.length);
    for(pos = 0; pos <= notificaciones.length-1; pos++){
        texto = '<div class="au-message__item ';
        if (notificaciones[pos]['notEstado'] == "N"){
            texto += ' unread';
        }
        texto += '">    <div class="au-message__item-inner">';
        texto += '        <div class="au-message__item-text">';
        texto += '            <div class="avatar-wrap">';
        texto += '                <i class="zmdi ';
        if(notificaciones[pos]['notTexto'] == "Se autorizó la pieza"){
            texto += 'zmdi-thumb-up';
        }
        else if(notificaciones[pos]['notTexto'] == "Se Rechazó la pieza"){
            texto += 'zmdi-thumb-down';
        }
        else{
            texto += 'zmdi-spinner';
        }
        texto += '"></i>';
        texto += '            </div>';
        texto += '            <div class="text">';
        quien = "sin dato";
        if(notificaciones[pos]['notiQuien'] != null){
            quien = notificaciones[pos]['notiQuien'];
        }
        texto += '                <h5><i>' + quien + ':</i> ' + notificaciones[pos]['notTexto'] + '</h5>';
        texto += '                <p>'
        if(notificaciones[pos]['notObserv'] != null){
            texto  += notificaciones[pos]['notObserv'];
        }
        else{
            texto += "&nbsp;";
        }
        texto += '              </p>';
        texto += '            </div>';
        texto += '        </div>';
        texto += '        <div class="au-message__item-time">';
        texto += '            <small><span>' + notificaciones[pos]['notFecHor'] + '</span></small>';
        texto += '        </div>';
        texto += '    </div>';
        texto += '</div>';
        $("#listaNotifHisto").append(texto);
    }
}