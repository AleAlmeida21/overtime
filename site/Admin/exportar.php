<?php
@session_start();
require_once("./config/configuracion.php");
require_once("./libs/controlador/class.Conexion.BD.php");

function sanear_string($string) {

    $string = trim($string);

    $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
    );

    $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
    );

    $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
    );

    $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
    );

    $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
    );

    $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C',), $string
    );

    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
            array("\\", "¨", "º", "-", "~",
        "#", "@", "|", "!", "\"",
        "·", "$", "%", "&", "/",
        "(", ")", "?", "'", "¡",
        "¿", "[", "^", "`", "]",
        "+", "}", "{", "¨", "´",
        ">", "< ", ";", ",", ":",
        ".", " "), ' '
            . ' ', $string
    );
    return $string;
}

if(!isset($_SERVER['PHP_AUTH_USER'])) {
  header("WWW-Authenticate: Basic realm=\"Ingrese Credenciales\"");
  header("HTTP/1.0 401 Unauthorized");     
  echo "No autorizado.\n";   
  exit;
} elseif ($_SERVER['PHP_AUTH_USER']!="admin" || $_SERVER['PHP_AUTH_PW']!="scotiabank!") { 
  echo "->" . $_SERVER['PHP_AUTH_USER'] . "<br>" . $_SERVER['PHP_AUTH_PW'] . "<br>";
  echo "Acceso no aturizado.<P>";
  die();
} 

/*
 * Inicializo variables de sesión
 */
$conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);
if ($conn->conectar()) {
    $parametros = array();
    $sql = "SET NAMES 'utf8'";
    $conn->consulta($sql, $parametros);
    $sql = "SELECT * from Registros, Sucursales Where Registros.sucId=Sucursales.sucId";

    /*
     * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
     */

    if ($conn->consulta($sql, $parametros)) {
        $listado = $conn->restantesRegistros();

        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=registros.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo "<html><head><meta charset='ISO-8859-1'></head>";
        echo "<body><table border=1> ";
        echo "<tr> ";
        echo "<th>Nombre</th> ";
        echo "<th>Apellido</th> ";
        echo "<th>Fecha Nacimiento</th>";
        echo "<th>Documento</th> ";
        echo "<th>Telefono</th> ";
        echo "<th>Celular</th> ";
        echo "<th>Correo</th> ";
        echo "<th>Ingreso Liquido</th> ";
        echo "<th>Antiguedad</th> ";
        echo "<th>Sucursal</th> ";
        echo "<th>Estado Civil</th> ";
        echo "<th>Nombre Conyuge</th> ";
        echo "<th>Apellido Conyuge</th> ";
        echo "<th>Documento Conyuge</th> ";
        echo "<th>Ingreso Liq. Conyuge</th> ";
        echo "<th>Cliente Pago Sueldo</th> ";
        echo "<th>Consulta</th> ";
        echo "<th>Fecha Registro</th> ";        
        echo "</tr> ";


        for ($pos = 0; $pos <= count($listado) - 1; $pos++) {
            $tmp = $listado[$pos];
            echo "<tr> ";
            echo "<td>" . strtoupper(sanear_string(html_entity_decode($tmp['regNombre']))) . "</td> ";
            echo "<td>" . strtoupper(sanear_string(html_entity_decode($tmp['regApellido']))) . "</td> ";
            echo "<td>" . $tmp['regFecNac'] . "</td> ";
            echo "<td>" . $tmp['regCI'] . "</td> ";
            echo "<td>" . $tmp['regTelefono'] . "</td> ";
            echo "<td>" . $tmp['regCelular'] . "</td> ";
            echo "<td>" . $tmp['regCorreo'] . "</td> ";
            echo "<td>" . $tmp['regIngLiq'] . "</td> ";
            echo "<td>" . $tmp['regAntiguedad'] . "</td> ";
            echo "<td>" . $tmp['sucNombre'] . "</td> ";
            echo "<td>" . $tmp['regEstadoCivil'] . "</td> ";
            echo "<td>" . strtoupper(sanear_string(html_entity_decode($tmp['regNombreCon']))) . "</td> ";
            echo "<td>" . strtoupper(sanear_string(html_entity_decode($tmp['regApellidoCon']))) . "</td> ";
            echo "<td>" . $tmp['regCICon'] . "</td> ";
            echo "<td>" . $tmp['regIngLiqCon'] . "</td> ";
            echo "<td>" . $tmp['regClientoPagoCon'] . "</td> ";
            echo "<td>" . sanear_string(html_entity_decode($tmp['regConsulta'])) . "</td> ";
            echo "<td>" . $tmp['regFecCre'] . "</td> ";
            echo "</tr> ";
        }


        echo "</table></body></html> ";
    }
    else{
        echo "ERROR DE CONSULTA!";
    }
}
else{
    echo "ERROR DE CONEXION!";
}
?>