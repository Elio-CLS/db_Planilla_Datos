<?php 
// Inicializa la session
session_start();

// Comprueba que el usuario no este ya logeado
if(isset($_SESSION['login']) && $_SESSION['login'] === true){
    header('location: ../perfil/admin.php');
    exit;
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
    <title>Cambiar contraseña</title>
</head>
<body>
    <nav class="nav">
        <ul>
            <li>
                <a href="../login.php">Ingresar</a>
            </li>
            <li>
                <a href="../singup/singup.php">Registro</a>
            </li>
        </ul>
    </nav>

    <div class="contenedor">
        <h2>Ingrese su usuario y la nueva contraseña</h2>
        <form method="POST" action="../db_php/db_reset_pass.php">
            <div class="tabla">
                <input type="text" name="usuarioLogin" placeholder="Usuario"></div>
            <div class="tabla">
                <input type="password" name="new_pass" placeholder="Nueva constraseña"></div>
            <div class="tabla">
                <input type="password" name="conf_new_pass" placeholder="Confirme contraseña"></div>
            <div class="tabla">
                <input type="submit" name="btn_registrar" value="Guardar"></div>
        </form>
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