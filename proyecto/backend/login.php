<?php

	require_once("modelos/usuario.php");

	$Usuario = isset($_POST['Usuario'])?$_POST['Usuario']:"";
	$UsuarioClave = isset($_POST['UsuarioClave'])?$_POST['UsuarioClave']:"";

	if($Usuario != "" && $UsuarioClave != "" && isset($_POST['action']) && $_POST['action'] == "login"){

		$objUsuario = new usuario();
		$respuesta = $objUsuario->login($Usuario, $UsuarioClave);

		if($respuesta == "OK"){
			header('Location: index.php');
		}

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
	</head>

	<body>
		<nav>
			<div class="nav-wrapper teal darken-4">
				<a href="#!" class="brand-logo center ">
					<i class="material-icons">cloud</i>
					<span class="yellow-text text-darken-2">M</span>i<span class="red-text text-darken-2">P</span>anel
				</a>
			</div>
		</nav>
	
		<div class="container">
			<div class="row">

			<div class="col s10 m6 offset-s1 offset-m3">
				<form action="login.php" method="POST" class="col s12">
					<div class="row">
						<h3>Login</h3>
					</div>
<?php
		if(isset($respuesta) && $respuesta == "Error"){
?>
					<div class="row">
						<div class="input-field col s12 red">
							<h3>Error de usuario y/o clave</h3>
						</div>
					</div>
<?php
		}
?>
					<div class="row">
						<div class="input-field col s12">
							<input id="UsuarioUsuario" type="text" class="validate" name="UsuarioUsuario" >
							<label for="UsuarioUsuario">Usuario</label>
						</div>
					</div>
					<div class="row">					
						<div class="input-field col s12">
							<input id="UsuarioClave" type="password" class="validate" name="UsuarioClave">
							<label for="UsuarioClave">Clave</label>
						</div>
					</div>
					<div class="row">					
						<button class="btn waves-effect waves-light right" type="submit" name="action" value="login">Ingresar
							<i class="material-icons right">send</i>
						</button>
					</div>
					<div class="row">					
						<h2><?= strtoupper(substr(uniqid(), -6)) ?></h2>

					</div>
					
				</form>
			</div>

			</div>
		</div>

		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="web/js/materialize.min.js"></script>
		<script>			

				M.AutoInit();        
				$(".dropdown-trigger").dropdown();
			
		</script>
	</body>
  </html>


  select md5("clave");