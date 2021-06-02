<?php 
// INCLUIR ARCHIVOS
include('../db_php/db_conexion.php');
//error_reporting(0);
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



    // CONSULTA TABLA1
    $sql_dirNueva = "SELECT Direccion FROM tabla1 WHERE id = :id";
    $stmt_dirNueva = $obj_conexion->prepare($sql_dirNueva);
    $stmt_dirNueva->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_dirNueva->execute();
    $row_dirNueva = $stmt_dirNueva->fetch();
    $dirNueva = $row_dirNueva['Direccion'];



    // CONSULTA TABLA2
    $sql_dirViejas = "SELECT DirV FROM tabla2 WHERE Id_usuario = :id";
    $stmt_dirViejas = $obj_conexion->prepare($sql_dirViejas);
    $stmt_dirViejas->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_dirViejas->execute();


} else {
    $_SESSION['mensaje'] = '<h3 class="reg_ok">Error: Intentelo de nuevo.</h3>';
    header('location: ../db_php/db_login.php');
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
    <title>Direcciones</title>
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

    <h2>Lista de Direciones</h2>

    <div class="contenedor">
        
        <div class="tabla"><h3>Direccion Nueva</h3></div>
        <div class="tabla"><?php echo $dirNueva; ?></div>
    </div>
    <br>

    <div class="contenedor">
        <div class="tabla"><h3>Direcciones Anteriores</h3></div>

        <?php foreach($stmt_dirViejas as $item){ ?>
        <div class="tabla"><?php echo $item['DirV']; ?></div>
        <?php } ?>
    </div>
</body>
</html>