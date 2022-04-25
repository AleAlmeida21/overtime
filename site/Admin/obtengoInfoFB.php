<?php
session_start();
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../includes/validaciones/seguridad.php");

$fbIDGrp = cleanXSS($_GET['fbidg']);
$fbIDCamp = cleanXSS($_GET['fbidc']);
$error = "";

require_once __DIR__ . '/../includes/FBSDK/vendor/autoload.php'; // change path as needed

if (!empty($fbIDGrp)){
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
      $response = (array)$fb->get('/' . $fbIDGrp . '?fields=end_time,start_time,targeting,optimization_goal,lifetime_budget');
    } catch(\Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      $error .=  'Graph returned an error: ' . $e->getMessage();
      $respuesta = array("error" => $error);
      exit;
    } catch(\Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      $error .= 'Facebook SDK returned an error: ' . $e->getMessage();
      $respuesta = array("error" => $error);
      exit;
    }

    //$me = $response->getGraphUser();
    //echo 'Logged in as ' . $me->getName();


    foreach($response as $clave=>$valor){
        if(strpos($clave, "decodedBody")){
            $respuesta["start_time"] = explode("T",$valor["start_time"])[0]; 
            $respuesta["end_time"] = explode("T",$valor["end_time"])[0];
            $respuesta["lifetime_budget"] = ((int)$valor["lifetime_budget"])/100; 
            $respuesta["age_min"] = (int)$valor["targeting"]["age_min"]; 
            $respuesta["age_max"] = (int)$valor["targeting"]["age_max"]; 
            $respuesta["countries"] = $valor["targeting"]["geo_locations"]["countries"]; 
            $respuesta["optimization_goal"] = $valor["optimization_goal"];
        }
    }
}
if(!empty($fbIDCamp)){
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
      $response = (array)$fb->get('/' . $fbIDCamp . '?fields=lifetime_budget');
    } catch(\Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      $error .=  'Graph returned an error: ' . $e->getMessage();
      $respuesta = array("error" => $error);
      exit;
    } catch(\Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      $error .= 'Facebook SDK returned an error: ' . $e->getMessage();
      $respuesta = array("error" => $error);
      exit;
    }

    //$me = $response->getGraphUser();
    //echo 'Logged in as ' . $me->getName();
    foreach($response as $clave=>$valor){
        if(strpos($clave, "decodedBody")){
            $respuesta["Clifetime_budget"] = ((int)$valor["lifetime_budget"])/100; 
        }
    }
}

if(is_array($respuesta)){
    echo json_encode($respuesta);
}
else{
    echo false;
}

?>