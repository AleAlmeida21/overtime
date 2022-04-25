<?php

/*
 * Abro la sesion donde lo necesito
 */

session_start();

/*
 * Incluyo dependencias para la página
 */

require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/campanas.php");
require_once("../libs/recordsets/usuarios.php");
require_once("../libs/recordsets/notificaciones.php");
require_once("../includes/validaciones/seguridad.php");
require_once("../includes/mail/sendMail.php");

/*
 * Traigo los datos
 */

$camId = cleanXSS($_POST["id"]);

/*
 * 
 */

$campanas = new Campanas();
$campana = new Campana();
$usuarios = new Usuarios();
$usuario = new Usuario();

$campana = $campanas->traerPorId($camId);

if($campana){
    $campana->camCerrada="S";
    $camNombre = $campana->camNombre;
    if($campana->actualizar()){
        $notificaciones = new Notificaciones();
        $notificacion = new Notificacion();
        $notificacion->notIp = getClientIP();
        $notificacion->notEstado = "N"; 
        $notificacion->notiQuien = $_SESSION['usuId'];
        $notificacion->notTexto = "Se Cerro la Campaña: " . $camNombre;        
        //$notificacion->pieId = $pieId;
        if($notificacion->insertar()){            
                $lstNotificaciones = $notificaciones->traerTodosDatos();
                $respuesta = array("status" => "OK", "message" => "", "notificaciones" => $lstNotificaciones);        
                $usuario = $usuarios->traerPorId($campana->camCuenta);
                $textomail = $usuario->usuId . ": <br>Se cerró la Campaña: " . $camNombre . ", por parte de : " . $_SESSION['usuId'];
                @sendMail($usuario->usuCorreo, $textomail, "Cierre de Campaña", "VMLYR Campanas");
                
        }
        else{
            $respuesta = array("status" => "ERROR", "message" => "E000003");                    
        }
    }
    else{
        $respuesta = array("status" => "ERROR", "message" => "E000002");                
    }
}

echo json_encode($respuesta);

?>
