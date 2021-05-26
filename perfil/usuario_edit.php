<?php 
// INCLUIR ARCHIVO
include('../db_php/db_conexion.php');
error_reporting(0);
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

    // PREPARAR LA CONSULTA
    $sql_edit = "SELECT * FROM tabla1 WHERE id = :id";
    $stmt_edit = $obj_conexion->prepare($sql_edit);
    $stmt_edit->bindParam(':id', $id, PDO::PARAM_INT);

    // EJECUTAR CONSULTA
    if($stmt_edit->execute()){
        if($stmt_edit->rowCount() == 1){
            $row = $stmt_edit->fetch();

            // GUARDAMOS LOS VALORES
            $nombre_db = $row['Nombre'];
            $apellido_db = $row['Apellido'];
            $dni_db = $row['DNI'];
            $direccion_db = $row['Direccion'];
            $email_db = $row['Email'];
        }
        unset($stmt_edit);
    }
    unset($obj_conexion);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles_singup.css">
    <link rel="stylesheet" href="../styles/styles_mensaje.css">
    <title>Actualizar Datos</title>
</head>

<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="../db_php/db_login.php">Volver</a>
            </li>
            <li>
                <a href="../db_php/db_logout.php">Salir</a>
            </li>
        </ul>
    </nav>

    <div class="contenedor">
        <h2>Actualizar datos del usuario</h2>
        <form method="POST" action="../db_php/db_edit.php?id=<?php echo $id; ?>">
            <div class="tabla">
                <input type="text" name="nombre_up" placeholder="Editar Nombre" value="<?php echo $nombre_db;?>"></div>
            <div class="tabla">
                <input type="text" name="apellido_up" placeholder="Editar Apellido" value="<?php echo $apellido_db;?>"></div>
            <div class="tabla">
                <input type="text" name="dni_up" placeholder="Editar DNI" value="<?php echo $dni_db;?>"></div>
            <div class="tabla">
                <input type="text" name="direccion_up" placeholder="Editar Dirección" value="<?php echo $direccion_db;?>"></div>
            <div class="tabla">
                <input type="text" name="email_up" placeholder="Editar E-mail" value="<?php echo $email_db;?>"></div>
            
            <div class="tabla">
                <input type="submit" name="btn_update" value="Actualizar"></div>
        </form>
    </div>

<?php
    if($_SESSION['mensaje']){
        echo $_SESSION['mensaje'];
    }
$_SESSION['mensaje'] = '';
echo $_SESSION['mensaje'] = '';
?>   
</body>
</html>