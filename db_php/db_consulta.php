<?php 
include('db_conexion.php');

$consulta = $obj_conexion->prepare('select ID, Nombre, Apellido, DNI, Direccion, Usuario, Passworld from tabla1');
$consulta->execute();

?>