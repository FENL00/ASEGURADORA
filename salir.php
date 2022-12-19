<?php ob_start(); ?> 
<?php

session_start(); //Inicializar la sesion
$_SESSION = array();  //Destruir todas las variables de sesion que hallan sido inicializadas.
session_destroy(); //Se destruye la sesion actual.
header('Location: index.php/..');
?>
<?php ob_end_flush(); ?> 