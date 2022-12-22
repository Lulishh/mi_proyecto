<?php
	
	$ruta 			= isset($_GET['r'])?$_GET['r']:"";
	$accion 		= isset($_GET['a'])?$_GET['a']:"";
	$EnvioId 		= isset($_GET['EnvioId'])?$_GET['EnvioId']:"";
	$pagina 		= isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda 		= isset($_GET['busqueda'])?$_GET['busqueda']:"";


	//print_r("<h1>".$accion."::".$EnvioId."</h1>");

	require_once("modelos/envio.php");
	require_once("modelos/cliente.php");

	$objEnvio = new envio();
	$objCliente = new cliente();

	
	if(isset($_POST['action']) && $_POST['action'] == "editar"){
	
		$arrayDatos = $_POST;
		$objEnvio->constructor($arrayDatos);
		$respuesta = $objEnvio->editar();

		//print_r($respuesta);
	}
	
	if(isset($_POST['action']) && $_POST['action'] == "borrar"){
	
		$arrayDatos = $_POST;
		$objEnvio->constructor($arrayDatos);
		$respuesta = $objEnvio->borrar();
	
		//print_r($respuesta);
	}
	
	if($accion == "editar" && $EnvioId != ""){
	
		$objEnvio->cargar($EnvioId);
	
	}
	if($accion == "borrar" && $EnvioId != ""){
	
		$objEnvio->cargar($EnvioId);
	
	}
	
	
	$arrayFiltros 	= array("totalRegistro"=>5, "busqueda" => $busqueda);
	
	$totalRegistros = $objEnvio->totalRegistros($arrayFiltros);

	$totalPaginas   = ceil($totalRegistros / $arrayFiltros['totalRegistro']);
	
	if($pagina > $totalPaginas ){
		$pagina = $totalPaginas;
	}
	if($pagina < 1){
		$pagina = 1;
	}
	$arrayFiltros['pagina'] = $pagina ;

		
	//print_r("<br>Total de pagina es:".$totalPaginas);
	
	$paginaSiguiente = $pagina + 1;
	
	if($paginaSiguiente > $totalPaginas ){
			$paginaSiguiente = $totalPaginas;
	}
	$paginaAnterior = $pagina - 1;
	if($paginaAnterior < 1){
		$paginaAnterior = 1;
	}
	
	
	$listaEnvio = $objEnvio->listar($arrayFiltros);
	

	if($accion == "editar" && $EnvioId!= ""){
?>

	<div class="row"> 
		<div class="col s2"></div>
		<div class="col s8 center-align">
			<div class="card">		
				<div class="card-content">
					<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
						<div class="row">
							<h3>Editar envio</h3>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input id="EnvioDestinatario" type="text" class="validate" name="EnvioDestinatario" value="<?=$objEnvio->traerEnvioDestinatario()?>">
								<label for="EnvioDestinatario">Nombre destinatario</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input id="EnvioCalle" type="text" class="validate" name="EnvioCalle" value="<?=$objEnvio->traerEnvioCalle()?>">
								<label for="EnvioCalle">Direccion</label>
							</div>
							<div class="input-field col s4">
									<input id="EnvioTelefono" type="number" class="validate" name="EnvioTelefono" value="<?=$objEnvio->traerClienteTelefono()?>">
									<label for="EnvioTelefono">Telefono</label>
							</div>
						<div class="row">
								<div class="input-field col s4">
									<input id="EnvioNroPuerta" type="text" class="validate" name="EnvioNroPuerta" value="<?=$objEnvio->traerEnvioNroPuerta()?>">
									<label for="EnvioNroPuerta">Nro de puerta</label>
								</div>
								<div class="input-field col s4">
									<input id="EnvioApto" type="text" class="validate" name="EnvioApto" value="<?=$objEnvio->traerEnvioApto()?>">
									<label for="EnvioApto">Apartamento</label>									</div>
								<div class="input-field col s4">
									<input id="EnvioCodigoPostal" type="number" class="validate" name="EnvioCodigoPostal" value="<?=$objEnvio->traerEnvioCodigoPostal()?>">
									<label for="EnvioCodigoPostal">Codigo postal</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<input id="EnvioCiudad" type="text" class="validate" name="EnvioCiudad" value="<?=$objEnvio->traerEnvioCiudad()?>">
									<label for="EnvioCiudad">Ciudad</label>
								</div>
								<div class="input-field col s6">
									<input id="EnvioDepartamento" type="text" class="validate" name="EnvioDepartamento" value="<?=$objEnvio->traerEnvioDepartamento()?>">
									<label for="EnvioDepartamento">Departamento</label>
								</div>
							</div>	
							<div class="row">
								<div class="input-field col s6">
									<input id="EnvioFecha" type="text" class="validate" name="EnvioFecha" value="<?=$objEnvio->traerEnvioFecha()?>">
									<label for="EnvioFecha">Fecha envio</label>
								</div>
								<div class="input-field col s6">
									<input id="EnvioHora" type="text" class="validate" name="EnvioHora" value="<?=$objEnvio->traerEnvioHora()?>">
									<label for="EnvioHora">Hora de envio</label>
								</div>
							</div>	
							<div class="row">
								<div class="input-field col s8">
									<input id="EnvioComentarios" type="text" class="validate" name="EnvioComentarios" value="<?=$objEnvio->traerEnvioComentarios()?>">
									<label for="EnvioComentarios">Datos adicionales</label>
								</div>
								<div class="input-field col s4">
									<input id="EnvioEstadoPaquete" type="text" class="validate" name="EnvioEstadoPaquete" value="<?=$objEnvio->traerEnvioEstadoPaquete()?>">
									<label for="EnvioEstadoPaquete">Estado paquete</label>
								</div>
							</div>
							<div class="row">
								<input type="hidden" name="EnvioId" value="<?=$objEnvio->traerEnvioId()?>">
								<button class="btn waves-effect waves-light right" type="submit" name="action" value="editar">Guardar
									<i class="material-icons right">save</i>
							</button>
						</div>
					</form>
				</div>
			</div>
		<div class="col s2"></div>
	</div>			
<?php
	}
