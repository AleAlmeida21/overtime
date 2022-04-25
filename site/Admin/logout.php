<?php

/*
 * Abro la sesion donde lo necesito
 */

session_start();

/*
 * Incluyo dependencias para la página
 */

require_once("../config/configuracion.php");

/*
 * Traigo los datos
 */


/*
 * 
 */

$_SESSION['ingreso'] = false;
unset($_SESSION['usuId']);
unset($_SESSION['usuRol']);
unset($_SESSION['cliId']);
unset($_SESSION['usuCorreo']);

header("Location: index.php");
?>
