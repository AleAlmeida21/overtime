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

$nuevaClave = cleanXSS($_POST["nuevaClave"]);

/*
 * 
 */

$usuarios = new Usuarios();
$usuario = new Usuario();
$usuario = $usuarios->traerPorId($_SESSION['usuId']);

if($usuario){
    $usuario->usuPass = md5($nuevaClave);
    if($usuario->actualizar()){
        $respuesta = array("status" => "OK", "message" => "");    
    }
    else{
        $respuesta = array("status" => "ERROR", "message" => "E000003");                
    }
}
 else {
     $_SESSION['ingreso'] = false;
     $respuesta = array("status" => "ERROR", "message" => "E000002");
}

echo json_encode($respuesta);

?>
