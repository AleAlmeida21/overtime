<?php

/*
 * 	Clase que representa un registro de la tabla "registros" en la aplicación
 */

class Campana {
    /*
     * 	Atributos de la tabla
     */
    
    var $campId;
    var $campAgencia;
    var $cliId;
    var $campNombre;
    var $campFecSol;
    var $campInvers;
    var $campLanding;
    var $campTargComent;
    var $campFecCre;
    var $campIp;
    var $campIdFb;
    var $campEstado;
    
    var $cliNombre;
    

    /*
     * 	Atributo para almacenar el ultimo error sucedido en alguno de los métodos de la clase
     */
    var $ultError;

    /*
     * 	Constructor para inicializar los datos
     */

    function __construct($campId = 0, $campAgencia = 0, $cliId = '', $campNombre = '', $campFecSol = '', $campInvers = '', $campLanding='', $campTargComent='', $campFecCre="", $campIp="", $campIdFb='', $campEstado='') {
        $this->campId = $campId;
        $this->campAgencia = $campAgencia;
        $this->cliId = $cliId;
        $this->campNombre = $campNombre;
        $this->campFecSol = $campFecSol;
        $this->campInvers = $campInvers;
        $this->campLanding = $campLanding;
        $this->campTargComent = $campTargComent;
        $this->campFecCre = $campFecCre;
        $this->campIp = $campIp;        
        $this->campIdFb = $campIdFb;
        $this->campEstado = $campEstado;
    }

    /*
     * 	Metodo para insertar un nuevo registro a partir de los atributos de la instancia
     *  	Retorna true o false, en caso de error se almacena en el atributo $ultError
     */

    function insertar() {
        $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);

        if ($conn->conectar()) {
            $conn->consulta("SET NAMES 'utf8'"); 
            $sql = "INSERT INTO `Campanas` (
                                            `campId` ,
                                            `campAgencia` ,
                                            `cliId` ,
                                            `campNombre` ,
                                            `campFecSol` ,
                                            `campInvers`,
                                            campLanding,
                                            campTargComent,
                                            campFecCre,
                                            campIp,
                                            campIdFb,
                                            campEstado)
                                    VALUES (
                                            :campId,
                                            :campAgencia,
                                            :cliId,
                                            :campNombre,
                                            :campFecSol,
                                            :campInvers,
                                            :campLanding,
                                            :campTargComent,
                                            NOW(),
                                            :campIp,
                                            :campIdFb,
                                            :campEstado)";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("campId", $this->campId, "int", 0);
            $parametros[1] = array("campAgencia", $this->campAgencia, "string", 50);
            $parametros[2] = array("cliId", $this->cliId, "int", 0);
            $parametros[3] = array("campNombre", $this->campNombre, "string", 255);
            $parametros[4] = array("campFecSol", $this->campFecSol, "string", 10);
            $parametros[5] = array("campInvers", $this->campInvers, "int", 0);
            $parametros[6] = array("campLanding", $this->campLanding, "string", 500);
            $parametros[7] = array("campTargComent", $this->campTargComent, "string", 4000);
            $parametros[8] = array("campIp", $this->campIp, "string", 20);
            $parametros[9] = array("campIdFb", $this->campIdFb, "string", 30);
            $parametros[10] = array("campEstado", $this->campEstado, "string", 16);

            if ($conn->consulta($sql, $parametros)) {
                $this->campId = $conn->ultimoIdInsert();
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
            $sql = "UPDATE `Campanas` SET
                                         `campAgencia` = :campAgencia,
                                         `cliId` = :cliId,
                                         `campNombre` = :campNombre,
                                         `campFecSol` = :campFecSol,
                                         `campInvers` = :campInvers,
                                         campLanding = :campLanding,
                                         campTargComent = :campTargComent,
                                         campIdFb = :campIdFb,
                                         campEstado = :campEstado
					WHERE	`campId` = :campId";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("campId", $this->campId, "int", 0);
            $parametros[1] = array("campAgencia", $this->campAgencia, "string", 50);
            $parametros[2] = array("cliId", $this->cliId, "int", 0);
            $parametros[3] = array("campNombre", $this->campNombre, "string", 255);
            $parametros[4] = array("campFecSol", $this->campFecSol, "string", 10);
            $parametros[5] = array("campInvers", $this->campInvers, "int", 0);
            $parametros[6] = array("campLanding", $this->campLanding, "string", 500);
            $parametros[7] = array("campTargComent", $this->campTargComent, "string", 4000);
            $parametros[8] = array("campIdFb", $this->campIdFb, "string", 30);
            $parametros[9] = array("campEstado", $this->campEstado, "string", 16);
        
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
            $sql = "DELETE FROM `Campanas`
		WHERE	`campId` = :campId";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("campId", $this->campId, "int", 0);

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