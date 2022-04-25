<?php

/*
 * 	Clase que representa un registro de la tabla "registros" en la aplicación
 */

class Cliente {
    /*
     * 	Atributos de la tabla
     */
    
    var $cliId;
    var $cliNombre;
    var $cliFecCre;
    var $cliIp;
    var $cliAgencia;
    var $cliFbId;

    /*
     * 	Atributo para almacenar el ultimo error sucedido en alguno de los métodos de la clase
     */
    var $ultError;

    /*
     * 	Constructor para inicializar los datos
     */

    function __construct($cliId = 0, $cliNombre = '', $cliFecCre = '', $cliIp = '', $cliAgencia='', $cliFbId="") {
        $this->cliId = $cliId;
        $this->cliNombre = $cliNombre;
        $this->cliFecCre = $cliFecCre;
        $this->cliIp = $cliIp;
        $this->cliAgencia = $cliAgencia;
        $this->cliFbId = $cliFbId;
    }

    /*
     * 	Metodo para insertar un nuevo registro a partir de los atributos de la instancia
     *  	Retorna true o false, en caso de error se almacena en el atributo $ultError
     */

    function insertar() {
        $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);

        if ($conn->conectar()) {
            $conn->consulta("SET NAMES 'utf8'");
            $sql = "INSERT INTO `Clientes` (
                                            `cliId` ,
                                            `cliNombre` ,
                                            `cliFecCre` ,
                                            `cliIp`,
                                            `cliAgencia`,
                                            `cliFbId`)
                                    VALUES (
                                            :cliId,
                                            :cliNombre,
                                            NOW(),
                                            :cliIp,
                                            :cliAgencia,
                                            :cliFbId)";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("cliId", $this->cliId, "int", 0);
            $parametros[1] = array("cliNombre", $this->cliNombre, "string", 100);
            $parametros[2] = array("cliIp", $this->cliIp, "string", 15);
            $parametros[3] = array("cliAgencia", $this->cliAgencia, "string", 50);
            $parametros[4] = array("cliFbId", $this->cliFbId, "string", 30);

            if ($conn->consulta($sql, $parametros)) {
                $retorno = true;
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

    /*
     * 	Metodo para actualizar un registro a partir de los atributos de la instancia
     *  	Retorna true o false, en caso de error se almacena en el atributo $ultError
     */

    function actualizar() {
        $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);

        if ($conn->conectar()) {
            $conn->consulta("SET NAMES 'utf8'");            
            $sql = "UPDATE `Clientes` SET
                                        `cliNombre` = :cliNombre,
                                        `cliAgencia` = :cliAgencia,
                                        `cliFbId` = :cliFbId
					WHERE	`cliId` = :cliId";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("cliId", $this->cliId, "int", 0);
            $parametros[1] = array("cliNombre", $this->cliNombre, "string", 100);
            $parametros[2] = array("cliAgencia", $this->cliAgencia, "string", 50);
            $parametros[3] = array("cliFbId", $this->cliFbId, "string", 30);
            
            if ($conn->consulta($sql, $parametros)) {
                $retorno = true;
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

    /*
     * 	Metodo para borrar un nuevo registro a partir del id de la instancia
     *  	Retorna true o false, en caso de error se almacena en el atributo $ultError
     */

    function borrar() {
        $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);

        if ($conn->conectar()) {
            $sql = "DELETE FROM `Clientes`
		WHERE	`cliId` = :cliId";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("cliId", $this->cliId, "int", 0);

            if ($conn->consulta($sql, $parametros)) {
                $retorno = true;
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

    /*
     * 	Metodo para retornar el ultimo error generado en el acceso a los datos
     */

    function ultimoError() {
        return $this->ultError;
    }

}

?>