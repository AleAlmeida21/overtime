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
require_once("../libs/recordsets/usuarios.php");
require_once("../includes/validaciones/seguridad.php");
require_once("../includes/mail/sendMail.php");

/*
 * Traigo los datos
 */

$usuId = cleanXSS($_POST["usuId"]);

/*
 * 
 */

$usuarios = new Usuarios();
$usuario = new Usuario();
$usuario = $usuarios->traerPorId($usuId);

if($usuario){
    if($usuario->usuCorreo != ""){
        $_SESSION["usuId"] = $usuId;
        $textomail = "Estimado " . $usuario->usuId . "<br>Para reasignar su clave haga click <a href='" . WEB_PATH . "Admin/reasignoPass.php?t=" . md5($usuario->usuPass) . "'>aquí</a>.<br>Dispone de unos minutos para realizar la tarea.";
        sendMail($usuario->usuCorreo, $textomail, "Recordatorio de Contraseña", "VMLYR Campanas");
    }
}

?>
