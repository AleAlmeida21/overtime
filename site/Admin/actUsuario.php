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

if(!$_SESSION['ingreso'] && $_SESSION['usuRol'] != "A" ){
    header("Location: index.php");
    die();
}

/*
 * Traigo los datos
 */

$usuId = cleanXSS($_POST["usuId"]);
$usuPass = cleanXSS($_POST["usuPass"]);
$usuRol = cleanXSS($_POST["usuRol"]);
$usuCorreo = cleanXSS($_POST["usuCorreo"]);
$accion = cleanXSS($_POST["accion"]);
$usuAgencia = cleanXSS($_POST["usuAgencia"]);

/*
 * 
 */

$usuarios = new Usuarios();
$usuario = new Usuario();
$usuario = $usuarios->traerPorId($usuId);

$seguir = true;
if($accion != "e"){
    if($usuario){
        $respuesta = array("status" => "ERROR", "message" => "E000002");    
        $seguir = false;
    }
    else{
        $usuario = new Usuario();
    }
}

if($seguir){
    $usuario->usuId = $usuId;
    if($usuPass!="NoTocar"){
        $usuario->usuPass = md5($usuPass);
    }
    $usuario->usuRol = $usuRol;
    $usuario->usuCorreo = $usuCorreo;
    $usuario->usuAgencia = $usuAgencia;

    if($accion == "e"){
        $resultado = $usuario->actualizar();
    }
    else{
        $resultado = $usuario->insertar();    
    }

    if($resultado){
        $respuesta = array("status" => "OK", "message" => "");    
    }
    else{
        $respuesta = array("status" => "ERROR", "message" => "E000001");                
    }
}

echo json_encode($respuesta);

?>