?>
<?php
	if($accion == "borrar" && $EnvioId != ""){
?>
	<div class="row"> 
		<div class="col s2"></div>
		<div class="col s8 center-align">
			<div class="card">		
				<div class="card-content">
					<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
						<div class="row">
							<h4>Borrar envio </h4>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<h4>Esta seguro que quiere borrar el envio <?=$objCliente->traerClienteApellido()?> <?=$objCliente->traerClienteNombre()?> </h4>
							</div>					
						</div>			
						<div class="row">
							<input type="hidden" name="EnvioId" value="<?=$objEnvio->traerEnvioId()?>">
							<div class="input-field col s2">
								<button class="btn waves-effect waves-light" type="submit" name="action" value="cancelar">Cancelar
									<i class="material-icons right">cancel</i>
								</button>
							</div>
							<div class="input-field col s2">
								<button class="btn  waves-effect waves-light #e57373 red lighten-2" type="submit" name="action" value="borrar">Borrar
									<i class="material-icons right">delete</i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			</div>
		<div class="col s2"></div>
	</div>		
<?php
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
			<h3>ACTUALIZAR ESTADO DE ENVIOS</h3>
		</div>
		<div class="col s2"></div>
	</div>
	<div class="row"> 
		<div class="col s2"></div>
	  	<table class="highlight striped col s8">
			<thead >
				<tr>
				<th class='green lighten-5' colspan = "7">
					 <!-- Modal Trigger -->
					<div class="row">
						<div class="col s8"></div>
						<div class="col s4">
							<form action="index.php" method="GET">
								<div class="input-field">
									<input type="hidden" name="r" value="<?=$ruta?>">
									<input id="search" type="search" name="busqueda" required>
									<label class="label-icon" for="search">
										<i class="material-icons">search</i>
									</label>
									<i class="material-icons">close</i>
								</div>
							</form>
						</div>
					</div>
				</th>
				</tr>
				<tr class="#80cbc4 teal lighten-3" >

					<th>Codigo</th>
					<th>Id Cliente</th>
					<th>Apellido Cliente</th>
					<th>Nombre Cliente</th>
					<th>Destinatario</th>
					<th>Direccion</th>
					<th>Nro puerta</th>
					<th>Apto</th>
					<th>Ciudad</th>
					<th>Departamento</th>
					<th>Codigo postal</th>
					<th>Telefono</th>
					<th>Fecha de envio</th>
					<th>Hora de envio</th>
					<th>Comentarios</th>
					<th>Estado</th>
					<th style="width:150px">Acciones</th>
				</tr>
			</thead>
			<tbody>
<?php
			foreach($listaEnvio as $Envio){
?>
				<tr>

					<td><?=$Envio['EnvioCodigo']?></td>
					<td><?=$Envio['ClienteId']?></td>
					<td><?=$Envio['ClienteApellido']?></td>
					<td><?=$Envio['ClienteNombre']?></td>
					<td><?=$Envio['EnvioDestinatario']?></td>
					<td><?=$Envio['EnvioCalle']?></td>
					<td><?=$Envio['EnvioNroPuerta']?></td>
					<td><?=$Envio['EnvioApto']?></td>
					<td><?=$Envio['EnvioCiudad']?></td>
					<td><?=$Envio['EnvioDepartamento']?></td>
					<td><?=$Envio['EnvioCodigoPostal']?></td>
					<td><?=$Envio['EnvioTelefono']?></td>
					<td><?=$Envio['EnvioFecha']?></td>
					<td><?=$Envio['EnvioHora']?></td>
					<td><?=$Envio['EnvioComentarios']?></td>
					<td><?=$Envio['EnvioEstadoPaquete']?></td>
					<td>
						<div class="center-align">
							<a href="index.php?r=<?=$ruta?>&a=editar&EnvioCodigo=<?=$Envio['EnvioCodigo']?>" class="waves-effect waves-light btn #4db6ac teal lighten-2">
								<i class="material-icons center">edit</i>
							</a>
							<a href="index.php?r=<?=$ruta?>&a=borrar&EnvioCodigo=<?=$Envio['EnvioCodigo']?>" class="waves-effect waves-light btn #e57373 red lighten-2">
								<i class="material-icons center">delete</i>
							</a>
						</div>
					</td>
				</tr>


<?php
			}
?>
			<tr>
				<td class="green lighten-5 center-align" colspan="7"> 
					<ul class="pagination">
						<li class="waves-effect">
							<a href="index.php?r=<?=$ruta?>&pagina=<?=$paginaAnterior?>&busqueda=<?=$busqueda?>"><i class="material-icons">chevron_left</i></a>
						</li>

<?php
						for($i = ($pagina-5); $i <= ($pagina+5); $i++ ){

							if($i < 1 || $i > $totalPaginas){
								continue;
							}

							if($pagina == $i){
								$marca = "active";
							}else{
								$marca = "waves-effect";
							}	

?>
						<li class="<?=$marca?>">
							<a href="index.php?r=<?=$ruta?>&pagina=<?=$i?>&busqueda=<?=$busqueda?>"><?=$i?></a>
						</li>
<?php

						}
?>				
						<li class="waves-effect">
							<a href="index.php?r=<?=$ruta?>&pagina=<?=$paginaSiguiente?>&busqueda=<?=$busqueda?>">	<i class="material-icons">chevron_right</i></a>
						</li>
					</ul>
				</td>
			</tr>

		</tbody>
	</table>


		