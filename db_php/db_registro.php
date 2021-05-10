<?php
    session_start();
    include('db_conexion.php');

    if(isset($_POST['btn_registrar'])) {
        if(strlen($_POST['nombre']) >= 3 &&
            strlen($_POST['apellido']) >= 3 &&
            !empty($_POST['dni']) &&
            !empty($_POST['direccion']) &&
            !empty($_POST['usuario']) &&
            !empty($_POST['pass']) &&
            !empty($_POST['passConfirm'])) {
            
            $nombre = trim($_POST['nombre']);
            $apellido = trim($_POST['apellido']);
            $dni = trim($_POST['dni']);
            $direccion = trim($_POST['direccion']);
            $usuario = trim($_POST['usuario']);
            $pass = trim($_POST['pass']);
            $passConfirm = trim($_POST['passConfirm']);

            if($pass==$passConfirm){
                $pass = sha1($pass);
                $registro = $obj_conexion->prepare("INSERT INTO tabla1 (nombre,apellido,dni,direccion,usuario,passworld) VALUES('$nombre','$apellido','$dni','$direccion','$usuario','$pass')");

                if($registro->execute()){
                    $_SESSION['mensaje'] = '<h3>El registro fue exitoso</h3>';
                    header('location: ../singup/singup.php');
                } else {
                    $_SESSION['mensaje'] = '<h3>Hay un error, intentelo de nuevo</h3>';
                    header('location: ../singup/singup.php');
                }
            } else {
                $_SESSION['mensaje'] = '<h3>La contraseña no es igual</h3>';
                header('location: ../singup/singup.php');
            }
        } else {
            $_SESSION['mensaje'] = '<h3>Complete todos los campos</h3>';
            header('location: ../singup/singup.php');
        }
    }

/*
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
*/
?>