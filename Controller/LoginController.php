<?php
// require_once '../core/config.php';
// require_once '../Models/LoginModel.php';

$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/Models/LoginModel.php';
require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/core/config.php';


class UserController {
    public function login($username, $password) {
        $loginModel = new UserModel();
        $user = $loginModel->getUserByUsername($username);
            
        if ($user && isset($user['reg_contrasena']) && $password === $user['reg_contrasena']) {
            // Inicio de sesión exitoso
            session_start();

            // Redireccionar a la página de inicio u otra página
            header("Location: ../views/Home.php");
            exit;
        } else {
            // Credenciales inválidas
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    }
}


// Ejemplo de uso
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['iniciarSesion'])) {
    $username = $_POST['usuario'];
    $password = $_POST['contrasena'];

    $userController = new UserController();
    $userController->login($username, $password);
}

?>

