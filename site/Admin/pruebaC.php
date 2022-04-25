<?php
require_once("../config/configuracion.php");
require_once("../libs/controlador/class.Conexion.BD.php");
require_once("../includes/validaciones/seguridad.php");

require_once __DIR__ . '/../includes/FBSDK/vendor/autoload.php'; // change path as needed

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
  $response = (array)$fb->get('23847651688300787?fields=lifetime_budget');
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

echo "<pre>";
//print_r($response);
foreach($response as $clave=>$valor){
    if(strpos($clave, "decodedBody")){
//        print_r($valor);
//        echo "<hr>";
        echo $valor["lifetime_budget"] . "<br>"; 
    }
}
?>