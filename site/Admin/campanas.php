<?php
@session_start();
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/campanas.php");
require_once("../libs/recordsets/clientes.php");
require_once("../libs/recordsets/campPlanMeds.php");
require_once("../includes/validaciones/seguridad.php");

if(!$_SESSION['ingreso']){
    header("Location: index.php");
    die();
}

$filtro = (int)cleanXSS($_GET["f"]);
if($filtro==0){
    //veo el filtro que corresponda al usuario
    $filtro = $_SESSION['cliId'];
}
$campEstado = cleanXSS($_GET["e"]);


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

$clientes = new Clientes();
$cliente = new Cliente();

$filtroAgencia = "";
if($_SESSION['usuAgencia'] != ""){
    $filtroAgencia = "cliAgencia='" . $_SESSION['usuAgencia'] . "'";
    $filtroAplicar =  "campAgencia='" . $_SESSION['usuAgencia'] . "'";
}

$lstClientes = $clientes->traerTodos(0,0,$filtroAgencia,"cliNombre");
//Si es creativo no ve las cerradas
if($filtro>0){
    if(!empty($filtroAplicar)){
        $filtroAplicar .= " AND ";
    }
    $filtroAplicar .= " cliId=" . $filtro;
}
if(!empty($campEstado)){
    if(!empty($filtroAplicar)){
        $filtroAplicar .= " AND ";
    }
    $filtroAplicar .= " campEstado='" . $campEstado . "'";    
}

$lstCampanas = $campanas->traerTodos(0,0,$filtroAplicar);

$campPlanMeds = new CampPlanMeds();
$campPlanMed = new CampPlanMed();

$hoy = date("d-m-Y");
for($x=0; $x<=count($lstCampanas)-1; $x++){
    $cliente = $clientes->traerPorId($lstCampanas[$x]->cliId);

    //Veo si hay que marcar como terminada la campaña
    $lstPlanMeds = $campPlanMeds->traerPorCamp($lstCampanas[$x]->campId);

    $terminada = true;
    for($y=0; $y<=count($lstPlanMeds)-1; $y++){
        $campPlanMed = $lstPlanMeds[$y];
        if($campPlanMed->plaFinCamp>=date("Y-m-d")){
            $terminada =  false;  
        }
    }
    if($terminada){ //Si está terminada porque todos los items del plan de medios están vencidos la marco
        $lstCampanas[$x]->campEstado = "Terminada";  
        $campana = $campanas->traerPorId($lstCampanas[$x]->campId);
        $campana->campEstado = "Terminada";
        $campana->actualizar();
    }
    
    $lstCampanas[$x]->cliNombre = $cliente->cliNombre;
    
}
$smarty->assign("filtro",$filtro);
$smarty->assign("lstClientes",$lstClientes);
$smarty->assign("campanas",$lstCampanas);
$smarty->assign("campEstado",$campEstado);

       
/*
 * Ejecuto el template.
 */
$smarty->assign("paginaActual",$nomPag);
$smarty->display('../templates/Admin/'.$template.'.tpl');

?>