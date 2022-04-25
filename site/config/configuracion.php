<?php
require_once ('config_DB.php');
require_once ('config_FS.php');
require_once ('config_MAIL.php');
require_once ('config_SMARTY.php');

//configuraciones de seguridad
ini_set('register_globals', false);

//Configuracion hora
ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

// Mostrar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);

//Habilito que se muestren los errores (en produccion se debe cambiar a false)
ini_set('display_errors', true);

//Habilitamos el logueo de lo sucedido en la app
require_once(FS_PATH . "includes/logger/class.Logger.php3");

$logger = new Logger(FS_PATH . "logs/");

$logger->initialize(
                 array(
                        "REGLOG" => "registros_log"
                      )
                   );

//$logger->log(USRLOG,"Datos que queremos enviar al log");

//Tiempo de vida en días de las cookies
define("DIASCOOKIE",30);

//Valores para Cripto
define("SECRETKEY","Esto es un texto para Secret KEY");
define("SECRETIV","Y otro mas para usar como IV");

//cargo las credenciales de FB
require_once ("../Admin/cargoCredencialesFB.php");
?>