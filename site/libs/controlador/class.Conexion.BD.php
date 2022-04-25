<?php
/********************************************************************************************************************************/
/* 										CLASE PARA CONEXION A BASES DE DATOS													*/
/********************************************************************************************************************************/
/* Autor : Wunderman Montevideo																									*/
/* Fehca : Abril 2012																											*/
/* Versi�n : 1.0.0																												*/
/* Descripci�n : Clase que permite establecer una conexi�n con distintos motores de bases de datos para ejecutar consultas   	*/
/*				 SQL sobre las tablas de una base de datos.                             										*/
/*				 La misma utiliza el objeto PHP : PDO que habilita una capa de abstracci�n para el manejo de las conexiones 	*/
/*				 a las bases de datos.                                                                                        	*/
/* Uso:																															*/
/*																																*/
/* <?php																														*/
/*																																*/
/*		require("class.Conexion.BD.php");																						*/
/*																																*/
/*		$conn = new ConexionBD(<motor>,<server>,<base>,<usuario>,<clave>,<debug>);                           					*/
/*																																*/
/*		// motor 	-> texto respresentando al motor de BD ej. "mysql"															*/
/*		// server 	-> servidor a conectarse (ip o nombre)																		*/
/*		// base 	-> nombre de la base de datos a utilizar          															*/
/*		// usuario	-> usuario para acceder a la base de datos         															*/
/*		// clave 	-> clave del usuario para acceder a la base de datos														*/
/*		// debug 	-> si se habilita el modo debug o no (Experimental) true o false											*/
/*																																*/
/*		$conn->funcionalidad(argumentos);																						*/
/*																																*/
/* ?>																															*/
/*																																*/
/* Funcionalidades:																												*/
/*					* conectar() -> Establece la conexi�n con los valores pasados al construir el objeto						*/
/*					* desconectar() -> Elimina la conexi�n establecida															*/
/*					* ultimoError() -> Si se sucedi�n error, el texto del �ltimo error es devuelto								*/
/*					* consulta(<sql>,<parametros>) -> Ejecuta una consulta con los valores recibidos							*/
/*						<sql> -> texto de la consulta sql, donde se parametrizan los valores con :<nom_parametro>				*/
/*						<parametros> -> array con arrays para cada par�metro seg�n el siguiente formato:						*/
/*										{parametro, valor, tipo_de_datos, largo} donde los tipos posibles: bool, int, string	*/
/*					* siguienteRegistro() -> retorna un array asociativo con el siguiente registro de la consulta ejecutada 	*/
/*											o falso si no hay m�s registros														*/
/*					* restantesRegistros() -> retorna un array con los restantes registros (o todos si no se solicit� ninguno)	*/
/*											como arrays, o falso en caso de que no haya.										*/
/*					* cantidadColumnas() -> retorna la cantidad de columnas de los registros de la �ltima consulta.				*/
/*					* cantidadRegistros() -> retorna el total de registros retornados por la �ltima consulta.					*/
/********************************************************************************************************************************/

class ConexionBD
{
	var $dsn;
	var $usuario;
	var $clave;
	var $conexion;
	var $sentencia;
	var $ultimoError;
	var $debugMode;
	
	/*
	 *	Constructor de la clase
	 */
	function __construct($motor, $servidor, $db, $usuario, $clave, $debug=false){
		//lista de servidores de datos soportados, agrear aqu� para nuevos motores los dsn correspondientes.
		switch (strtolower($motor)){
			case "mysql":
				$this->dsn = "mysql:dbname=" . $db . ";host=" . $servidor;
				break;
		}
		$this->usuario = $usuario;
		$this->clave = $clave;
		$this->debugMode = $debug;
	}

	/*
	 *	M�todo que establece la conexi�n con los datos pasados al constructor
	 */
	function conectar(){
 		try{ 
			$this->conexion = new PDO($this->dsn, $this->usuario, $this->clave);
			//determino si los errores son por warnings a pantalla o por excepciones
			if ($this->debugMode){
				$this->conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			}
			else{
				$this->conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			}
			$retorno = true;
		}
		catch (PDOException $e){
			//guardo el error generado
			$this->conexion = null;
			$this->ultimoError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
			$retorno = false;
		}
		return $retorno;
	}
	
	/*
	 *	M�todo que elimina la conexi�n establecida
	 */
	function desconectar(){
		unset($this->conexion);
	}
	
	/*
	 *	M�todo que retorna el �ltimo error generado
	 */
	function ultimoError(){
		return $this->ultimoError;
	}
	
	/*
	 *	M�todo que ejecuta una SQL contra la conexi�n establecida
	 *		La sql tiene que tener parametrizado los valores a utilizar en ella como :variable	Ej: SELECT * FROM CLIENTES WHERE id = :id
	 *		La lista de par�metros es un array con los par�metros que deben venir en el siguiente formato {parametro, valor, tipo_de_datos, largo}
	 *		Los tipos posibles: bool, int, string
	 */
	function consulta($sql,$parametros = array()){
		try{
			$this->sentencia = $this->conexion->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			//tipos posibles de datos recibidos para los argumentos
			foreach ($parametros as $parametro){
				switch ($parametro[2]){
					case "bool":
						$tipo = PDO::PARAM_BOOL;
						break;
					case "int":
						$tipo = PDO::PARAM_INT;
						break;
					case "string":
						$tipo = PDO::PARAM_STR;
						break;
					
				}
				//paso los par�metros para que sean filtrados antes de incluirlos en la SQL
				$this->sentencia->bindParam($parametro[0], $parametro[1], $tipo, $parametro[3]);
			}
			$this->sentencia->execute();
			$retorno = true;
		}
		catch (PDOException $e){
			//guardo el error generado
			$this->sentencia = null;
			$this->ultimoError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
			$retorno = false;
		}
		return $retorno;
	}
	/*
	 *	M�todo que retorna el ultimo id ingresado
	 */
	function ultimoIdInsert(){
		try{
			$retorno = $this->conexion->lastInsertId();
		}
		catch (PDOException $e){
			//guardo el error generado
			$this->ultimoError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
			$retorno = false;
		}
		return $retorno;
	}
	/*
	 *	M�todo que retorna el siguiente registro como un array o falso si no hay registro para retornar
	 */
	function siguienteRegistro(){
		try{
			$retorno = $this->sentencia->fetch(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e){
			//guardo el error generado
			$this->ultimoError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
			$retorno = false;
		}
		return $retorno;
	}
	
	/*
	 *	M�todo que retorna los registros restantes como un array de arrays o falso si no hay registro para retornar
	 */
	function restantesRegistros(){
		try{
			$retorno = $this->sentencia->fetchAll();
		}
		catch (PDOException $e){
			$this->ultimoError = "{" . date("d/m/Y H:i:s") . "} " . $e->getMessage();
			$retorno = false;
		}
		return $retorno;
	}
	
	/*
	 *	M�todo que retorna la cantidad de columnas de la consulta ejecutada
	 */	
	function cantidadColumnas(){
		return $this->sentencia->columnCount();
	}

	/*
	 *	M�todo que retorna la cantidad de filas de la consulta ejecutada
	 */	
	function cantidadRegistros(){
		return $this->sentencia->rowCount();
	}
}

?>