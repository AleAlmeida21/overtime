<?php
@session_start();
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/campanas.php");
require_once("../libs/recordsets/piezas.php");
require_once("../libs/recordsets/clientes.php");
require_once("../libs/recordsets/notificaciones.php");
require_once("../includes/validaciones/seguridad.php");

if(!$_SESSION['ingreso'] && $_SESSION['usuRol'] != "A" ){
    header("Location: index.php");
    die();
}

$camId = (int)cleanXSS($_GET["id"]);

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

$campanas = new Campanas();
$campana = new Campana();
$campana = $campanas->traerPorId($camId);

$clientes = new Clientes();
$cliente = new Cliente();
$cliente = $clientes->traerPorId($campana->cliId);

$piezas = new Piezas();
$pieza = new Pieza();
        
$lstPiezas = $piezas->traerTodos(0,0,"camId=" . $camId);

$smarty->assign("camNombre",$campana->camNombre);
$smarty->assign("cliNombre",$cliente->cliNombre);
$smarty->assign("piezas",$lstPiezas);
$smarty->assign("camId",$camId);

$notificaciones = new Notificaciones();
$lstNotificaciones = $notificaciones->traerTodosDatos();

$smarty->assign("cantidad",count($lstNotificaciones));
$smarty->assign("notificaciones",$lstNotificaciones);

/*
 * Ejecuto el template.
 */
$smarty->assign("paginaActual","campanas.php");
$smarty->display('../templates/Admin/'.$template.'.tpl');

?>