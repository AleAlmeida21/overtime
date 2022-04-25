<?php
@session_start();
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/clientes.php");
require_once("../libs/recordsets/campanas.php");
require_once("../config/configuracion.php");

if(!$_SESSION['ingreso']){
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

//Datos para las graficas
$conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);
$parametros = array();

$filtroCli = '';
$filtroCamp = '';
if(!empty($_SESSION['usuAgencia'])){
    $filtroCli = " WHERE cliAgencia='" . $_SESSION['usuAgencia'] . "'";
    $filtroCamp = " AND campAgencia='" . $_SESSION['usuAgencia'] . "'";
}

$clientes = new Clientes();
$smarty->assign("clientes",$clientes->cantidad($filtroCli));

$campanas = new Campanas();
$smarty->assign("campanas",$campanas->cantidad("1 " . $filtroCamp));

$sql = "SELECT DATE_FORMAT(`cliFecCre`,'%Y-%m') Fecha, count(*) Cantidad FROM Clientes " . $filtroCli . " GROUP BY DATE_FORMAT(`cliFecCre`,'%Y-%m') ORDER BY DATE_FORMAT(`cliFecCre`,'%Y-%m')";
if ($conn->conectar()) {
    $conn->consulta("SET NAMES 'utf8'");            
    
    if ($conn->consulta($sql, $parametros)) {
        $result = $conn->restantesRegistros();
        $smarty->assign("datosClientes",$result);
    }    
}

$sql = "SELECT DATE_FORMAT(`campFecCre`,'%Y-%m') Fecha, count(*) Cantidad FROM Campanas WHERE campId>0 " . $filtroCamp . " GROUP BY DATE_FORMAT(`campFecCre`,'%Y-%m') ORDER BY DATE_FORMAT(`campFecCre`,'%Y-%m')";
if ($conn->conectar()) {
    $conn->consulta("SET NAMES 'utf8'");            
    
    if ($conn->consulta($sql, $parametros)) {
        $result = $conn->restantesRegistros();
        $smarty->assign("datosCampanas",$result);
    }    
}

$sql = "SELECT DATE_FORMAT(`campFecCre`,'%Y-%m') Fecha, count(*) Cantidad FROM Campanas WHERE campEstado='Error' OR campEstado='Implementada' GROUP BY DATE_FORMAT(`campFecCre`,'%Y-%m') ORDER BY DATE_FORMAT(`campFecCre`,'%Y-%m')";
if ($conn->conectar()) {
    $conn->consulta("SET NAMES 'utf8'");            
    
    if ($conn->consulta($sql, $parametros)) {
        $result = $conn->restantesRegistros();
        $smarty->assign("datosCampanasErr",$result);
    }    
}

$sql = "SELECT DATE_FORMAT(`campFecCre`,'%Y-%m') Fecha, count(*) Cantidad FROM Campanas WHERE campEstado='Chequeada' GROUP BY DATE_FORMAT(`campFecCre`,'%Y-%m') ORDER BY DATE_FORMAT(`campFecCre`,'%Y-%m')";
if ($conn->conectar()) {
    $conn->consulta("SET NAMES 'utf8'");            
    
    if ($conn->consulta($sql, $parametros)) {
        $result = $conn->restantesRegistros();
        $smarty->assign("datosCampanasOk",$result);
    }    
}

/*
 * Ejecuto el template.
 */
$smarty->assign("paginaActual",$nomPag);
$smarty->display('../templates/Admin/'.$template.'.tpl');

?>