<?php 
session_start();
// Comprueba si el usuario esta logeado e inpide acceso aca
    if(empty($_SESSION['usuario']) && $_SESSION['usuario'] !== true){
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
    <link rel="stylesheet" href="../styles/style_usuario.css">
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
    if($_SESSION['mensaje']){
        echo $_SESSION['mensaje'];
    }
    $_SESSION['mensaje'] = '';
    echo $_SESSION['mensaje'] = '';

?>

    <div class="container_table">
        <div class="table_title">Datos de usuarios</div>
        <div class="table_header">Fecha Reg.</div>
        <div class="table_header">Nombre</div>
        <div class="table_header">Apellido</div>
        <div class="table_header">DNI</div>
        <div class="table_header">Dirección</div>
        <div class="table_header">E-mail</div>
        <div class="table_header">Acciones</div>
        
        <div class="table_item"><?php echo $_SESSION['fecha_reg']; ?></div>
        <div class="table_item"><?php echo $_SESSION['nombre']; ?></div>
        <div class="table_item"><?php echo $_SESSION['apellido']; ?></div>
        <div class="table_item"><?php echo $_SESSION['dni']; ?></div>
        <div class="table_item"><?php echo $_SESSION['direccion']; ?></div>
        <div class="table_item"><?php echo $_SESSION['email']; ?></div>
        <div class="table_item">
            <a href="usuario_edit.php?id=<?php echo $_SESSION['id'];?>">Editar</a>
            <p> / </p>
            <a href="../db_php/db_delete.php?id=<?php echo $_SESSION['id'];?>">Borrar</a>
        </div>
                
    </div>

</body>
</html>