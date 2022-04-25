<?php

/*
 * 	Clase que representa un registro de la tabla "registros" en la aplicación
 */

class CampPlanMed {
    /*
     * 	Atributos de la tabla
     */
    
    var $plaId;
    var $campId;
    var $plaUbicacion;
    var $plaMedio;
    var $plaDispositivo;
    var $plaFormato;
    var $plaIniCamp;
    var $plaFinCamp;
    var $plaAdServ;
    var $plaInversion;
    var $plaKPI;
    var $plaObjetivo;
    var $plaFecCre;
    var $plaIp;
    var $plaConjAnFB;
    

    /*
     * 	Atributo para almacenar el ultimo error sucedido en alguno de los métodos de la clase
     */
    var $ultError;

    /*
     * 	Constructor para inicializar los datos
     */

    function __construct($plaId = 0, $campId = 0, $plaUbicacion = '', $plaMedio = '', $plaDispositivo = '', $plaFormato = '', $plaIniCamp='', $plaFinCamp='', $plaAdServ="", $plaInversion=0, $plaKPI='', $plaObjetivo='', $plaFecCre='', $plaIp='', $plaConjAnFB="") {
        $this->plaId = $plaId;
        $this->campId = $campId;
        $this->plaUbicacion = $plaUbicacion;
        $this->plaMedio = $plaMedio;
        $this->plaDispositivo = $plaDispositivo;
        $this->plaFormato = $plaFormato;
        $this->plaIniCamp = $plaIniCamp;
        $this->plaFinCamp = $plaFinCamp;
        $this->plaAdServ = $plaAdServ;
        $this->plaInversion = $plaInversion;
        $this->plaKPI = $plaKPI;        
        $this->plaObjetivo = $plaObjetivo;        
        $this->plaFecCre = $plaFecCre;        
        $this->plaIp = $plaIp;        
        $this->plaConjAnFB = $plaConjAnFB;
    }

    /*
     * 	Metodo para insertar un nuevo registro a partir de los atributos de la instancia
     *  	Retorna true o false, en caso de error se almacena en el atributo $ultError
     */

    function insertar() {
        $conn = new ConexionBD(MOTORBD, SERVIDORBD, BASEDATOS, USUARIOBD, CLAVEBD);

        if ($conn->conectar()) {
            $conn->consulta("SET NAMES 'utf8'"); 
            $sql = "INSERT INTO `CampPlanMed` (
                                            `plaId` ,
                                            `campId` ,
                                            `plaUbicacion` ,
                                            `plaMedio` ,
                                            `plaDispositivo` ,
                                            `plaFormato`,
                                            `plaIniCamp`,
                                            `plaFinCamp`,
                                            `plaAdServ`,
                                            `plaInversion`,
                                            `plaKPI`,
                                            `plaObjetivo`,
                                            `plaFecCre`,
                                            `plaIp`,
                                            plaConjAnFB)
                                    VALUES (
                                            :plaId,
                                            :campId,
                                            :plaUbicacion,
                                            :plaMedio,
                                            :plaDispositivo,
                                            :plaFormato,
                                            :plaIniCamp,
                                            :plaFinCamp,
                                            :plaAdServ,
                                            :plaInversion,
                                            :plaKPI,
                                            :plaObjetivo,
                                            NOW(),
                                            :plaIp,
                                            :plaConjAnFB)";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("plaId", $this->plaId, "int", 0);
            $parametros[1] = array("campId", $this->campId, "int", 0);
            $parametros[2] = array("plaUbicacion", $this->plaUbicacion, "string", 30);
            $parametros[3] = array("plaMedio", $this->plaMedio, "string", 30);
            $parametros[4] = array("plaDispositivo", $this->plaDispositivo, "string", 30);
            $parametros[5] = array("plaFormato", $this->plaFormato, "string", 30);
            $parametros[6] = array("plaIniCamp", $this->plaIniCamp, "string", 10);
            $parametros[7] = array("plaFinCamp", $this->plaFinCamp, "string", 10);
            $parametros[8] = array("plaAdServ", $this->plaAdServ, "varchar", 30);
            $parametros[9] = array("plaInversion", $this->plaInversion, "int", 0);
            $parametros[10] = array("plaKPI", $this->plaKPI, "string", 30);
            $parametros[11] = array("plaObjetivo", $this->plaObjetivo, "string", 100);
            $parametros[12] = array("plaIp", $this->plaIp, "string", 15);
            $parametros[13] = array("plaConjAnFB", $this->plaConjAnFB, "string", 30);

            if ($conn->consulta($sql, $parametros)) {
                $this->camId = $conn->ultimoIdInsert();
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
            $sql = "UPDATE `CampPlanMed` SET
                                         `plaUbicacion` = :plaUbicacion,
                                         `plaMedio` = :plaMedio,
                                         `plaDispositivo` = :plaDispositivo,
                                         `plaFormato` = :plaFormato,
                                         `plaIniCamp` = :plaIniCamp,
                                         `plaAdServ` = :plaAdServ,
                                         `plaInversion` = :plaInversion,
                                         `plaKPI` = :plaKPI,
                                         `plaObjetivo` = :plaObjetivo,
                                         plaConjAnFB = :plaConjAnFB
					WHERE	`plaId` = :plaId AND `campId` = :campId";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("plaId", $this->plaId, "int", 0);
            $parametros[1] = array("campId", $this->campId, "int", 0);
            $parametros[2] = array("plaUbicacion", $this->plaUbicacion, "string", 30);
            $parametros[3] = array("plaMedio", $this->plaMedio, "string", 30);
            $parametros[4] = array("plaDispositivo", $this->plaDispositivo, "string", 30);
            $parametros[5] = array("plaFormato", $this->plaFormato, "string", 30);
            $parametros[6] = array("plaIniCamp", $this->plaIniCamp, "string", 10);
            $parametros[7] = array("plaFinCamp", $this->plaFinCamp, "string", 10);
            $parametros[8] = array("plaAdServ", $this->plaAdServ, "varchar", 30);
            $parametros[9] = array("plaInversion", $this->plaInversion, "int", 0);
            $parametros[10] = array("plaKPI", $this->plaKPI, "string", 30);
            $parametros[11] = array("plaObjetivo", $this->plaObjetivo, "string", 100);
            $parametros[12] = array("plaConjAnFB", $this->plaConjAnFB, "string", 30);
        
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
            $sql = "DELETE FROM `CampPlanMed`
		WHERE	`plaId` = :plaId AND `campId` = :campId";

            $parametros = array();
            /*
             * 	Al pasar los parámetros se debe ajustar el tipo y tamaño de los datos, los enteros van con tamaño 0
             */
            $parametros[0] = array("plaId", $this->plaId, "int", 0);
            $parametros[1] = array("campId", $this->campId, "int", 0);

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