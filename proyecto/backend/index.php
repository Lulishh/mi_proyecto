<?php

	@session_start();

	if(!isset($_SESSION['UsuarioUsuario'])){

		header('Location: login.php');

	}

?>


<!DOCTYPE html>
  <html>
	<head>
	  <!--Import Google Icon Font-->
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <!--Import materialize.css-->
	  <link type="text/css" rel="stylesheet" href="web/css/materialize.min.css"  media="screen,projection"/>

	  <!--Let browser know website is optimized for mobile-->
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  	
	 	<style>
			.pagination li.active {
			background-color: #00695c;
			}
		</style>
	</head>

	<body>
		<ul id="dropdown1" class="dropdown-content">
			<li><a href="index.php?r=cliente">Clientes</a></li>
			<li class="divider"></li>
			<li><a href="index.php?r=envio">Ingresar envio</a></li>
			<li class="divider"></li>
			<li><a href="index.php?r=actualizo_envio">Actualizar envio</a></li>
			<li class="divider"></li>
			<li><a href="index.php?r=tracking">Tracking</a></li>
		</ul>

		<nav>
			<div class="nav-wrapper #004d40 teal darken-4">
				<ul class="left hide-on-med-and-down">  
					<li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Menu<i class="material-icons right">arrow_drop_down</i></a><li>
					<li><a href="index.php">Inicio</a><li>
				</ul>
				<a href="#!" class="brand-logo center">Logo</a>
				<ul class="right hide-on-med-and-down"> 
					<li><a><?=$_SESSION['UsuarioUsuario']?></a><li> 
				<ul class="right hide-on-med-and-down">
					<li>
						<a class='dropdown-trigger btn' href='#' data-target='dropdown2'>
							<i class="material-icons">person</i>
						</a>
					</li>
				</ul>		
				<ul id="dropdown2" class="dropdown-content">
					<li>
						<a class="modal-trigger" href="#modalSalir">Salir</a>
					</li>
					<li class="divider" tabindex="-1"></li>
					<li>
						<a href="#!">Cancelar</a>
					</li>
				</ul>	

				</ul>    
			</div>
		</nav>
	
				  <!-- Modal Structure -->
				  <div id="modalSalir" class="modal">
						<div class="modal-content">
							<h4>Estas seguro de salir?</h4>
							</div>
							<div class="modal-footer">
							<a href="logout.php" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
							<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
						</div>
					</div>	



<?php
		include("rutas.php");
?>       
 
	 <!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="web/js/materialize.min.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				M.AutoInit(); 
				var elems = document.querySelectorAll('.dropdown-trigger');
				var instances = M.Dropdown.init(elems, options);
			});
		</script>
	</body>
  </html>

