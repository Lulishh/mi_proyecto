<?php

require_once("modelos/generico.php");


class envio extends generico {

	protected $EnvioId;   
	protected $EnvioCodigo;
	protected $ClienteId;
	protected $EnvioDestinatario;
	protected $EnvioCodigoPostal;
    protected $EnvioCalle;
	protected $EnvioNroPuerta;
    protected $EnvioApto;
	protected $EnvioCiudad;
    protected $EnvioDepartamento;
	protected $EnvioTelefono;
    protected $EnvioFecha;
    protected $EnvioHora;
	protected $EnvioComentarios;
    protected $EnvioEstadoPaquete;
    protected $EnvioEstado;
	

    public function traerEnvioId(){
		return $this->EnvioId;
	}

	public function traerEnvioCodigo(){
		return $this->EnvioCodigo;
	}

	public function traerClienteId(){
		return $this->ClienteId;
	}

	public function traerEnvioDestinatario(){
		return $this->EnvioDestinatario;
	}

	public function traerEnvioCodigoPostal(){
		return $this->EnvioCodigoPostal;
	}

	public function traerEnvioCalle(){
		return $this->EnvioCalle;
	}

	public function traerEnvioNroPuerta(){
		return $this->EnvioNroPuerta;
	}
	public function traerEnvioApto(){
		return $this->EnvioApto;
	}

	public function traerEnvioCiudad(){
		return $this->EnvioCiudad;
	}

	public function traerEnvioDepartamento(){
		return $this->EnvioDepartamento;
	}

	public function traerClienteTelefono(){
		return $this->ClienteTelefono;
	}

	public function traerEnvioFecha(){
		return $this->EnvioFecha;
	}

	public function traerEnvioHora(){
		return $this->EnvioHora;
	}

	public function traerEnvioComentarios(){
		return $this->EnvioComentarios;
	}

    public function traerEnvioEstadoPaquete(){
		return $this->EnvioEstadoPaquete;
	}

    public function traerEnvioEstado(){
		return $this->EnvioEstado;
	}



    public function constructor($arrayDatos = array()){
		
		$this->EnvioId 			        = $this->extraerDatos($arrayDatos,'EnvioId');
		$this->EnvioCodigo 		        = $this->extraerDatos($arrayDatos,'EnvioCodigo');
        $this->ClienteId		        = $this->extraerDatos($arrayDatos,'ClienteId');
		$this->EnvioDestinatario		= $this->extraerDatos($arrayDatos,'EnvioDestinatario');
		$this->EnvioCodigoPostal 	    = $this->extraerDatos($arrayDatos,'EnvioCodigoPostal');
		$this->EnvioCalle 		        = $this->extraerDatos($arrayDatos,'EnvioCalle');
        $this->EnvioNroPuerta 			= $this->extraerDatos($arrayDatos,'EnvioNroPuerta');
		$this->EnvioApto 		        = $this->extraerDatos($arrayDatos,'EnvioApto');
		$this->EnvioCiudad		        = $this->extraerDatos($arrayDatos,'EnvioCiudad');
		$this->EnvioDepartamento        = $this->extraerDatos($arrayDatos,'EnvioDepartamento');
		$this->EnvioTelefono 	    	= $this->extraerDatos($arrayDatos,'EnvioTelefono');
        $this->EnvioFecha 		        = $this->extraerDatos($arrayDatos,'EnvioFecha');
		$this->EnvioHora		        = $this->extraerDatos($arrayDatos,'EnvioHora');
		$this->EnvioComentarios         = $this->extraerDatos($arrayDatos,'EnvioComentarios');
        $this->EnvioEstadoPaquete 	    = $this->extraerDatos($arrayDatos,'EnvioEstadoPaquete');
		$this->EnvioEstado 	    	    = $this->extraerDatos($arrayDatos,'EnvioEstado');

	}

