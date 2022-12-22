<?php

require_once("modelos/generico.php");

class usuario extends generico {

	protected $Usuario;

	protected $UsuarioClave;

	protected $RolNombre;

	public function traerUsuario(){
		return $this->Usuario;
	}

	public function traerRolNombre(){
		return $this->RolNombre;
	}

	public function constructor($arrayDatos = array()){

		$this->UsuarioId 			= $this->extraerDatos($arrayDatos,'UsuarioId');
		$this->Usuario 				= $this->extraerDatos($arrayDatos,'Usuario');
		$this->RolNombre			= $this->extraerDatos($arrayDatos,'RolNombre');
	
	}

	public function login($Usuario, $UsuarioClave){


		$sql = "SELECT * FROM usuario 
					WHERE Usuario = :Usuario AND UsuarioClave = :UsuarioClave";
		$arrayDatos = array();
		$arrayDatos['Usuario'] 	= $Usuario;
		$arrayDatos['UsuarioClave'] 	= md5($UsuarioClave);
		$respuesta = $this->cargarDatos($sql, $arrayDatos);

		foreach($respuesta as $Usuario){

			@session_start();
			$_SESSION['Usuario'] = $Usuario['Usuario'];
			return "OK";

		}

		return "Error";

	}

}

?>



