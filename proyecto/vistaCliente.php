
<?php
    $conexion = new PDO("mysql:host=localhost:3306;dbname=proyecto_correo",'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM cliente";
    $cliente = $conexion->prepare($sql);
    $cliente->execute(array());
    $respuesta = $cliente->fetchALL(PDO::FETCH_ASSOC);

    print_r($respuesta);

?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Clientes</a>
        </div>
    </nav>
    <div class="container">
        <h1 class="center"> Libros</h1>
        <form class="col s12" action="calculadora.php" method="POST">
            <div class="row">
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ingresar</a>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Apellidos</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                        </tr>
                    </thead>
                    <tbody>