	public function ingresar(){

		$sqlInsert = "INSERT envio SET
						EnvioCodigo		    = :EnvioCodigo,
						ClienteId 	        = :ClienteId,
						EnvioDestinatario	= :EnvioDestinatario,
						EnvioCodigoPostal	= :EnvioCodigoPostal,
                        EnvioCalle		    = :EnvioCalle,
						EnvioNroPuerta		= :EnvioNroPuerta,
						EnvioApto 	        = :EnvioApto,
                        EnvioCiudad 	    = :EnvioCiudad,
						EnvioDepartamento	= :EnvioDepartamento,
						EnvioTelefono		= :EnvioTelefono,
                        EnvioFecha 	        = :EnvioFecha,
                        EnvioHora 	        = :EnvioHora,
						EnvioComentarios	= :EnvioComentarios,
						EnvioEstadoPaquete  = 'Pendiente',
                        EnvioEstado		    = 1";

		$arraySql = array(
						"EnvioCodigo" 		    => $this->EnvioCodigo,
						"ClienteId" 		    => $this->ClienteId,
						"EnvioDestinatario" 	=> $this->EnvioDestinatario,
                        "EnvioCodigoPostal" 	=> $this->EnvioCodigoPostal,
						"EnvioCalle" 		    => $this->EnvioCalle,
						"EnvioNroPuerta" 		=> $this->EnvioNroPuerta,
						"EnvioApto" 		    => $this->EnvioApto,
                        "EnvioCiudad" 		    => $this->EnvioCiudad,
                        "EnvioDepartamento" 	=> $this->EnvioDepartamento,
						"EnvioTelefono" 		=> $this->EnvioTelefono,
						"EnvioFecha" 		    => $this->EnvioFecha,
                        "EnvioHora" 		    => $this->EnvioHora,
						"EnvioComentarios" 		=> $this->EnvioComentarios,
					);
			
		$retorno = $this->imputarCambio($sqlInsert, $arraySql);
		return $retorno;

	}
    public function editar(){

        $sqlInsert = "UPDATE envio SET
                        EnvioDestinatario	= :EnvioDestinatario,
                        EnvioCodigoPostal	= :EnvioCodigoPostal,
                        EnvioCalle		    = :EnvioCalle,
                        EnvioNroPuerta		= :EnvioNroPuerta,
                        EnvioApto 	        = :EnvioApto,
                        EnvioCiudad 	    = :EnvioCiudad,
                        EnvioDepartamento	= :EnvioDepartamento,
                        EnvioTelefono		= :EnvioTelefono,
                        EnvioFecha 	        = :EnvioFecha,
                        EnvioHora 	        = :EnvioHora,
                        EnvioComentarios	= :EnvioComentarios,
                        EnvioEstadoPaquete  = :EnvioEstadoPaquete
                        WHERE EnvioId = :EnvioId";	
        $arraySql = array(
                        "EnvioId" 		            => $this->EnvioId,   
                        "EnvioDestinatario" 		=> $this->EnvioDestinatario,
                        "EnvioCodigoPostal" 		=> $this->EnvioCodigoPostal,
                        "EnvioCalle" 		        => $this->EnvioCalle,
                        "EnvioNroPuerta" 		    => $this->EnvioNroPuerta,
                        "EnvioApto" 		        => $this->EnvioApto,
                        "EnvioCiudad" 		        => $this->EnvioCiudad,
                        "EnvioDepartamento" 		=> $this->EnvioDepartamento,
                        "EnvioTelefono" 		    => $this->EnvioTelefono,
                        "EnvioFecha" 	           	=> $this->EnvioFecha,
                        "EnvioHora" 		        => $this->EnvioHora,
                        "EnvioComentarios" 		    => $this->EnvioComentarios,
                        "EnvioEstadoPaquete" 		=> $this->EnvioEstadoPaquete,
                    );
        
        $retorno = $this->imputarCambio($sqlInsert, $arraySql);
        return $retorno;
        
        }
        
        public function borrar(){
        
        $sqlInsert = "UPDATE envio SET EnvioEstado = 0 WHERE EnvioId = :EnvioId";	
        $arraySql = array(
                        "EnvioId" => $this->EnvioId,
                    );
        
        $retorno = $this->imputarCambio($sqlInsert, $arraySql);
        return $retorno;
        
        }
        
        
        public function listar($arrayFiltros = array()){
        
            $sql = "SELECT 		EnvioCodigo,
                                c.ClienteId,
                                EnvioDestinatario,
                                EnvioCodigoPostal,
                                EnvioCalle,
                                EnvioNroPuerta,
                                EnvioApto, 
                                EnvioCiudad,
                                EnvioDepartamento, 
                                EnvioTelefono,
                                EnvioFecha,
                                EnvioHora, 
                                EnvioComentarios,
                                EnvioEstadoPaquete, 
                                ClienteApellido,
                                ClienteNombre
                    FROM envio e
                    LEFT JOIN cliente c ON c.ClienteId = e.ClienteId;						
                        WHERE EnvioEstado = 1";
        
        if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
            $sql .= " AND (EnvioCodigo LIKE ('%".$arrayFiltros['busqueda']."%')";
            $sql .= " OR ClienteApellido LIKE ('%".$arrayFiltros['busqueda']."%')";
            $sql .= " OR ClienteNombre LIKE ('%".$arrayFiltros['busqueda']."%'))";
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
        
        $sql = "SELECT count(EnvioId) as total FROM envio
                    WHERE EnvioEstado = 1";
                
        
        if(isset($arrayFiltros['busqueda']) && $arrayFiltros['busqueda'] != "" ){
            $sql .= " AND (EnvioCodigo LIKE ('%".$arrayFiltros['busqueda']."%')";
            $sql .= " OR ClienteApellido LIKE ('%".$arrayFiltros['busqueda']."%')";
            $sql .= " OR ClienteNombre LIKE ('%".$arrayFiltros['busqueda']."%'))";
        }
        
        $arrayDatos = array();
        $retorno = 0;
        
        $respuesta = $this->cargarDatos($sql, $arrayDatos);
        foreach($respuesta as $total){
            $retorno = $total['total'];
        }
        
        return $retorno;
        
        }
        
        public function cargar($EnvioId){
        
        
        $sql = "SELECT * FROM envio WHERE EnvioId = :EnvioId";
        
        $arrayDatos = array();
        $arrayDatos['EnvioId'] = $EnvioId;
        $respuesta = $this->cargarDatos($sql, $arrayDatos);
        
        foreach($respuesta as $envio){
        
            $this->EnvioId 			    = $envio['EnvioId'];
            $this->ClienteApellido		= $envio['ClienteApellido'];
            $this->ClienteNombre		= $envio['ClienteNombre'];
            $this->ClienteDocumento		= $envio['ClienteDocumento'];
            $this->ClienteTelefono 		= $envio['ClienteTelefono'];
        }
        
        }
	
}
?>