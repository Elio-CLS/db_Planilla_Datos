<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles_singup.css">
    <link rel="stylesheet" href="../styles/styles_mensaje.css">
    <title>Registro</title>
</head>

<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="../login.php">Ingresar</a>
            </li>
        </ul>
    </nav>

    <div class="contenedor">
        <h2>Registro de usuario</h2>
        <form method="POST" action="../db_php/db_registro.php">
            <div class="tabla">
                <input type="text" name="nombre" placeholder="Nombre"></div>
            <div class="tabla">
                <input type="text" name="apellido" placeholder="Apellido"></div>
            <div class="tabla">
                <input type="text" name="dni" placeholder="DNI"></div>
            <div class="tabla">
                <input type="text" name="direccion" placeholder="Dirección"></div>
            <div class="tabla">
                <input type="text" name="email" placeholder="E-mail"></div>
            <div class="tabla">
                <input type="text" name="usuario" placeholder="Usuario"></div>
            <div class="tabla">
                <input type="password" name="pass" placeholder="Constraseña"></div>
            <div class="tabla">
                <input type="password" name="passConfirm" placeholder="Confirmar constraseña"></div>
            <div class="tabla">
                <input type="submit" name="btn_registrar" value="Guardar"></div>
        </form>
    </div>

<?php
    session_start();
    if($_SESSION['mensaje']){
        echo $_SESSION['mensaje'];
    }
$_SESSION['mensaje'] = '';
echo $_SESSION['mensaje'] = '';

?>   
</body>
</html>