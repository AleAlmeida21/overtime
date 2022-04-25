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
require_once("../libs/recordsets/clientes.php");
require_once("../includes/validaciones/seguridad.php");

if(!$_SESSION['ingreso'] && $_SESSION['usuRol'] != "A" ){
    header("Location: index.php");
    die();
}

/*
 * Traigo los datos
 */

$cliId = cleanXSS($_POST["cliId"]);
$cliNombre = cleanXSS($_POST["cliNombre"]);
$cliAgencia = cleanXSS($_POST["cliAgencia"]);
$accion = cleanXSS($_POST["accion"]);
$cliFbId = cleanXSS($_POST["cliFbId"]);

/*
 * 
 */

$clientes = new Clientes();
$cliente = new Cliente();
$cliente = $clientes->traerPorId($cliId);

$seguir = true;
if($accion != "e" && (!empty($cliId))){
    if($cliente){
        $respuesta = array("status" => "ERROR", "message" => "E000002");    
        $seguir = false;
    }
    else{
        $cliente = new Cliente();
    }
}

if($seguir){
    $cliente->cliNombre = $cliNombre;
    $cliente->cliAgencia = $cliAgencia;
    $cliente->cliFbId = $cliFbId;

    if($accion == "e"){
        $resultado = $cliente->actualizar();
    }
    else{
        $resultado = $cliente->insertar();    
    }

    if($resultado){
        $respuesta = array("status" => "OK", "message" => "");    
    }
    else{
        $respuesta = array("status" => "ERROR", "message" => "E000001 " . $cliente->ultimoError());                
    }
}

echo json_encode($respuesta);

?>
