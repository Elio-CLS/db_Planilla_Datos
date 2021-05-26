<?php 
// INCLUIR ARCHIVOS
include('db_conexion.php');
error_reporting(0);
session_start();

// Comprueba que el usuario este logeado
if(empty($_SESSION['usuario']) && $_SESSION['usuario'] !== true){
    header('location: ../login.php');
    $_SESSION['mensaje'] = '<h3 class="reg_error">Error: Inicie sesion para acceder</h3>';
    exit;
}

// VERIFICAMOS ID
if(isset($_POST['btn_update'])){

        // ID
        $id = $_GET['id'];

        // NOMBRE
        if(empty($_POST['nombre_up']) || strlen($_POST['nombre_up']) < 2){
            $_SESSION['mensaje'] = '<h3 class="reg_error">Error: El nombre es muy corto o esta vacio.</h3>';
            header('location: ../perfil/usuario_edit.php');
        } else {
            $nombre_up = trim($_POST['nombre_up']);
        }

        // APELLIDO
        if(empty($_POST['apellido_up']) || strlen($_POST['apellido_up']) < 2){
            $_SESSION['mensaje'] = '<h3 class="reg_error">Error: El apellido es muy corto o esta vacio.</h3>';
            header('location: ../perfil/usuario_edit.php');
        } else {
            $apellido_up = trim($_POST['apellido_up']);
        }

        // DNI
        if(empty($_POST['dni_up']) || is_nan($_POST['dni_up']) || !is_numeric($_POST['dni_up'])){
            $_SESSION['mensaje'] = '<h3 class="reg_error">Error: El DNI no es un numero o es muy corto.</h3>';
            header('location: ../perfil/usuario_edit.php');
        } else {
            $dni_up = trim($_POST['dni_up']);
        }

        // DIRECCION
        if(empty($_POST['direccion_up']) || strlen($_POST['direccion_up']) < 5){
            $_SESSION['mensaje'] = '<h3 class="reg_error">Error: La direccion es muy corta o esta vacia.</h3>';
            header('location: ../perfil/usuario_edit.php');
        } else {
            $direccion_up = trim($_POST['direccion_up']);
        }

        // EMAIL
        if(empty($_POST['email_up']) || strlen($_POST['email_up']) < 5){
            $_SESSION['mensaje'] = '<h3 class="reg_error">Error: El mail es muy corto o esta vacio.</h3>';
            header('location: ../perfil/usuario_edit.php');
        } else {
            $email_up = trim($_POST['email_up']);
        }

        // ACTUALIZANDO LOS DATOS
        if(isset($nombre_up) &&
        isset($apellido_up) &&
        isset($dni_up) &&
        isset($direccion_up) &&
        isset($email_up)){

            // PREPARAR CONSULTA REGISTRAR
            $sql_update = "UPDATE tabla1 SET nombre = :nombre_up, apellido = :apellido_up, dni = :dni_up, direccion = :direccion_up, email = :email_up WHERE id = :id";

            if($stmt_update = $obj_conexion->prepare($sql_update)){
                $stmt_update->bindParam(':id', $id, PDO::PARAM_INT);

                $stmt_update->bindParam(':nombre_up', $nombre_up, PDO::PARAM_STR);

                $stmt_update->bindParam(':apellido_up', $apellido_up, PDO::PARAM_STR);

                $stmt_update->bindParam(':dni_up', $dni_up, PDO::PARAM_STR);

                $stmt_update->bindParam(':direccion_up', $direccion_up, PDO::PARAM_STR);

                $stmt_update->bindParam(':email_up', $email_up, PDO::PARAM_STR);

                // EJECUTAR CONSULTA
                if($stmt_update->execute()){
                    $_SESSION['mensaje'] = '<h3 class="reg_ok">Se actualizo correctamente.</h3>';
                    header('location: db_login.php');
                } else {
                    $_SESSION['mensaje'] = '<h3 class="reg_error">Error: Intentelo de nuevo.</h3>';
                    header('location: ../perfil/usuario_edit.php');
                }
                unset($stmt_update);
            } else {
                $_SESSION['mensaje'] = '<h3 class="reg_error">Error: Intentelo de nuevo.</h3>';
                header('location: ../perfil/usuario_edit.php');
            }
        } else {
            //$_SESSION['mensaje'] = '<h3 class="reg_error">Error: Intentelo de nuevo.</h3>';
            header('location: ../perfil/usuario_edit.php');
        }
    
        unset($obj_conexion);
}
?>