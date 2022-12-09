<?php

require_once("modelos/generico.php");

class usuario extends generico {

	protected $nombre;

	protected $clave;

	protected $RolNombre;

	public function traerNombre(){
		return $this->nombre;
	}

	public function traerRolNombre(){
		return $this->RolNombre;
	}

	public function constructor($arrayDatos = array()){

		$this->UsuarioId 				= $this->extraerDatos($arrayDatos,'id');
		$this->UsuarioUsuario 			= $this->extraerDatos($arrayDatos,'nombre');
		$this->RolNombre		= $this->extraerDatos($arrayDatos,'RolNombre');
	
	}

	public function login($usuario, $clave){


		$sql = "SELECT * FROM usuario 
					WHERE nombre = :nombre AND clave = :clave";
		$arrayDatos = array();
		$arrayDatos['nombre'] 	= $usuario;
		$arrayDatos['clave'] 	= md5($clave);
		$respuesta = $this->cargarDatos($sql, $arrayDatos);

		foreach($respuesta as $usuario){

			@session_start();
			$_SESSION['nombre'] = $usuario['nombre'];
			return "OK";

		}

		return "Error";

	}

}

?>



