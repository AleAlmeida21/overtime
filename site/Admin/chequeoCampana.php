<?php
@session_start();
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../libs/recordsets/campanas.php");
require_once("../libs/recordsets/campPlanMeds.php");
require_once("../includes/validaciones/seguridad.php");
require_once("../includes/validaciones/getFileCurl.php");

if(!$_SESSION['ingreso'] || $_SESSION['usuRol'] == "C" ){
    header("Location: index.php");
    die();
}

$campId = cleanXSS($_GET["id"]);
$regreso = cleanXSS($_GET["r"]);
$ver= ((int)cleanXSS($_GET["v"])) == 1; //si viene en 1 se visualiza, sino no.

$debug = false;


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

if(empty($regreso)){
    $regreso = "campanas.php";
}
else{
    $regreso = "campana.php?a=e&id=" . $campId;
}
$smarty->assign("regreso",$regreso);

$smarty->assign("SusuId",$_SESSION['usuId']);
$smarty->assign("rol",$_SESSION['usuRol']);
$smarty->assign("SusuCorreo",$_SESSION['usuCorreo']);

$campanas = new Campanas();
$campana = new Campana();

$filtro = "";
if(!empty($campId)){
    $filtro="campId=" . $campId;
}
$listadoCampanas = $campanas->traerTodos(0, 0, $filtro);

for($xyz=0; $xyz<=count($listadoCampanas)-1;$xyz++){
    //$campana = $campanas->traerPorId($campId);
    $campana = $listadoCampanas[$xyz];
    if($debug){
        echo "<hr>Campaña:<br><pre>";
        print_r($campana);   
    }

    if($campana && $campana->campEstado != "Terminada" && $campana->campEstado != "Sin Implementar"){
        $correcto= true;
        $smarty->assign("campNombre",$campana->campNombre);
        $smarty->assign("campIdFb",$campana->campIdFb);

        $campPlanMeds = new CampPlanMeds();
        $campPlanMed = new CampPlanMed();
        $lista = $campPlanMeds->traerPorCamp($campana->campId);
        if($debug){
            echo "<hr>Plan de Medios:<br><pre>";
            print_r($lista);  
        }

        $respuesta = array("<h5><STRONG>PLAN DE MEDIOS</strong></h5><hr>");
        //chequeo los elementos del plan de medios
        for($pos=0;$pos<=count($lista)-1;$pos++){
            $campPlanMed = $lista[$pos];
            $resultFB = getURL(WEB_PATH . "Admin/obtengoInfoFB.php?fbidg=" . $campPlanMed->plaConjAnFB . "&fbidc=" . $campana->campIdFb);
            if($debug){
                echo "<hr>Respuesta FB (" . $pos . "): " . WEB_PATH . "Admin/obtengoInfoFB.php?fbidg=" . $campPlanMed->plaConjAnFB .  " <br><pre>";
                print_r($resultFB);   
            }        

            if($resultFB){
                $resultFB = (array)json_decode($resultFB);
                $respuesta[] = "FB ID: <strong>" . $campPlanMed->plaConjAnFB . "</strong>";
                //Dia de inicio
                if($campPlanMed->plaIniCamp != $resultFB["start_time"]){
                    $correcto = false;
                    $respuesta[] = "<span style='color:red'>FECHA DE INICIO - " . $campPlanMed->plaIniCamp . " ~ ". $resultFB["start_time"] . " - ¡ERROR!</span>";
                }
                else{
                    $respuesta[] = "FECHA DE INICIO - ¡OK!";
                }
                //Dia de fin
                if($campPlanMed->plaFinCamp != $resultFB["end_time"]){
                    $correcto = false;
                    $respuesta[] = "<span style='color:red'>FECHA DE FIN - " . $campPlanMed->plaFinCamp . " ~ ". $resultFB["end_time"] . " - ¡ERROR!</span>";
                }
                else{
                    $respuesta[] = "FECHA DE FIN - ¡OK!";
                }
                //Importe
                $budget = false;
                if($campPlanMed->plaInversion != $resultFB["lifetime_budget"]){
                    //$respuesta[] = "<span style='color:red'>INVERSION - " . $campPlanMed->plaInversion . " ~ ". $resultFB["lifetime_budget"] . " - ¡ERROR!</span>";
                    $budget = true;
                }
                else{
                    $respuesta[] = "INVERSION - ¡OK!";
                }
                //Pais
                if(@in_array($campPlanMed->plaUbicacion, $resultFB["countries"])){
                    $correcto = false;
                    $respuesta[] = "<span style='color:red'>PAIS - " . $campPlanMed->plaFinCamp . " ~ ". implode(",",$resultFB["countries"]) . " - ¡ERROR!</span>";

                }
                else{
                    $respuesta[] = "PAIS - ¡OK!";
                }
                //KPI
                if($campPlanMed->plaKPI != $resultFB["optimization_goal"]){
                    $correcto = false;
                    $respuesta[] = "<span style='color:red'>KPI - " . $campPlanMed->plaKPI . " ~ ". $resultFB["optimization_goal"] . " - ¡ERROR!</span>";
                }
                else{
                    $respuesta[] = "KPI - ¡OK!";
                } 
                if($debug){
                    echo "<hr>Respuesta generada:<br><pre>";
                    print_r($respuesta);   
                }  
            }    
            else{
                if($debug){
                    if($debug){
                        echo "<hr>Respuesta FB (" . $pos . "): " . WEB_PATH . "Admin/obtengoInfoFB.php?fbidg=" . $campPlanMed->plaConjAnFB . "&fbidc=" . $campana->campIdFb . " <br><pre>";
                        echo "Sin respuesta!";   
                    }                   
                }
            }
            $respuesta[] = "<hr>";
        }

        if($budget){
            $respuesta[] = "<h5><STRONG>INVERSION TOTAL</strong></h5><hr>";
            if($campana->campInvers != $resultFB["Clifetime_budget"]){
                $correcto = false;
                $respuesta[] = "<span style='color:red'>INVERSION - " . $campPlanMed->plaInversion . " ~ ". $resultFB["lifetime_budget"] . " - ¡ERROR!</span>";
                $respuesta[] = "<span style='color:red'>INVERSION CAMPAÑA - " . $campana->campInvers . " ~ ". $resultFB["Clifetime_budget"] . " - ¡ERROR!</span>";
                $budget = true;
            }
            else{
                $respuesta[] = "INVERSION CAMPAÑA - ¡OK!";
            }
        }

        //actualizo el status de la campaña
        if($correcto){
            $campana->campEstado="Chequeada";
        }
        else{
            $campana->campEstado="Error";
        }
        $campana->actualizar();
    }
}
    
if($ver){
    $smarty->assign("respuesta",$respuesta);
} 
else{
    header("Location: campanas.php");
    die();
}

/*
 * Ejecuto el template.
 */
if(!$debug){
    $smarty->assign("paginaActual","acceso.php");
    $smarty->display('../templates/Admin/'.$template.'.tpl');
}
?>