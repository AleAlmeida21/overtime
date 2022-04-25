<?php
@session_start();
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/accesos.php");

$accesos = new Accesos();
$acceso = new Acceso();

unset($GLOBALS["appid"]);
unset($GLOBALS["secret"]);
unset($GLOBALS["token"]);

$acceso = $accesos->traerTodos();

if($acceso){
    $GLOBALS["appid"] = $acceso->appid;
    $GLOBALS["secret"] = $acceso->secret;
    $GLOBALS["token"] = $acceso->token;
}

?>