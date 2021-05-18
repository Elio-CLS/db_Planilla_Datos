<?php 
// Inicializar sesion
session_start();

// Incluye archivo conexion
require_once "db_conexion.php";

// Comprueba que el usuario no este ya logeado
if(isset($_SESSION['login']) && $_SESSION['login'] === true){
    header('location: ../perfil/admin.php');
    exit;
}

// Comprueba si se llenaron los campos del form
if(isset($_POST['btn_registrar'])){

    // Comprueba datos en campo de usuario
    if(empty(trim($_POST['usuarioLogin']))){
        $usuario_error = "Error: Ingrese su usuario";
        $_SESSION['mensaje'] = '<h3 class="reg_error">'.$usuario_error.'</h3>';
        header('location: ../perfil/reset_pass.php');
    } else {
        $usuarioLogin = trim($_POST['usuarioLogin']);

        // Comprobamos campos de new_pass
        if(empty(trim($_POST['new_pass']))){
            $pass_error = "Error: Ingrese nueva contraseña";
            $_SESSION['mensaje'] = '<h3 class="reg_error">'.$pass_error.'</h3>';
            header('location: ../perfil/reset_pass.php');
        } else {
            $new_pass = trim($_POST['new_pass']);
        }

        // Comprueba campos de conf_new_pass
        if(empty(trim($_POST['conf_new_pass']))){
            $pass_conf_error = "Error: Ingrese nueva contraseña";
            $_SESSION['mensaje'] = '<h3 class="reg_error">'.$pass_conf_error.'</h3>';
            header('location: ../perfil/reset_pass.php');
        } else {
            $new_conf_pass = trim($_POST['conf_new_pass']);
        }

        // Confirma que sea la misma contraseña en ambos campos
        if($new_pass == $new_conf_pass){
            $new_pass = sha1($new_pass);
        } else {
            $pass_conf_error = "Error: La contraseña no es igual";
            $_SESSION['mensaje'] = '<h3 class="reg_error">'.$pass_conf_error.'</h3>';
            header('location: ../perfil/reset_pass.php');
        }

        // Valida los datos de usuario y contraseña nuevos
        if(empty($usuario_error) && empty($pass_conf_error) && empty($new_pass_error)){

            // Prepara la consulta a la db
            $sql_db = "SELECT ID, Usuario, Passworld FROM tabla1 WHERE Usuario = :usuarioLogin";

            if($stmt_db = $obj_conexion->prepare($sql_db)){
                $stmt_db->bindParam(':usuarioLogin', $param_usuarioLogin, PDO::PARAM_STR);

                // Asignar parametros
                $param_usuarioLogin = trim($_POST['usuarioLogin']);

                // Ejecuto la consulta
                if($stmt_db->execute()){

                    // Comprueba si existe el usuario
                    if($stmt_db->rowCount() == 1){
                        if($row = $stmt_db->fetch()){
                            $id = $row['ID'];
                            $pass_db = $row['Passworld'];
                            // Comprueba que la constraseña nueva y la antigua no sean iguales
                            if($pass_db != $new_pass){

                                // Preparamos la consulta a al db
                                $sql = "UPDATE tabla1 SET Passworld = :new_password WHERE ID = :id";

                                if($stmt = $obj_conexion->prepare($sql)){
                                    $stmt->bindParam(":new_password", $param_new_pass, PDO::PARAM_STR);
                                    $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);

                                    // Anadimos los valores nuevos a los parametro
                                    $param_new_pass = $new_pass;
                                    $param_id = $id;

                                    // Ejecuto la consulta
                                    if($stmt->execute()){
                                        // Si los cambios fueron correctos, se destruye la sesion y se redirije a la pagina de login
                                        $pass_ok = "Nueva contraseña ingresada";
                                        $_SESSION['mensaje'] = '<h3 class="reg_ok">'.$pass_ok.'</h3>';
                                        session_destroy();
                                        header('location: ../login.php');
                                        exit;
                                    } else {
                                        // Mensaje de error
                                        $new_pass_error = "Error: Ocurrio un error, intentelo de nuevo.";
                                        $_SESSION['mensaje'] = '<h3 class="reg_error">'.$new_pass_error.'</h3>';
                                        header('location: ../perfil/reset_pass.php');
                                    }
                                    // Cierra el $stmt
                                    unset($stmt);
                                }    
                            } else {
                                // Mensaje de error, La nueva contraseña es igual a su antigua contraseña
                                $new_pass_error = "Error: La nueva contraseña es igual a su antigua contraseña";
                                $_SESSION['mensaje'] = '<h3 class="reg_error">'.$new_pass_error.'</h3>';
                                header('location: ../perfil/reset_pass.php');
                            }
                        } 
                    } else {
                        // Mensaje de error, el usuario o contraseña no existen
                        $login_error = "Error: El usuario no existe";
                        $_SESSION['mensaje'] = '<h3 class="reg_error">'.$login_error.'</h3>';
                        header('location: ../perfil/reset_pass.php');
                    }
                } else {
                    // Mensaje de error, sucedio un error, intentarlo de nuevo
                    $login_error = "Error: Sucedio un error, intentelo de nuevo";
                    $_SESSION['mensaje'] = '<h3 class="reg_error">'.$login_error.'</h3>';
                    header('location: ../perfil/reset_pass.php');
                }
                // Cierra el $stmt
                unset($stmt_db);
            }
            // Cierra la conexion
            unset($obj_conexion);
        }
    }
}

?>