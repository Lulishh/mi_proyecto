<?php

require_once("modelos/generico.php");


class cliente extends generico {


	protected $clienteId;   
	protected $ClienteApellido;
	protected $ClienteNombre;
	protected $ClienteDocumento;
	protected $ClienteTelefono;
	//indica si esta activo o dado de baja el cliente
	protected $ClienteEstado;
	
	public function traerClienteId(){
		return $this->clienteId;
	}

	public function traerClienteApellido(){
		return $this->ClienteApellido;
	}

	public function traerfechaClienteNombre(){
		return $this->ClienteNombre;
	}

	public function traerClienteDocumento(){
		return $this->ClienteDocumento;
	}

	public function traerClienteTelefono(){
		return $this->ClienteTelefono;
	}

    public function constructor($arrayDatos){

		$this->clienteId          = $arrayDatos['clienteId'];   
		$this->clienteApellido    = $arrayDatos['clienteApellido'];
		$this->clienteNombre      = $arrayDatos['clienteNombre'];
		$this->clienteDocumento   = $arrayDatos['clienteDocumento'];
		$this->clienteTelefono    = $arrayDatos['clienteTelefono'];
		$this->clienteEstado      = $arrayDatos['clienteEstado'];
	}

	public function ingresar(){

		$sqlInsert = "INSERT cliente SET
						clienteId 			= :clienteId,
						clienteApellido		= :clienteApellido,
						clienteNombre		= :clienteNombre,
						clienteDocumento 	= :clienteDocumento,
						clienteTelefono		= :clienteTelefono";
		$arraySql = array(
						"clienteId" 			=> $this->clienteId,
						"clienteApellido" 		=> $this->clienteApellido,
						"clienteNombre" 		=> $this->clienteNombre,
						"clienteDocumento" 		=> $this->clienteDocumento,
						"clienteTelefono" 		=> $this->clienteTelefono
					);
			
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function editar(){

		$sqlInsert = "UPDATE cliente SET
						clienteId 			= :clienteId,
						clienteApellido		= :clienteApellido,
						clienteNombre		= :clienteNombre,
						clienteDocumento 	= :clienteDocumento,
						clienteTelefono		= :clienteTelefono";	
		$arraySql = array(
						"clienteId" 			=> $this->clienteId,
						"clienteApellido" 		=> $this->clienteApellido,
						"clienteNombre" 		=> $this->clienteNombre,
						"clienteDocumento" 		=> $this->clienteDocumento,
						"clienteTelefono" 		=> $this->clienteTelefono
					);
		
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function borrar(){

		$sqlInsert = "UPDATE cliente SET estado = 0 WHERE clienteId = :clienteId";	
		$mysqlPrepare = $conexion->prepare($sqlInsert);
		$arraySql = array(
						"clienteId" => $this->clienteId,
					);
	
		$retorno = $this->inputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function listar($arrayFiltros = array()){
		/*
			$arrayFiltros['pagina'] : numero de pagina que estoy
			$arrayFiltros['totalRegistro'] : el numero total de registro que vamos a traer
		*/

		$conexion = new PDO("mysql:host=localhost:3306;dbname=proyecto_correo", 'root', '');                                
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
		$sql = "SELECT * FROM cliente";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (nombre LIKE ('%".$arrayFiltros['busqueda']."%') ";
		}
		//SELECT * FROM autores a LIMIT 10,5;
		if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

			$origen = ($arrayFiltros['pagina'] -1) * $arrayFiltros['totalRegistro'];
			$sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
		
		}
		$arrayDatos = array();

		$respuesta = $this->cargarDatos($sql, $arrayDatos);
		return $respuesta;

	}

	public function totalRegistros($arrayFiltros = array()){
		/*
			$arrayFiltros['pagina'] : numero de pagina que estoy
			$arrayFiltros['totalRegistro'] : el numero total de registro que vamos a traer
		*/

		$sql = "SELECT count(id) as total FROM cliente 
					WHERE estado = 1";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (nombre LIKE ('%".$arrayFiltros['busqueda']."%') ";
		}

		$arrayDatos = array();
		$retorno = 0;

		$respuesta = $this->cargarDatos($sql, $arrayDatos);
		foreach($respuesta as $total){
			$retorno = $total['total'];
		}

		return $retorno;

	}

	}

?>



