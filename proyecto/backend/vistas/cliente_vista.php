<?php
	
	$ruta 		= isset($_GET['r'])?$_GET['r']:"";
	$accion 	= isset($_GET['a'])?$_GET['a']:"";
	$clienteId 	= isset($_GET['id'])?$_GET['id']:"";
	$pagina 	= isset($_GET['pagina'])?$_GET['pagina']:"1";
	$busqueda 	= isset($_GET['busqueda'])?$_GET['busqueda']:"";


	//print_r("<h1>".$accion."::".$clienteId."</h1>");

	require_once("modelos/cliente.php");

	$objCliente = new cliente();


	if(isset($_POST['action']) && $_POST['action'] == "ingresar"){

		$arrayDatos = $_POST;
		$objCliente->constructor($arrayDatos);
		$respuesta = $objCliente->ingresar();

		print_r($respuesta);
	}

	if(isset($_POST['action']) && $_POST['action'] == "editar"){

		$arrayDatos = $_POST;
		$objCliente->constructor($arrayDatos);
		$respuesta = $objCliente->editar();

		print_r($respuesta);
	}

	if(isset($_POST['action']) && $_POST['action'] == "borrar"){

		$arrayDatos = $_POST;
		$objCliente->constructor($arrayDatos);
		$respuesta = $objCliente->borrar();

		print_r($respuesta);
	}

	if($accion == "editar" && $clienteId != ""){

		$objCliente->cargar($clienteId);

	}
	if($accion == "borrar" && $clienteId != ""){

		$objCliente->cargar($clienteId);

	}


	// Array Filtros marco el total de registros por pagina
	$arrayFiltros 	= array("totalRegistro"=>6, "busqueda" => $busqueda);
	// Obtuve el total de registros que hay en base
	$totalRegistros = $objCliente->totalRegistros($arrayFiltros);
	/*
	 Calcule la pagina haciendo el total de registros dividio la cantidad de registro
	que voy a mostrar en la lista y redondeo el resultado para arriba
	*/
	$totalPaginas   = ceil($totalRegistros / $arrayFiltros['totalRegistro']);

	if($pagina > $totalPaginas ){
		$pagina = $totalPaginas;
	}
	if($pagina < 1){
		$pagina = 1;
	}
	$arrayFiltros['pagina'] = $pagina ;
	// Este array guarda la informacion para los filtros de la lista
	
	print_r("<br>Total de pagina es:".$totalPaginas);

	$paginaSiguiente = $pagina + 1;

	if($paginaSiguiente > $totalPaginas ){
		$paginaSiguiente = $totalPaginas;
	}
	$paginaAnterior = $pagina - 1;
	if($paginaAnterior < 1){
		$paginaAnterior = 1;
	}


	$listaCliente   = $objCliente->listar($arrayFiltros);

	
	

?>




	<h1>Clientes</h1>

<?php
	if($accion == "editar" && $clienteId != ""){
?>
	<div class="card">		
		<div class="card-content">
			<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
				<div class="row">
					<h3>Editar Cliente</h3>
				</div>
				<div class="row">
					<div class="input-field col s10">
						<input id="nombre" type="text" class="validate" name="nombre" value="<?=$objCliente->traerNombre()?>">
						<label for="nombre">Nombre</label>
					</div>
				</div>
				<div class="row">					
					<div class="input-field col s10">
						<input id="descripcion" type="text" class="validate" name="descripcion" value="<?=$objCliente->traerDescripcion()?>">
						<label for="descripcion">Descripcion</label>
					</div>
				</div>
				<div class="row">
					<input type="hidden" name="id" value="<?=$objCliente->traerId()?>">
					<button class="btn waves-effect waves-light right" type="submit" name="action" value="editar">Guardar
						<i class="material-icons right">save</i>
					</button>
				</div>
			</form>
		</div>
	</div>
<?php
	}
?>
<?php
	if($accion == "borrar" && $clienteId != ""){
?>
	<div class="card">		
		<div class="card-content">
			<form action="index.php?r=<?=$ruta?>" method="POST" class="col s12">
				<div class="row">
					<h3>Borrar Cliente </h3>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<h3>Esta seguro que quiere borrar al Cliente <?=$objCliente->traerNombre()?> </h3>
					</div>					
				</div>			
				<div class="row">
					<input type="hidden" name="id" value="<?=$objCliente->traerId()?>">
					<div class="input-field col s2">
						<button class="btn yellow waves-effect waves-light" type="submit" name="action" value="cancelar">Cancelar
							<i class="material-icons right">cancel</i>
						</button>
					</div>
					<div class="input-field col s2">
						<button class="btn red waves-effect waves-light" type="submit" name="action" value="borrar">Borrar
							<i class="material-icons right">delete</i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	}
?>

<?php
	if(isset($respuesta) && $respuesta['codigo'] == "Error"  ){
?>
		<div class="red center-align" style="height:40px">
			<h4>Error al realizar la operacion</h4>
		</div>
<?php
	}elseif(isset($respuesta) && $respuesta['codigo'] == "Ok"){	
?>
		<div class="green center-align" style="height:40px">
			<h4>Se realizo la operacion correctamente</h4>
		</div>
<?php 
	}
?>
	<table class="striped">
		<thead>
			<tr>
				<th class='green lighten-5' colspan = "7">
					 <!-- Modal Trigger -->
					<div class="row">
						<div class="col s6 valign-wrapper" style="height:60px">
							<a class="valign-wrapper waves-effect waves-light btn modal-trigger" href="#modal1">Ingresar</a>
						</div>
						<div class="col s6 ">
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
									<div class="input-field col s10">
										<input id="nombre" type="text" class="validate" name="nombre">
										<label for="nombre">Nombre</label>
									</div>
								
								</div>
								<div class="row">
                                    <div class="input-field col s10">
										<input id="descripcion" type="text" class="validate" name="descripcion">
										<label for="descripcion">Descripcion</label>
									</div>
								</div>	
							</div>
							<div class="modal-footer">
								<button class="btn waves-effect waves-light right" type="submit" name="action" value="ingresar">Guardar
									<i class="material-icons right">save</i>
								</button>
							</div>
						</form>
					</div>
				</th>
			</tr>
			<tr class="green lighten-5">
				<th>#</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th style="width:150px">Acciones</th>
			</tr>
		</thead>
		<tbody>
