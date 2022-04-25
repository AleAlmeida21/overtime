<?php
@session_start();
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/campanas.php");
require_once("../libs/recordsets/clientes.php");
require_once("../libs/recordsets/campPlanMeds.php");
require_once("../includes/validaciones/seguridad.php");

if(!$_SESSION['ingreso'] || $_SESSION['usuRol'] == "C" ){
    header("Location: index.php");
    die();
}

$accion = cleanXSS($_GET["a"]);
$campId = cleanXSS($_GET["id"]);

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
$lstClientes = $clientes->traerTodos();
$smarty->assign("clientes",$lstClientes);

$campanas = new Campanas();
$campana = new Campana();

$smarty->assign("campAgencia",$_SESSION['usuAgencia']);

$smarty->assign("campFecSol",date("Y-m-d"));
if($accion == "e"){
    $campana = $campanas->traerPorId($campId);
    if($campana){
        $smarty->assign("campId",$campana->campId);
        $smarty->assign("campAgencia",$campana->campAgencia);
        $smarty->assign("cliId",$campana->cliId);
        $smarty->assign("campNombre",$campana->campNombre);
        $smarty->assign("campFecSol",$campana->campFecSol);
        $smarty->assign("campInvers",$campana->campInvers);
        $smarty->assign("campLanding",$campana->campLanding);
        $smarty->assign("campTargComent",$campana->campTargComent);    
        $smarty->assign("campIdFb",$campana->campIdFb);    
        $smarty->assign("campEstado",$campana->campEstado);    
        
        $campPlanMeds = new CampPlanMeds();
        $lista = $campPlanMeds->traerPorCamp($campana->campId);

        $smarty->assign("listaPlanCampanas",$lista);
    }
    else{
        $accion = "a";        
    }
}
elseif ($accion == "b") {  
    $campana = $campanas->traerPorId($campId);
    if($campana){
        $campPlanMeds = new CampPlanMeds();
        if($campPlanMeds->borrarTodo($campana->campId)){
            if($campana->borrar()){
                header("Location: campanas.php");
                die();
            }
            else{
                die("ERROR AL BORRAR CAMPANA");
            }
        }
        else{
            die("ERROR AL BORRAR PLANES");
        }
    }
    else{
        die("ERROR EN CAMPANA");
    }
    die("FIN BORRAR");
}

$smarty->assign("accion",$accion);

//$smarty->assign("cantidad",count($lstNotificaciones));
$smarty->assign("notificaciones",$lstNotificaciones);


/*
 * Ejecuto el template.
 */
$smarty->assign("paginaActual","campanas.php");
$smarty->display('../templates/Admin/'.$template.'.tpl');

?>