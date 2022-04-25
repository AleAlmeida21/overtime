<?php

/*
 * 	Clase que representa un registro de la tabla "registros" en la aplicación
 */

class Acceso {
    /*
     * 	Atributos de la tabla
     */
    
    var $appid;
    var $secret;
    var $token;

    /*
     * 	Atributo para almacenar el ultimo error sucedido en alguno de los métodos de la clase
     */
    var $ultError;

    /*
     * 	Constructor para inicializar los datos
     */

    function __construct($appid = '', $secret = '', $token = '') {
        $this->appid = $appid;
        $this->secret = $secret;
        $this->token = $token;
    }

    /*
     * 	Metodo para actualizar un registro a partir de los atributos de la instancia
     *  	Retorna true o false, en caso de error se almacena en el atributo $ultError
     */

    function actualizar() {
        $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);

        if ($conn->conectar()) {
            $conn->consulta("SET NAMES 'utf8'");            
            $sql = "UPDATE `Accesos` SET
                                        `appid` = :appid,
                                        `secret` = :secret,
                                        `token` = :token";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("appid", $this->appid, "string", 20);
            $parametros[1] = array("secret", $this->secret, "string", 40);
            $parametros[2] = array("token", $this->token, "string", 200);
            
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