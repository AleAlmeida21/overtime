<?php

/*
 * 	Clase que representa un registro de la tabla "registros" en la aplicación
 */

class Usuario {
    /*
     * 	Atributos de la tabla
     */
    
    var $usuId;
    var $usuPass;
    var $usuFecCre;
    var $usuIp;
    var $usuRol;
    var $usuAgencia;
    var $usuCorreo;
    var $cliNombre; //Solo a los efectos de las Grillas
    

    /*
     * 	Atributo para almacenar el ultimo error sucedido en alguno de los métodos de la clase
     */
    var $ultError;

    /*
     * 	Constructor para inicializar los datos
     */

    function __construct($usuId = 0, $usuPass = '', $usuFecCre = '', $usuIp = '', $usuRol = '', $usuAgencia = '', $usuCorreo = '') {
        $this->usuId = $usuId;
        $this->usuPass = $usuPass;
        $this->usuFecCre = $usuFecCre;
        $this->usuIp = $usuIp;
        $this->usuRol = $usuRol;
        $this->usuAgencia = $usuAgencia;
        $this->usuCorreo = $usuCorreo;
    }

    /*
     * 	Metodo para insertar un nuevo registro a partir de los atributos de la instancia
     *  	Retorna true o false, en caso de error se almacena en el atributo $ultError
     */

    function insertar() {
        $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);

        if ($conn->conectar()) {
            $conn->consulta("SET NAMES 'utf8'");
            $sql = "INSERT INTO `Usuarios` (
                                            `usuId` ,
                                            `usuPass` ,
                                            `usuFecCre` ,
                                            `usuIp`,
                                            `usuRol`,
                                            `usuAgencia`,
                                            `usuCorreo`)
                                    VALUES (
                                            :usuId,
                                            :usuPass,
                                            NOW(),
                                            :usuIp,
                                            :usuRol,
                                            :usuAgencia,
                                            :usuCorreo)";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("usuId", $this->usuId, "string", 30);
            $parametros[1] = array("usuPass", $this->usuPass, "string", 255);
            $parametros[2] = array("usuIp", $this->usuIp, "string", 15);
            $parametros[3] = array("usuRol", $this->usuRol, "string", 1);
            $parametros[4] = array("usuAgencia", $this->usuAgencia, "string", 50);
            $parametros[5] = array("usuCorreo", $this->usuCorreo, "string", 255);

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
            $sql = "UPDATE `Usuarios` SET
                                         `usuPass` = :usuPass,
                                         `usuRol` = :usuRol,
                                         `usuAgencia` = :usuAgencia,
                                         `usuCorreo` = :usuCorreo
					WHERE	`usuId` = :usuId";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("usuId", $this->usuId, "string", 30);
            $parametros[1] = array("usuPass", $this->usuPass, "string", 255);
            $parametros[2] = array("usuRol", $this->usuRol, "string", 1);
            $parametros[3] = array("usuAgencia", $this->usuAgencia, "string", 50);
            $parametros[4] = array("usuCorreo", $this->usuCorreo, "string", 255);
            
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
            $sql = "DELETE FROM `Usuarios`
		WHERE	`usuId` = :usuId";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("usuId", $this->usuId, "string", 30);

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