<?php	
	$ruta 		= isset($_GET['r'])?$_GET['r']:"";
	$accion 	= isset($_GET['a'])?$_GET['a']:"";

	require_once("modelos/envio.php");

	$objEnvio = new envio();


	if(isset($_POST['action']) && $_POST['action'] == "ingresar"){

		$arrayDatos = $_POST;
		$objEnvio->constructor($arrayDatos);
		$respuesta = $objEnvio->ingresar();
	
		//print_r($respuesta);
	}
?>	

<?php 
	if(isset($respuesta) && $respuesta['codigo'] == "Error"  ){
?>
		<div class="#e57373 red lighten-2 center-align" style="height:40px">
			<h4>Error al realizar la operacion</h4>
		</div>
<?php
	}elseif(isset($respuesta) && $respuesta['codigo'] == "Ok"){	
?>
		<div class="#4db6ac teal lighten-2 center-align" style="height:40px">
			<h4>Se realizo la operacion correctamente</h4>
		</div>
<?php 
	}
?>


<div class="row"> 
	<div class="col s2"></div>
	<div class="col s8 center-align">
		<h3>DATOS PARA EL ENVIO</h3>
	</div>
	<div class="col s2"></div>
	</div>
<div class="row"> 
		<div class="col s2"></div>
		<div class="col s8">
			<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
							<div class="modal-content">
								<div class="row">
									<div class="input-field col s4">
										<input id="ClienteId" type="number" class="validate" name="ClienteId">
										<label for="ClienteId">Id cliente</label>
									</div>
									<div class="input-field col s8">
										<input id="EnvioCodigo" type="text" class="validate" name="EnvioCodigo">
										<label for="EnvioCodigo">Codigo de envio</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input id="EnvioDestinatario" type="text" class="validate" name="EnvioDestinatario">
										<label for="EnvioDestinatario">Nombre destinatario</label>
									</div>
								</div>
								<div class="row">	
									<div class="input-field col s8">
										<input id="EnvioCalle" type="text" class="validate" name="EnvioCalle">
										<label for="EnvioCalle">Direccion</label>
									</div>
									<div class="input-field col s4">
										<input id="EnvioTelefono" type="number" class="validate" name="EnvioTelefono">
										<label for="EnvioTelefono">Telefono</label>
									</div>
								</div>	
								<div class="row">
									<div class="input-field col s4">
										<input id="EnvioNroPuerta" type="text" class="validate" name="EnvioNroPuerta">
										<label for="EnvioNroPuerta">Nro de puerta</label>
									</div>
									<div class="input-field col s4">
										<input id="EnvioApto" type="text" class="validate" name="EnvioApto">
										<label for="EnvioApto">Apartamento</label>
									</div>
									<div class="input-field col s4">
										<input id="EnvioCodigoPostal" type="number" class="validate" name="EnvioCodigoPostal">
										<label for="EnvioCodigoPostal">Codigo postal</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input id="EnvioCiudad" type="text" class="validate" name="EnvioCiudad">
										<label for="EnvioCiudad">Ciudad</label>
									</div>
									<div class="input-field col s6">
										<input id="EnvioDepartamento" type="text" class="validate" name="EnvioDepartamento">
										<label for="EnvioDepartamento">Departamento</label>
									</div>
								</div>	
								<div class="row">
									<div class="input-field col s6">
										<input id="EnvioFecha" type="text" class="validate" name="EnvioFecha">
										<label for="EnvioFecha">Fecha envio</label>
									</div>
									<div class="input-field col s6">
										<input id="EnvioHora" type="text" class="validate" name="EnvioHora">
										<label for="EnvioHora">Hora de envio</label>
									</div>
								</div>	
								<div class="row">
									<div class="input-field col s12">
										<input id="EnvioComentarios" type="text" class="validate" name="EnvioComentarios">
										<label for="EnvioComentarios">Datos adicionales</label>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn waves-effect" type="submit" name="action" value="ingresar">Guardar
									<i class="material-icons right">save</i>
								</button>
							</div>
						</form>
		</div>


