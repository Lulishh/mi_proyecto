<?php

/*   
    `ClienteId` int(10) NOT NULL AUTO_INCREMENT,
    `ClienteApellido` varchar(50) NOT NULL,
    `ClienteNombre` varchar(50) NOT NULL,
    `ClienteDocumento` int(100) NOT NULL,
    `ClienteTelefono` int(9) NOT NULL,
    `ClienteDireccion` tinytext,
    `ClienteCiudad` varchar(50) DEFAULT NULL,
    `DptoId` int(10) DEFAULT NULL,
    `ClienteEstado` tinyint(1) DEFAULT NULL,
*/

        protected $ClienteId;   
        protected $ClienteApellido;
        protected $ClienteNombre;
        protected $ClienteDocumento;
        protected $ClienteTelefono;
        protected $ClienteDireccion;
        protected $ClienteCiudad;
        protected $DptoId;
        protected $ClienteEstado;
        
    public function constructor($arrayDatos){

            $this->$ClienteId          = $arrayDatos['ClienteId'];   
            $this->$ClienteApellido    = $arrayDatos['ClienteApellido'];
            $this->$ClienteNombre      = $arrayDatos['ClienteNombre'];
            $this->$ClienteDocumento   = $arrayDatos['ClienteDocumento'];
            $this->$ClienteTelefono    = $arrayDatos['ClienteTelefono'];
            $this->$ClienteDireccion   = $arrayDatos['ClienteDireccion'];
            $this->$ClienteCiudad      = $arrayDatos['ClienteCiudad'];
            $this->$DptoId             = $arrayDatos['DptoId'];
            $this->$ClienteEstado      = $arrayDatos['ClienteEstado'];
    }








?>