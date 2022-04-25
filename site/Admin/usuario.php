<?php
@session_start();
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/usuarios.php");
require_once("../libs/recordsets/clientes.php");
require_once("../includes/validaciones/seguridad.php");

if(!$_SESSION['ingreso'] || $_SESSION['usuRol'] != "A" ){
    header("Location: index.php");
    die();
}

$accion = cleanXSS($_GET["a"]);
$usuId = cleanXSS($_GET["id"]);

//DECLARO SAMRTY
$smarty = new Smarty;

//COLOCO LA DESIGNACION DE DIRECTORIOS
$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir  = COMPILER_DIR;
$smarty->config_dir  = CONFIG_DIR;
$smarty->cache_dir  = CACHE_DIR;

/*
 * OTENGO EL NOMBRE DEL TPL QUE ES EL MISMO QUE EL FUENTE PHP
 */
$nomPag=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
$template=substr($nomPag,0,strlen($template)-4);

/*
 *  Voy por los datos del usuario
 */

$smarty->assign("SusuId",$_SESSION['usuId']);
$smarty->assign("rol",$_SESSION['usuRol']);
$smarty->assign("SusuCorreo",$_SESSION['usuCorreo']);

$usuarios = new Usuarios();
$usuario = new Usuario();

if($accion == "e"){
    $usuario = $usuarios->traerPorId($usuId);
    if($usuario){
        $smarty->assign("usuId",$usuario->usuId);
        $smarty->assign("usuPass",'NoTocar');
        $smarty->assign("usuRol" . $usuario->usuRol, "selected='selected'");
        $smarty->assign("usuCorreo",$usuario->usuCorreo);
        $smarty->assign("usuAgencia",$usuario->usuAgencia);
    }
    else{
        $accion = "a";
    }
}
elseif ($accion == "b") {  
    $usuario = $usuarios->traerPorId($usuId);
    if($usuario){
        if($usuario->borrar()){
            header("Location: usuarios.php");
            die();
        }
    }
}

$smarty->assign("accion",$accion);

/*
 * Ejecuto el template.
 */
$smarty->assign("paginaActual","usuarios.php");
$smarty->display('../templates/Admin/'.$template.'.tpl');

?>