<?php 
include('db_conexion.php');

$consulta = $obj_conexion->prepare('select ID, Fecha, Nombre, Apellido, DNI, Direccion, Email, Usuario, Passworld from tabla1');
$consulta->execute();

?>