<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles_singup.css">
    <link rel="stylesheet" href="styles/styles_mensaje.css">
    <title>Iniciar sesion</title>
</head>
<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="singup/singup.php">Registro</a>
            </li>
        </ul>
    </nav>

    <div class="contenedor">
        <h2>Ingreso de usuario</h2>
        <form method="POST" action="db_php/db_login.php">
            <div class="tabla">
                <input type="text" name="usuarioLogin" placeholder="Usuario"></div>
            <div class="tabla">
                <input type="password" name="passLogin" placeholder="Constraseña"></div>
            <div class="tabla">
                <input type="submit" name="btn_login" value="Ingresar"></div>
        </form>

        <a id="btn_new_pass" href="perfil/reset_pass.php">Cambie su contraseña</a>
    </div>

<?php
    error_reporting(0);
    // Mensajes
    session_start();

    if($_SESSION['mensaje']){
        echo $_SESSION['mensaje'];
    } else {
        $_SESSION = array();
    }
    $_SESSION['mensaje'] = '';
    echo $_SESSION['mensaje'] = '';
?>  

</body>
</html>