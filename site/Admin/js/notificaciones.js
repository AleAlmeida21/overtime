$(document).ready(inicializo);

var manejador;

function inicializo(){
    $(".btnAceptarNoti").click(cambioEstadoNotificacion);
    manejador = window.setInterval(actualizoNotificaciones,10000);
}

function actualizoNotificaciones(){
    $.ajax({
        type: "POST",
        url: "traigoNotificaciones.php",
        data: "",
        dataType: "json",
        success: respuestaCambioEstadoNoti
    });     
}

function cambioEstadoNotificacion(){
    var notId = $(this).attr("alt");
    $.ajax({
        type: "POST",
        url: "cambioEstadoNotif.php",
        data: "notId=" + notId,
        dataType: "json",
        success: respuestaCambioEstadoNoti
    }); 
}

function respuestaCambioEstadoNoti(data){
    if(data['status']=="OK"){
        recargoNotificaciones(data['notificaciones']);
    }
}

function recargoNotificaciones(notificaciones){
    $("#contenedorNotif").html("<div class='notifi__title'><p>Hay " + notificaciones.length + " Notifiacione/s</p></div>");
    if(notificaciones.length>0){
        $("#cantidadNotificaciones").show();
        $("#cantidadNotificaciones").html(notificaciones.length);
    }
    else{
        $("#cantidadNotificaciones").hide(); 
    }
    for(pos = 0; pos <= notificaciones.length-1; pos++){
        texto = '<div class="notifi__item">';
        texto += '<div class="';
        if (notificaciones[pos]['notTexto'] == "Se autorizó la pieza"){
            texto += 'bg-c1';
        }
        else if (notificaciones[pos]['notTexto'] == "Se Rechazó la pieza"){
            texto += 'bg-c2';
        } 
        else{
            texto += 'bg-c3';
        }
        texto += ' img-cir img-40">';
        texto += '<i class="zmdi ';
        if (notificaciones[pos]['notTexto'] == "Se autorizó la pieza"){
            texto += 'zmdi-thumb-up';
        }
        else if (notificaciones[pos]['notTexto'] == "Se Rechazó la pieza"){
            texto += 'zmdi-thumb-down';
        }
        else{
            texto += 'zmdi-spinner';
        }
        texto += '"></i>';
        texto += '</div>';
        texto += '<div class="content">';
        texto += '<p><a href="verPieza.php?id=' + notificaciones[pos]['pieId'] + '&ca=' + notificaciones[pos]['camId'] + '">' + notificaciones[pos]['notiQuien'] + ": " + notificaciones[pos]['notTexto'] + ' ' + notificaciones[pos]['pieNombre'] + ' (' + notificaciones[pos]['camNombre'] + ')</a></p>';
        if(notificaciones[pos]['notObserv'] != null){
            texto += '</p>' + notificaciones[pos]['notObserv'] + '</p>';
        }
        texto += '<button type="button" class="btn btn-sm btn-outline-success btnAceptarNoti" alt="' + notificaciones[pos]['notId'] + '" >';
        texto += '<small style="font-size: xx-small">Aceptar</small>';
        texto += '</button>';
        texto += '<span class="date">&nbsp;&nbsp;' + notificaciones[pos]['notFecHor'] + '</span>';
        texto += '</div>';
        texto += '</div>';
        $("#contenedorNotif").append(texto);
    }
    $(".btnAceptarNoti").click(cambioEstadoNotificacion);
}