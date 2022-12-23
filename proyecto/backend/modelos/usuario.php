<?php

require_once("modelos/generico.php");

class usuario extends generico {

	protected $Usuario;

	protected $UsuarioClave;

	protected $UsuarioNombre;

	protected $RolId;

	public function traerUsuario(){
		return $this->Usuario;
	}

	public function traerUsuarioNombre(){
		return $this->UsuarioNombre;
	}

	public function constructor($arrayDatos = array()){

		$this->UsuarioId 			= $this->extraerDatos($arrayDatos,'UsuarioId');
		$this->Usuario 				= $this->extraerDatos($arrayDatos,'UsuarioUsuario');
		$this->UsuarioNombre		= $this->extraerDatos($arrayDatos,'UsuarioNombre');
		$this->RolId				= $this->extraerDatos($arrayDatos,'RolId');
	
	}

	public function login($Usuario, $UsuarioClave){


		$sql = "SELECT * FROM usuario 
					WHERE UsuarioUsuario = :UsuarioUsuario AND UsuarioClave = :UsuarioClave";
		$arrayDatos = array();
		$arrayDatos['UsuarioUsuario'] 	= $Usuario;
		$arrayDatos['UsuarioClave'] 	= md5($UsuarioClave);
		$respuesta = $this->cargarDatos($sql, $arrayDatos);

		foreach($respuesta as $Usuario){

			@session_start();
			$_SESSION['UsuarioUsuario'] = $Usuario['UsuarioUsuario'];
			return "OK";

		}

		return "Error";

	}

}

?>



