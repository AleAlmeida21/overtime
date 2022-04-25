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
require_once("../libs/recordsets/accesos.php");
require_once("../includes/validaciones/seguridad.php");

if(!$_SESSION['ingreso'] && $_SESSION['usuRol'] != "A" ){
    header("Location: index.php");
    die();
}

/*
 * Traigo los datos
 */

$appid = cleanXSS($_POST["appid"]);
$secret = cleanXSS($_POST["secret"]);
$token = cleanXSS($_POST["token"]);

/*
 * 
 */

$accesos = new Accesos();
$acceso = new Acceso();
$acceso = $accesos->traerTodos();

$seguir = true;
if((empty($appid)) || (empty($secret)) || (empty($token))){
    if($acceso){
        $respuesta = array("status" => "ERROR", "message" => "E000002");    
        $seguir = false;
    }
}

if($seguir){
    $acceso->appid = $appid;
    $acceso->secret = $secret;
    $acceso->token = $token;

    $resultado = $acceso->actualizar();

    if($resultado){
        $respuesta = array("status" => "OK", "message" => "");    
    }
    else{
        $respuesta = array("status" => "ERROR", "message" => "E000001 " . $acceso->ultimoError());                
    }
}

require_once("cargoCredencialesFB.php");

echo json_encode($respuesta);

?>
