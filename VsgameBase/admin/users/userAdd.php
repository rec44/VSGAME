<?php
    require_once "../../models/UsuarioBD.php";
    include "../header.php";
    $modelo = new UsuarioBD();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nickname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $modelo->insertarUsuario($nombre,$email,$password);
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../assets/css/admin.css"> <!-- Archivo CSS externo -->
</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <nav>
            <ul>
                <li><a href="../dashboard.php">Inicio</a></li>
                <li><a href="./userAdd.php">Añadir Usuario</a></li>
                <li><a href="./userEdit.php">Modificar Usuario</a></li>
                <li><a href="./userDelete.php">Eliminar Usuario</a></li>
                <li><a href="../dashboard.php?logout=true"><?php if(isset($_SESSION['nickname'])) echo "Hola " . $_SESSION['nickname'] ." "?>Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-info">
           <div class="form-container">
            <h2>Añadir Usuario</h2>
            <form action="userAdd.php" method="POST">
                <label for="nickname">Nickname:</label>
                <input type="text" name="nickname" id="nickname" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Añadir Usuario</button>
            </form>
        </div>
        </section>
    </main>
</body>
</html>
