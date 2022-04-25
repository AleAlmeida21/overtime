<?php
@session_start();
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/clientes.php");

if(!$_SESSION['ingreso'] || $_SESSION['usuRol'] == "C" ){
    header("Location: index.php");
    die();
}

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

$clientes = new Clientes();
$cliente = new Cliente();

$filtro = "";
if(!empty($_SESSION['usuAgencia'])){
    $filtro = "cliAgencia = '" . $_SESSION['usuAgencia'] . "'";
}

$lstClientes = $clientes->traerTodos(0,0,$filtro);

$smarty->assign("clientes",$lstClientes);

/*
 * Ejecuto el template.
 */
$smarty->assign("paginaActual",$nomPag);
$smarty->display('../templates/Admin/'.$template.'.tpl');

?>