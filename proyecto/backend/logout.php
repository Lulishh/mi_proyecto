<?php

	@session_start();

	unset($_SESSION['UsuarioUsuario']);
	
	session_destroy();

	header('Location: login.php');

?>
