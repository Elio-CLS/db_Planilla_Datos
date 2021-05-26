<?php 
// INCLUIR CONEXION
include('db_conexion.php');
session_start();

// Comprueba que el usuario este logeado
if(empty($_SESSION['usuario']) && $_SESSION['usuario'] !== true){
    header('location: ../login.php');
    $_SESSION['mensaje'] = '<h3 class="reg_error">Error: Inicie sesion para acceder</h3>';
    exit;
}

// VERIFICAMOS ID
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // PREPARAR LA CUNSULTA
    $sql_delete = "DELETE FROM tabla1 WHERE id = :id";

    if($stmt_delete =  $obj_conexion->prepare($sql_delete)){
        $stmt_delete->bindParam(':id', $id, PDO::PARAM_INT);

        // EJECUTAR CONSULTA
        if($stmt_delete->execute()){
            

            if($_SESSION['usuario'] !== 'admin'){
                $_SESSION['mensaje'] = '<h3 class="reg_ok">Se borro correctamente </h3>';
                header('location: db_logout.php');
            } else {
                $_SESSION['mensaje'] = '<h3 class="reg_ok">Se borro correctamente </h3>';
                header('location: ../perfil/admin.php');
            }
        } else {
            $_SESSION['mensaje'] = '<h3 class="reg_error">Error: Intentelo de nuevo.</h3>';
            header('location: ../perfil/usuario.php');
        }
        unset($stmt_delete);
    }
    unset($obj_conexion);
}

?>