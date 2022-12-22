<?php


	class generico{

		protected $ClienteId;


		public function traerClienteId(){
			return $this->ClienteId;
		}

		public function extraerDatos($arrayDatos, $clave){

			if(isset($arrayDatos[$clave])){
				return $arrayDatos[$clave];
			}
			return "";
		}


		public function imputarCambio($sql, $arrayDatos = array()){

			include("configuracion/configuracion.php");
			$conexion = new PDO("mysql:host=".$DBHOST.":".$DBPORT.";dbname=".$DBDATABASE."", $DBUSER, $DBPASSWORD);                                
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

			$mysqlPrepare = $conexion->prepare($sql);
			$respuesta = $mysqlPrepare->execute($arrayDatos);
			$retorno = array();
			if($respuesta){
				$retorno['codigo'] = "Ok";
			}else{
				$retorno['codigo'] = "Error";
			}
			return $retorno;
		}

		public function cargarDatos($sql, $arrayDatos = array()){

			include("configuracion/configuracion.php");
			$conexion = new PDO("mysql:host=".$DBHOST.":".$DBPORT.";dbname=".$DBDATABASE."", $DBUSER, $DBPASSWORD);                                
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			
			$mysqlPrepare = $conexion->prepare($sql);		
			$mysqlPrepare->execute($arrayDatos);
			$respuesta = $mysqlPrepare->fetchAll(PDO::FETCH_ASSOC);

			return $respuesta;

		}
    }

?>