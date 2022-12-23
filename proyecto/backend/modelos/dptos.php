<?php

require_once("modelos/generico.php");


class departamento extends generico {

	protected $DptoId;   
	protected $DptoNombre;
	protected $DptoCiudadCapital;

	public function traerDptoId(){
		return $this->DptoId;
	}

	public function traerDptoNombre(){
		return $this->DptoNombre;
	}

	public function traerDptoCiudadCapital(){
		return $this->DptoCiudadCapital;
	}


	public function constructor($arrayDatos = array()){
		
		$this->DptoId 				= $this->extraerDatos($arrayDatos,'DptoId');
		$this->DptoNombre 			= $this->extraerDatos($arrayDatos,'DptoNombre');
		$this->DptoCiudadCapital	= $this->extraerDatos($arrayDatos,'DptoCiudadCapital');

	}

	public function listarDpto(){
		
		$sql = 'SELECT 
					DptoId,	
					DptoNombre AS nombreDpto
					FROM departamento dpto';		
		$arraySql = array();
		$retorno = $this->cargarDatos($sql, $arraySql);
		return $retorno;

	}

}
?>