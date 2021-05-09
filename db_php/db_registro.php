<?php
    session_start();
    include('db_conexion.php');

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $pass = sha1($pass);

    $registro = $obj_conexion->prepare("INSERT INTO tabla1 (nombre,apellido,dni,direccion,usuario,passworld) VALUES('$nombre','$apellido','$dni','$direccion','$usuario','$pass')");

    if($registro->execute()){
        $_SESSION['mensaje'] = 'El registro fue exitoso.';
        header('location: ../perfil/admin.php');
    }else{
        $_SESSION['mensaje'] = 'El registro fallo.';
        header('location:../singup/singup.php');
    }

?>