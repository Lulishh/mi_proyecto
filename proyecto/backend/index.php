<?php

	/*@session_start();

	if(!isset($_SESSION['nombre'])){

		header('Location: login.php');

	}*/

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
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="index.php?r=cliente">Clientes</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper #0d47a1 blue darken-4">
                <ul class="left hide-on-med-and-down">  
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Menu<i class="material-icons right">arrow_drop_down</i></a><li>
                    <li><a href="index.php">Inicio</a><li>
                </ul>
                <a href="#!" class="brand-logo center">Logo</a>
                <ul class="right hide-on-med-and-down"> 
                    <li><a>Nombre usuario</a><li> <!-- quiero que parezca el nombre del usuario-->
                    <li><a href="badges.html">Logout</a><li>
                </ul>    
            </div>
        </nav>

        
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

