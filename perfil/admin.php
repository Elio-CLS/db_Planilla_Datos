<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/styles_mensaje.css">
    <title>Tabla Admin</title>
</head>


<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="../singup/singup.php">Registro</a>
            </li>
            <li>
                <a href="../login.php">Salir</a>
            </li>
        </ul>
    </nav>

<?php
    include('../db_php/db_consulta.php');
?>

<?php
    session_start();
    if($_SESSION['mensaje']){
        echo $_SESSION['mensaje'];
    }
?>

    <div class="container_table">
        <div class="table_title">Datos de usuarios</div>
        <div class="table_header">ID</div>
        <div class="table_header">Nombre</div>
        <div class="table_header">Apellido</div>
        <div class="table_header">DNI</div>
        <div class="table_header">Dirección</div>
        <div class="table_header">Usuario</div>
        <div class="table_header">Contraseña</div>

        <?php foreach($consulta as $item){ ?>
        <div class="table_item"><?php echo $item['ID']; ?></div>
        <div class="table_item"><?php echo $item['Nombre']; ?></div>
        <div class="table_item"><?php echo $item['Apellido']; ?></div>
        <div class="table_item"><?php echo $item['DNI']; ?></div>
        <div class="table_item"><?php echo $item['Direccion']; ?></div>
        <div class="table_item"><?php echo $item['Usuario']; ?></div>
        <div class="table_item"><?php echo $item['Passworld']; ?></div>
        <?php } ?>
    </div>

</body>
</html>