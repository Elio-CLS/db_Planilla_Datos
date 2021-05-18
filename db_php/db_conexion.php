<?php
// Conectar a una base de datos de MySQL invocando el controlador
// https://www.php.net/manual/es/pdo.construct.php
$db_conexion = 'mysql:dbname=db_datos;host=localhost';
$usuario = 'root';
$contraseña = '';

try{
    $obj_conexion = new PDO($db_conexion, $usuario, $contraseña);
    //echo '<h6> Conectado a la base de datos </h6>';
} catch(PDOException $e){
    echo 'Server Off' . $e->getMessage();
}

?>