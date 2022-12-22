<?php
	
	$ruta 		= isset($_GET['r'])?$_GET['r']:"";
	$accion 	= isset($_GET['a'])?$_GET['a']:"";
	$ClienteId 	= isset($_GET['ClienteId'])?$_GET['ClienteId']:"";
	$pagina 	= isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda 	= isset($_GET['busqueda'])?$_GET['busqueda']:"";


	//print_r("<h1>".$accion."::".$ClienteId."</h1>");

	require_once("modelos/cliente.php");

	$objCliente = new cliente();


	if(isset($_POST['action']) && $_POST['action'] == "ingresar"){

		$arrayDatos = $_POST;
		$objCliente->constructor($arrayDatos);
		$respuesta = $objCliente->ingresar();
	
		//print_r($respuesta);
	}
	
	if(isset($_POST['action']) && $_POST['action'] == "editar"){
	
		$arrayDatos = $_POST;
		$objCliente->constructor($arrayDatos);
		$respuesta = $objCliente->editar();

		//print_r($respuesta);
	}
	
	if(isset($_POST['action']) && $_POST['action'] == "borrar"){
	
		$arrayDatos = $_POST;
		$objCliente->constructor($arrayDatos);
		$respuesta = $objCliente->borrar();
	
		//print_r($respuesta);
	}
	
	if($accion == "editar" && $ClienteId != ""){
	
		$objCliente->cargar($ClienteId);
	
	}
	if($accion == "borrar" && $ClienteId != ""){
	
		$objCliente->cargar($ClienteId);
	
	}
	
	
	$arrayFiltros 	= array("totalRegistro"=>5, "busqueda" => $busqueda);
	
	$totalRegistros = $objCliente->totalRegistros($arrayFiltros);

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
	
	
	$listaCliente = $objCliente->listar($arrayFiltros);
	

	if($accion == "editar" && $ClienteId!= ""){
?>

	<div class="row"> 
		<div class="col s2"></div>
		<div class="col s8 center-align">
			<div class="card">		
				<div class="card-content">
					<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
						<div class="row">
							<h3>Editar Cliente</h3>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input id="ClienteApellido" type="text" class="validate" name="ClienteApellido" value="<?=$objCliente->traerClienteApellido()?>">
								<label for="ClienteApellido">Apellido</label>
							</div>
						</div>
						<div class="row">					
							<div class="input-field col s6">
								<input id="ClienteNombre" type="text" class="validate" name="ClienteNombre" value="<?=$objCliente->traerClienteNombre()?>">
								<label for="ClienteNombre">Nombre</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input id="ClienteDocumento" type="number" class="validate" name="ClienteDocumento" value="<?=$objCliente->traerClienteDocumento()?>">
								<label for="ClienteDocumento">Documento</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input id="ClienteTelefono" type="number" class="validate" name="ClienteTelefono" value="<?=$objCliente->traerClienteTelefono()?>">
								<label for="ClienteTelefono">Telefono</label>
							</div>
						</div>
						<div class="row">
							<input type="hidden" name="ClienteId" value="<?=$objCliente->traerClienteId()?>">
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
	if($accion == "borrar" && $ClienteId != ""){
?>
	<div class="row"> 
		<div class="col s2"></div>
		<div class="col s8 center-align">
			<div class="card">		
				<div class="card-content">
					<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
						<div class="row">
							<h4>Borrar Cliente </h4>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<h4>Esta seguro que quiere borrar al Cliente <?=$objCliente->traerClienteApellido()?> <?=$objCliente->traerClienteNombre()?> </h4>
							</div>					
						</div>			
						<div class="row">
							<input type="hidden" name="ClienteId" value="<?=$objCliente->traerClienteId()?>">
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
			<h3>CLIENTES</h3>
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
						<div class="col s8 valign-wrapper" style="height:60px">
							<a class="valign-wrapper waves-effect waves-light btn modal-trigger" href="#modal1">Ingresar</a>
						</div>
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
					<!-- Modal Structure -->
					<div id="modal1" class="modal">
						<div class="teal darken-4">
							<h4 class=" white-text">Ingresar Cliente</h4>
						</div>
						<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
							<div class="modal-content">
								<div class="row">
									<div class="input-field col s6">
										<input id="clienteApellido" type="text" class="validate" name="ClienteApellido">
										<label for="clienteApellido">Apellido</label>
									</div>
									<div class="input-field col s6">
										<input id="clienteNombre" type="text" class="validate" name="ClienteNombre">
										<label for="nacionalidad">Nombre</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<input id="clienteDocumento" type="number" class="validate" name="ClienteDocumento">
										<label for="clienteDocumento">Documento</label>
									</div>
									<div class="input-field col s6">
										<input id="clienteTelefono" type="number" class="validate" name="ClienteTelefono">
										<label for="clienteTelefono">Telefono</label>
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
				</th>
				</tr>
				<tr class="#80cbc4 teal lighten-3" >
					<th>Id</th>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Documento</th>
					<th>Telefono</th>
					<th style="width:150px">Acciones</th>
				</tr>
			</thead>
			<tbody>
<?php
			foreach($listaCliente as $Cliente){
?>
				<tr>
					<td><?=$Cliente['ClienteId']?></td>
					<td><?=$Cliente['ClienteApellido']?></td>
					<td><?=$Cliente['ClienteNombre']?></td>
					<td><?=$Cliente['ClienteDocumento']?></td>
					<td><?=$Cliente['ClienteTelefono']?></td>
					<td>
						<div class="center-align">
							<a href="index.php?r=<?=$ruta?>&a=editar&ClienteId=<?=$Cliente['ClienteId']?>" class="waves-effect waves-light btn #4db6ac teal lighten-2">
								<i class="material-icons center">edit</i>
							</a>
							<a href="index.php?r=<?=$ruta?>&a=borrar&ClienteId=<?=$Cliente['ClienteId']?>" class="waves-effect waves-light btn #e57373 red lighten-2">
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
			<tr>
				<td class="green lighten-5 center-align" colspan="7"> 
					<div class="row"> 
					<div class="col s10"></div>
					<div class="col s2">
						<a class="" href="index.php?r=envio">Ir a ingresar envio</a>
					</div>
				</td>
			</tr>


		</tbody>
	</table>


		