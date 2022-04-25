<?php
@session_start();
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/usuarios.php");
require_once("../includes/validaciones/seguridad.php");

$token = cleanXSS($_GET["t"]);

//DECLARO SAMRTY
$smarty = new Smarty;

//COLOCO LA DESIGNACION DE DIRECTORIOS
$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir  = COMPILER_DIR;
$smarty->config_dir  = CONFIG_DIR;
$smarty->cache_dir  = CACHE_DIR;

$smarty->compile_check = true;
$smarty->force_compile = true;

/*
 * OTENGO EL NOMBRE DEL TPL QUE ES EL MISMO QUE EL FUENTE PHP
 */
$nomPag=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
$template=substr($nomPag,0,strlen($template)-4);

/*
 *  Voy por los datos del usuario
 */

if(isset($_SESSION["usuId"])){
    $usuarios = new Usuarios();
    $usuario = new Usuario();
    $usuario = $usuarios->traerPorId($_SESSION["usuId"]);    
    if($usuario){
        if(md5($usuario->usuPass) == $token){
            /*
             * Ejecuto el template.
             */
            $smarty->display('../templates/Admin/'.$template.'.tpl');
            die();
        }
    }
}

header("Location: index.php");
?>