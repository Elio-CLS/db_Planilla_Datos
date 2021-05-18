<?php 
// Iniciacion de session
session_start();

// Cierra todas las sesiones abiertas
$_SESSION = array();

// Destruya la sesion
session_destroy();

// Redirecciona al login
header('location: ../login.php');
exit;
?>