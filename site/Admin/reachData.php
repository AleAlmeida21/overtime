<?php
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../includes/validaciones/seguridad.php");

require_once __DIR__ . '/../includes/FBSDK/vendor/autoload.php'; // change path as needed

$desde = $_GET["d"];
$hasta = $_GET["h"];

if(empty($desde)){
    $desde = "2021-07-27";
}
if(empty($hasta)){
    $hasta = date("Y-m-d");
}

$archivo = "../tmp/reachData.json";
$csv = "../tmp/reachData.csv";

$elementos = array();

$jsondata = file_get_contents($archivo);
if($jsondata){
    $elementos = json_decode($jsondata, true);
}

$fb = new \Facebook\Facebook([
  'app_id' => $GLOBALS["appid"],
  'app_secret' => $GLOBALS["secret"],
  'default_graph_version' => 'v11.0',
  'default_access_token' => $GLOBALS["token"], //opcional, se puede pasar en el get
]);

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional, Se pasa como segundo parametro al get
  $response = (array)$fb->get('/act_5198444490197408/insights?level=ad&fields=reach,ad_id&time_range={"since":"' . $desde . '","until":"' . $hasta . '"}');
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

//$me = $response->getGraphUser();
//echo 'Logged in as ' . $me->getName();

$handle = fopen($csv, "a");

foreach($response as $clave=>$valor){
    if(strpos($clave, "decodedBody")){
        $data = $valor["data"];
        foreach($data as $c=>$v){
            $valAnt = (int)$elementos[$v["ad_id"]]["reach"];
            $elementos[$v["ad_id"]] = array("reach"=>$v["reach"],"unicos"=>((int)$v["reach"]-$valAnt)); 
            fputcsv($handle, array($v["ad_id"],$hasta,((int)$v["reach"]-$valAnt)),',','"');
        }
    }
}

$jsondata = json_encode($elementos, JSON_PRETTY_PRINT);
file_put_contents($archivo, $jsondata);

fclose($handle);

?>