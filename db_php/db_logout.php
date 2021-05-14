<?php 
// Iniciacion de session
session_start();

// Cierra todas las sesiones abiertas
$_SESSION = array();

// Destruya la sesion
session_destroy();

// Redirecciona al login
//$_SESSION['mensaje'] = '<h3 class="reg_ok">Hasta luego</h3>';
header('location: ../login.php');
exit;
?>