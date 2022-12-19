<?php
require_once("configuracion/operacionesingleton.php");
include_once('configuracion/sesion.php');
$operacion = new Operaciones; // TODAS LAS FUNCIONES DE LA CLASE operacionesingleto
$id_usuario = $_SESSION["usuario"];
$id_rol = $_SESSION["rol"];

$perfil = $operacion->mostrarusuarioID($id_usuario);

    ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="imagen/logo.png">
    <title>Aseguradora L&L</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio.php"> <img src="imagen/banner.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <?php if ($id_rol == 1) { /// administrador
    ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="personalistar.php">Seguros Persona</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="autolistar.php">Seguro Autos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viviendalistar.php">Seguro Vivienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listarsesion.php">Lista de Sesiones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="configurar.php">Configuración</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="salir.php">Salir</a>
                    </li>
                </ul>


                <?php
    } else { // cliente
                     ?>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="configurar.php">Configuración</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="salir.php">Salir</a>
                    </li>
                </ul>


                <?php
    }
                        ?>
            </div>
        </div>
    </nav>


    <hr>