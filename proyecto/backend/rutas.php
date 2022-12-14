<?php
	
	$ruta = isset($_GET['r'])?$_GET['r']:"";

	if($ruta == "envio"){
		include("vistas/envio_vista.php");
	}elseif($ruta == "cliente"){
		include("vistas\cliente_vista.php");
	}elseif($ruta == "tracking"){
		include("vistas/tracking_vista.php");
	}elseif($ruta == "actualizo_envio"){
		include("vistas/actualizo_envio.php");
	}else{
		include("vistas/inicio.php");
	}	

?>