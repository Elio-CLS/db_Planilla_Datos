<?php 
session_start();
// Comprueba que el usuario y admin no este ya logeado
// Y no deja que el usuario acceda a este panel
    if(empty($_SESSION['usuario'] && $_SESSION['usuario'] == 'admin') && $_SESSION['usuario'] !== true ){
        header('location: ../login.php');
        $_SESSION['mensaje'] = '<h3 class="reg_error">Error: Inicie sesion para acceder</h3>';
        exit;
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/styles_mensaje.css">
    <title>Panel Admin</title>
</head>


<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="../db_php/db_logout.php">Salir</a>
            </li>
        </ul>
    </nav>

<?php
    include('../db_php/db_consulta.php');
?>

<?php
    //session_start();
    if($_SESSION['mensaje']){
        echo $_SESSION['mensaje'];
    }
    $_SESSION['mensaje'] = '';
    echo $_SESSION['mensaje'] = '';

?>

    <div class="container_table">
        <div class="table_title">Datos de usuarios</div>
        <div class="table_header">ID</div>
        <div class="table_header">Fecha Reg.</div>
        <div class="table_header">Nombre</div>
        <div class="table_header">Apellido</div>
        <div class="table_header">DNI</div>
        <div class="table_header">Dirección</div>
        <div class="table_header">E-mail</div>
        <div class="table_header">Usuario</div>
        <div class="table_header">Acciones</div>

        <?php foreach($consulta as $item){ ?>
        <div class="table_item"><?php echo $item['ID']; ?></div>
        <div class="table_item"><?php echo $item['Fecha']; ?></div>
        <div class="table_item"><?php echo $item['Nombre']; ?></div>
        <div class="table_item"><?php echo $item['Apellido']; ?></div>
        <div class="table_item"><?php echo $item['DNI']; ?></div>
        <div class="table_item"><?php echo $item['Direccion']; ?></div>
        <div class="table_item"><?php echo $item['Email']; ?></div>
        <div class="table_item"><?php echo $item['Usuario']; ?></div>
        <div class="table_item">
            <a href="usuario_edit.php?id=<?php echo $item['ID'];?>">Editar</a>
            <p> / </p>
            <a href="../db_php/db_delete.php?id=<?php echo $item['ID'];?>">Borrar</a>
            <p> / </p>
            <a href="direcciones.php?id=<?php echo $item['ID']; ?>">Ver</a>
        </div>
        <?php } ?>
    </div>

</body>
</html>