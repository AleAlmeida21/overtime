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

/*
 * Traigo los datos
 */

$usuId = cleanXSS($_POST["usuId"]);
$usuPass = cleanXSS($_POST["usuPass"]);
$usuRecordar = cleanXSS($_POST["usuRecordar"]);

/*
 * 
 */

if($usuRecordar == "S"){
    setcookie("usuId", $usuId, time()+(DIASCOOKIE*24*60*60));
}
else{
    setcookie("usuId", "");    
}

$usuarios = new Usuarios();
$usuario = new Usuario();
$usuario = $usuarios->traerPorId($usuId);

if($usuario){
    if($usuario->usuPass == md5($usuPass)){
        $_SESSION['ingreso'] = true;
        $_SESSION['usuId'] = $usuId;
        $_SESSION['usuRol'] = $usuario->usuRol;
        $_SESSION['usuAgencia'] = $usuario->usuAgencia;
        $_SESSION['usuCorreo'] = $usuario->usuCorreo;
        $respuesta = array("status" => "OK", "message" => "");    
    }
    else{
        $_SESSION['ingreso'] = false;
        $respuesta = array("status" => "ERROR", "message" => "E000002");        
    }
}
 else {
     $_SESSION['ingreso'] = false;
     $respuesta = array("status" => "ERROR", "message" => "E000001");
}

echo json_encode($respuesta);

?>
