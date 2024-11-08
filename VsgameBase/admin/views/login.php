<?php
require_once __DIR__ . "/../models/UsuarioBD.php";
$modelo = new UsuarioBD();
$mensajeError = '';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['username'];
    $password = $_POST['password'];
    $usuario = $modelo->validarLogin($email, $password);

    if($usuario){
        $_SESSION['nickname'] = $usuario['nickname'];

        if(isset($_POST['remember']) && $_POST['remember'] == 1){
            setcookie('email','',time() - (86400 * 30), "/");
            setcookie('nickname', $usuario['nickname'], time() + (86400 * 30), "/");
        }
        else{
            setcookie('email','',time()-3600, "/");
            setcookie('nickname', '', time()-3600, "/");
        }

        header("Location: dashboard.php");
        exit();

    } else {
        $mensajeError = "Error de autenticación";
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/admin.css"> <!-- Archivo CSS externo -->
</head>

<body>
    <div class="login-container">
        <form action="login.php" method="POST" class="login-form">
            <h2>Iniciar Sesión</h2>
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <input type="checkbox" name="remember" id="remember" value="1">
            <label for="remember">Recuerdame</label>
            
            <?php
            echo "<p style = 'color:red'>" . $mensajeError . "</p>"
            ?>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>

</html>