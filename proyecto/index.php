<?php

    $conexion = new PDO("mysql:host=localhost:3306;dbname=proyecto_correo", 'root', '');
    $conexion->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

