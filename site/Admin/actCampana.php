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
require_once("../libs/recordsets/campanas.php");
require_once("../libs/recordsets/campPlanMeds.php");
require_once("../includes/validaciones/seguridad.php");

if(!$_SESSION['ingreso'] && $_SESSION['usuRol'] != "A" ){
    header("Location: index.php");
    die();
}

/*
 * Traigo los datos
 */

$campId = (int)cleanXSS($_POST["campId"]);
$campAgencia = cleanXSS($_POST["campAgencia"]);
$cliId = cleanXSS($_POST["cliId"]);
$campNombre = cleanXSS($_POST["campNombre"]);
$campFecSol = cleanXSS($_POST["campFecSol"]);
$campInvers = cleanXSS($_POST["campInvers"]);
$campLanding = cleanXSS($_POST["campLanding"]);
$campTargComent = cleanXSS($_POST["campTargComent"]);
$campIdFb = cleanXSS($_POST["campIdFb"]);
$campEstado = cleanXSS($_POST["campEstado"]);
        
$lineasMedios = $_POST["lineasMedios"];

$accion = cleanXSS($_POST["accion"]);

/*
 * 
 */

$campanas = new Campanas();
$campana = new Campana();
$campana = $campanas->traerPorId($campId);

$seguir = true;
if($accion != "e" && $campId!=0){
    $campana = new Campana();
}

if($seguir){
    $campana->campAgencia = $campAgencia;
    $campana->cliId = $cliId;
    $campana->campNombre = $campNombre;
    $campana->campFecSol = $campFecSol;
    $campana->campInvers = $campInvers;
    $campana->campLanding = $campLanding;
    $campana->campTargComent = $campTargComent;
    $campana->campIp = getClientIP();
    $campana->campIdFb = $campIdFb;
    $campana->campEstado = $campEstado;

    if($accion == "e"){
        $resultado = $campana->actualizar();
    }
    else{
        $resultado = $campana->insertar(); 
    }

    if($resultado){
        $campPlanMeds = new CampPlanMeds();
        $todoOk = $campPlanMeds->borrarTodo($campana->campId);        
        if($todoOk){            
            for($x=0; $x<=count($lineasMedios)-1; $x++){
                $linea = $lineasMedios[$x];
                $campPlanMed = new CampPlanMed();
                $campPlanMed->campId = $campana->campId;
                $campPlanMed->plaAdServ = $linea["plaAdServ"];
                $campPlanMed->plaDispositivo = $linea["plaDispositivo"];
                $campPlanMed->plaFinCamp = $linea["plaFinCamp"];
                $campPlanMed->plaFormato = $linea["plaFormato"];
                $campPlanMed->plaIniCamp = $linea["plaIniCamp"];
                $campPlanMed->plaInversion = $linea["plaInversion"];
                $campPlanMed->plaIp  = getClientIP();
                $campPlanMed->plaKPI = $linea["plaKPI"];
                $campPlanMed->plaMedio = $linea["plaMedio"];
                $campPlanMed->plaObjetivo = $linea["plaObjetivo"];
                $campPlanMed->plaUbicacion = $linea["plaUbicacion"];
                $campPlanMed->plaConjAnFB = $linea["plaConjAnFB"];
               
                if(!$campPlanMed->insertar()){
                    $todoOk=false;
                }
            }
            if($todoOk){            
                $respuesta = array("status" => "OK", "message" => "");    
            }
            else{
                $respuesta = array("status" => "ERROR", "message" => "E000003");
            }
        }
        else{
            $respuesta = array("status" => "ERROR", "message" => "E000002 "  . $campPlanMeds->ultimoError());                            
        }
    }
    else{
        $respuesta = array("status" => "ERROR", "message" => "E000001");                
    }
}

echo json_encode($respuesta);

?>
