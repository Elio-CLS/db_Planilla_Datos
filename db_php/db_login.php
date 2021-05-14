<?php 
// Inicializa la session
session_start();

// Comprueba que el usuario no este ya logeado
if(isset($_SESSION['login']) && $_SESSION['login'] === true){
    header('location: ../perfil/admin.php');
    exit;
}

// Se incluye el archivo conexion
require_once "db_conexion.php";

// Se inicializan variables
$usuarioLogin = "";
$passLogin = "";
$usuario_error = "";
$pass_error = "";

// Compueba que se ingresaron datos en los campos del formulario
if(isset($_POST['btn_login'])){

    // Comprueba el campo de usuario
    if(empty(trim($_POST['usuarioLogin']))){
        $usuario_error = "Error: Ingrese su usuario";
        $_SESSION['mensaje'] = '<h3 class="reg_error">'.$usuario_error.'</h3>';
        header('location: ../login.php');
    } else {
        $usuarioLogin = trim($_POST['usuarioLogin']);
    }

    // Comprueba el campo del password
    if(empty(trim($_POST['passLogin']))){
        $pass_error = "Error: Ingrese su contraseña";
        $_SESSION['mensaje'] = '<h3 class="reg_error">'.$pass_error.'</h3>';
        header('location: ../login.php');
    } else {
        $passLogin = trim($_POST['passLogin']);
        $passLogin = sha1($passLogin);
    }

    // Validar datos con la db
    if(empty($usuario_error) && empty($pass_error)){

        // Prepara la consulta
        $sql = "SELECT ID, Fecha, Nombre, Apellido, DNI, Direccion, Email, Usuario, Passworld FROM tabla1 WHERE Usuario = :usuarioLogin";

        if($stmt = $obj_conexion->prepare($sql)){
            // Consultar a nico
            $stmt->bindParam(':usuarioLogin', $param_usuarioLogin, PDO::PARAM_STR);

            // Asignar parametros
            $param_usuarioLogin = trim($_POST['usuarioLogin']);

            // Ejecuta la consulta
            if($stmt->execute()){
                
                // Comprueba si existe el usuario y verifica la contraseña
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row['ID'];
                        $usuarioLogin = $row['Usuario'];
                        $pass_db = $row['Passworld'];

                        // Guarda datos para la tabla del usuario
                        $us_fecha = $row['Fecha'];
                        $us_nombre = $row['Nombre'];
                        $us_apellido = $row['Apellido'];
                        $us_dni = $row['DNI'];
                        $us_direccion = $row['Direccion'];
                        $us_email = $row['Email'];
                        
                        // Verifica el password
                        if($passLogin == $pass_db){
                            // Si es corrrecto, inicia nueva session
                            session_start();

                            // Guarda los datos de session en variables
                            $_SESSION['login'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['usuario'] = $usuarioLogin;

                            // Datos del usuario para su tabla propia
                            $_SESSION['fecha_reg'] = $us_fecha;
                            $_SESSION['nombre'] = $us_nombre;
                            $_SESSION['apellido'] = $us_apellido;
                            $_SESSION['dni'] = $us_dni;
                            $_SESSION['direccion'] = $us_direccion;
                            $_SESSION['email'] = $us_email;

                            // Redireccion si logea el admin
                            if($_SESSION['usuario'] == 'admin'){
                                $_SESSION['mensaje'] = '<h3 class="reg_ok">Bienvenido '.$usuarioLogin.'</h3>';
                                header('location: ../perfil/admin.php');
                                
                            } else {
                            // Redirecciona si logea un usuario
                            $_SESSION['mensaje'] = '<h3 class="reg_ok">Bienvenido '.$usuarioLogin.'</h3>';
                            header('location: ../perfil/usuario.php');
                            }
                            
                        } else {
                            // Mensaje de error si la contraseña no es correcta
                            $login_error = "Error: La contraseña no es correcta";
                            $_SESSION['mensaje'] = '<h3 class="reg_error">'.$login_error.'</h3>';
                            //echo $id . '<br>';
                            //echo $usuarioLogin . '<br>';
                            //echo $pass_db . '<br>';
                            //echo $passLogin . '<br>';
                            header('location: ../login.php');
                        }
                    }
                } else {
                    // Mensaje de error, el usuario o contraseña no existen
                    $login_error = "Error: El usuario o contraseña no existen";
                    $_SESSION['mensaje'] = '<h3 class="reg_error">'.$login_error.'</h3>';
                    header('location: ../login.php');
                }
            } else {
                // Mensaje de error, sucedio un error, intentarlo de nuevo
                $login_error = "Error: Sucedio un error, intentelo de nuevo";
                $_SESSION['mensaje'] = '<h3 class="reg_error">'.$login_error.'</h3>';
                header('location: ../login.php');
            }
            // Cierra el $stmt
            unset($stmt);
        }
    }
    // Cierra la conexion
    unset($obj_conexion);
}

?>