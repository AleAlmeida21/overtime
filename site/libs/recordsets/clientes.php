<?php

/*
 * 	Clase que maneja el conjunto de registros de la tabla "registros" en la aplicación
 *
 * 	Incluyo la clase que maneja un registro: Registro
 */
require_once("objects/cliente.php");

class Clientes {
    /*
     * 	Atributo para almacenar el ultimo error sucedido en alguno de los métodos de la clase
     */

    var $ultError;

    /*
     * 	Trae un registro filtrado por el ID suministrado, retorna un objeto.
     * 	Retorna falso si hay error o un objeto.
     */
    function traerPorId($cliId) {
        if ($cliId != 0) {
            $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);
            if ($conn->conectar()) {
                $conn->consulta("SET NAMES 'utf8'");            
                $sql = "SELECT * FROM `Clientes` WHERE cliId = :cliId";
                $parametros = array();
                /*
                 * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
                 */
                $parametros[0] = array("cliId", $cliId, "int", 0);

                if ($conn->consulta($sql, $parametros)) {
                    $result = $conn->siguienteRegistro();
                    $retorno = $this->traerFila($result);
                } else {
                    $retorno = false;
                    $this->ultError = $conn->ultimoError();
                }
            } else {
                $retorno = false;
                $this->ultError = $conn->ultimoError();
            }
        } else {
            $retorno = new Cliente();
        }
        return $retorno;
    }
        
    /*
     * 	Trae todos los registros que cumplen con las condiciones dadas.
     * 	
     * 	Recibe:
     * 			$offset		->	A partir de que registro
     * 			$limit		->	Que cantidad de registros
     * 			$filterBy	->	Condicion de filtro
     * 			$orderBy	-> 	Lista de campos y tipo de orden ASC DESC
     *
     * 	Retorna faso si hay error o un array de objetos
     */

    function traerTodos($offset = 0, $limit = 0, $filterBy = '', $orderBy = '') {
        $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);

        if ($conn->conectar()) {
            $conn->consulta("SET NAMES 'utf8'");            
            $sql = "SELECT * FROM `Clientes`";
            if (!empty($filterBy)) {
                $sql .= " WHERE " . $filterBy;
            }
            if (!empty($orderBy)) {
                $sql .= " ORDER BY " . $orderBy;
            }
            if ($limit > 0) {
                $sql .= " LIMIT " . $offset . "," . $limit;
            }

            $parametros = array();

            if ($conn->consulta($sql, $parametros)) {
                $result = $conn->restantesRegistros();
                $retorno = $this->traerFilas($result);
            } else {
                $retorno = false;
                $this->ultError = $conn->ultimoError();
            }
        } else {
            $retorno = false;
            $this->ultError = $conn->ultimoError();
        }
        return $retorno;
    }

    function ultimoError() {
        return $this->ultError;
    }

    /*
     * 	Método que crea un objeto a partir de un array con la fila de la tabla.
     * 	Retorna un objetos.
     */

    private function traerFila($fila) {
        $resultado = NULL;
        if ($fila) {            
            $resultado = new Cliente($fila['cliId'], $fila['cliNombre'], $fila['cliFecCre'], $fila['cliIp'], $fila['cliAgencia'], $fila['cliFbId']);
        }
        return $resultado;
    }

    /*
     * 	Método que crea un array de objetos a partir de un array con las filas de la tabla.
     * 	Retorna un Array de objetos.
     */

    private function traerFilas($filas) {
        $resultado = array();
        $i = 0;
        foreach ($filas as $fila) {
            $resultado[$i] = $this->traerFila($fila);
            $i++;
        }
        return $resultado;
    }

    function cantidad($filterBy = '') {
        $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);

        if ($conn->conectar()) {
            $conn->consulta("SET NAMES 'utf8'");            
            $sql = "SELECT count(*) cantidad FROM `Clientes`";
            if (!empty($filterBy)) {
                $sql .= $filterBy;
            }

            $parametros = array();

            if ($conn->consulta($sql, $parametros)) {
                $result = $conn->siguienteRegistro();
                $retorno = $result['cantidad'];
            } else {
                $retorno = 0;
                $this->ultError = $conn->ultimoError();
            }
        } else {
            $retorno = 0;
            $this->ultError = $conn->ultimoError();
        }
        return $retorno;
    }
}

?>