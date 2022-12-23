<?php

require_once("modelos/generico.php");


class cliente extends generico {


	protected $ClienteId;   
	protected $ClienteApellido;
	protected $ClienteNombre;
	protected $ClienteDocumento;
	protected $ClienteTelefono;


	
	public function traerClienteId(){
		return $this->ClienteId;
	}

	public function traerClienteApellido(){
		return $this->ClienteApellido;
	}

	public function traerClienteNombre(){
		return $this->ClienteNombre;
	}

	public function traerClienteDocumento(){
		return $this->ClienteDocumento;
	}

	public function traerClienteTelefono(){
		return $this->ClienteTelefono;
	}



    public function constructor($arrayDatos = array()){
		
		$this->ClienteId 			= $this->extraerDatos($arrayDatos,'ClienteId');
		$this->ClienteApellido 		= $this->extraerDatos($arrayDatos,'ClienteApellido');
		$this->ClienteNombre		= $this->extraerDatos($arrayDatos,'ClienteNombre');
		$this->ClienteDocumento 	= $this->extraerDatos($arrayDatos,'ClienteDocumento');
		$this->ClienteTelefono 		= $this->extraerDatos($arrayDatos,'ClienteTelefono');

	}

	public function ingresar(){

		$sqlInsert = "INSERT cliente SET
						ClienteApellido		= :ClienteApellido,
						ClienteNombre		= :ClienteNombre,
						ClienteDocumento 	= :ClienteDocumento,
						ClienteTelefono		= :ClienteTelefono,
						ClienteEstado		=1";
		$arraySql = array(
						"ClienteApellido" 		=> $this->ClienteApellido,
						"ClienteNombre" 		=> $this->ClienteNombre,
						"ClienteDocumento" 		=> $this->ClienteDocumento,
						"ClienteTelefono" 		=> $this->ClienteTelefono
					);
			
		$retorno = $this->imputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function editar(){

		$sqlInsert = "UPDATE cliente SET
						ClienteApellido		= :ClienteApellido,
						ClienteNombre		= :ClienteNombre,
						ClienteDocumento 	= :ClienteDocumento,
						ClienteTelefono		= :ClienteTelefono
						WHERE ClienteId = :ClienteId";	
		$arraySql = array(
						"ClienteApellido" 		=> $this->ClienteApellido,
						"ClienteNombre" 		=> $this->ClienteNombre,
						"ClienteDocumento" 		=> $this->ClienteDocumento,
						"ClienteTelefono" 		=> $this->ClienteTelefono,
						"ClienteId" 			=> $this->ClienteId,
					);
		
		$retorno = $this->imputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}

	public function borrar(){

		$sqlInsert = "UPDATE cliente SET ClienteEstado = 0 WHERE ClienteId = :ClienteId";	
		$arraySql = array(
						"ClienteId" => $this->ClienteId,
					);
	
		$retorno = $this->imputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}


	public function listar($arrayFiltros = array()){
	
		$sql = "SELECT * FROM cliente
					WHERE ClienteEstado = 1";

		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (ClienteApellido LIKE ('%".$arrayFiltros['busqueda']."%')";
			$sql .= " OR ClienteNombre LIKE ('%".$arrayFiltros['busqueda']."%')";
			$sql .= " OR ClienteDocumento LIKE ('%".$arrayFiltros['busqueda']."%'))";
		}
	
		if(isset($arrayFiltros['totalRegistro']) && $arrayFiltros['totalRegistro']>0){

			$origen = ($arrayFiltros['pagina'] -1) * $arrayFiltros['totalRegistro'];
			$sql .= " LIMIT ".$origen.",".$arrayFiltros['totalRegistro'];
		
		}
		$arrayDatos = array();

		$respuesta = $this->cargarDatos($sql, $arrayDatos);
		return $respuesta;

	}

	public function totalRegistros($arrayFiltros = array()){

		$sql = "SELECT count(ClienteId) as total FROM cliente
					WHERE ClienteEstado = 1";
				
		
		if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
			$sql .= " AND (ClienteApellido LIKE ('%".$arrayFiltros['busqueda']."%')";
			$sql .= " OR ClienteNombre LIKE ('%".$arrayFiltros['busqueda']."%')";
			$sql .= " OR ClienteDocumento LIKE ('%".$arrayFiltros['busqueda']."%'))";
		}

		$arrayDatos = array();
		$retorno = 0;

		$respuesta = $this->cargarDatos($sql, $arrayDatos);
		foreach($respuesta as $total){
			$retorno = $total['total'];
		}

		return $retorno;

	}
	
	public function cargar($ClienteId){


		$sql = "SELECT * FROM cliente WHERE ClienteId = :ClienteId";

		$arrayDatos = array();
		$arrayDatos['ClienteId'] = $ClienteId;
		$respuesta = $this->cargarDatos($sql, $arrayDatos);

		foreach($respuesta as $cliente){

			$this->ClienteId 			= $cliente['ClienteId'];
			$this->ClienteApellido		= $cliente['ClienteApellido'];
			$this->ClienteNombre		= $cliente['ClienteNombre'];
			$this->ClienteDocumento		= $cliente['ClienteDocumento'];
			$this->ClienteTelefono 		= $cliente['ClienteTelefono'];
		}

	}

	public function listarCliente(){
	
		$sql = 'SELECT 
					ClienteId,	
					CONCAT(ClienteApellido, " ",ClienteNombre, " - ",ClienteDocumento) AS nombreC
					FROM cliente c
					WHERE ClienteEstado = 1';		
		$arraySql = array();
		$retorno = $this->cargarDatos($sql, $arraySql);
		return $retorno;

	}

}
?>