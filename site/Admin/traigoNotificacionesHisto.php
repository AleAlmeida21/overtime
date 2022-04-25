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
require_once("../libs/recordsets/notificaciones.php");
require_once("../includes/validaciones/seguridad.php");

$pieId = (int)cleanXSS($_POST["pieId"]);

/*
 * Traigo los datos
 */

$notificaciones = new Notificaciones();
$lstNotificaciones = $notificaciones->traerTodosDatosHistorial(0, 0, "Notificaciones.pieId=" . $pieId, "notFecHor DESC");

$respuesta = array("status" => "OK", "message" => "", "notificaciones" => $lstNotificaciones);        

echo json_encode($respuesta);

?>
