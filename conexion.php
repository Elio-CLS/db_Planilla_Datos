<?php
// Conectar a una base de datos de MySQL invocando el controlador
// https://www.php.net/manual/es/pdo.construct.php
$db_conexion = 'mysql:dbname=db_datos;host=localhost';
$usuario = 'root';
$contraseña = '';

try{
    $obj_conexion = new PDO($db_conexion, $usuario, $contraseña);
    echo '<h6> Conectado a la base de datos </h6>';
} catch(PDOException $e){
    echo 'Falló la conexión: '. $e->getMessage();
}
// Realiza la consulta a la db
$consulta = $obj_conexion->prepare('select ID, Nombre, Apellido, DNI, Direccion, Usuario, Passworld from tabla1');
$consulta->execute();
?>