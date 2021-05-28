<?php
    session_start();
    include('db_conexion.php');

    if(isset($_POST['btn_registrar'])) {
        if(strlen($_POST['nombre']) >= 3 &&
            strlen($_POST['apellido']) >= 3 &&
            !empty($_POST['dni']) &&
            is_numeric($_POST['dni']) &&
            !empty($_POST['direccion']) &&
            !empty($_POST['email']) &&
            !empty($_POST['pass']) &&
            !empty($_POST['passConfirm'])) {
            
            $fecha_reg = date('d/m/Y');
            $nombre = trim($_POST['nombre']);
            $apellido = trim($_POST['apellido']);
            $dni = trim($_POST['dni']);
            $direccion = trim($_POST['direccion']);
            $email = trim($_POST['email']);
            
            // Comprobacion de usuario
            if(!empty($_POST['usuario']) && strlen($_POST['usuario']) >= 3){
                $usuario = trim($_POST['usuario']);
            
                $pass = trim($_POST['pass']);
                $passConfirm = trim($_POST['passConfirm']);
            
                // confirma el password y regista en la db
                if($pass==$passConfirm){
                    $pass = sha1($pass);
                    
                    $registro = $obj_conexion->prepare("INSERT INTO tabla1 (fecha,nombre,apellido,dni,direccion,email,usuario,passworld) VALUES('$fecha_reg','$nombre','$apellido','$dni','$direccion','$email','$usuario','$pass')");

                        if($registro->execute()){
                            $_SESSION['mensaje'] = '<h3 class="reg_ok">El registro fue exitoso</h3>';
                            header('location: ../login.php');
                        } else {
                            $_SESSION['mensaje'] = '<h3 class="reg_error">Hay un error, intentelo de nuevo</h3>';
                            header('location: ../singup/singup.php');
                        }
                // Error en la contraseña
                } else {
                    $_SESSION['mensaje'] = '<h3 class="reg_error">Error: La contraseña no es igual</h3>';
                    header('location: ../singup/singup.php');
                }
            // Error en usuario
            } else {
                $_SESSION['mensaje'] = '<h3 class="reg_error">Error: El usuario es muy corto, debe ser de minimo 4 letras</h3>';
                header('location: ../singup/singup.php'); 
            }
        // Error en formulario
        } else {
            $_SESSION['mensaje'] = '<h3 class="reg_error">Error: Complete todos los campos</h3>';
            header('location: ../singup/singup.php');
        }
    }
?>