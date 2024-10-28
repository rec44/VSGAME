<?php include_once "./header.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="./assets/css/admin.css"> <!-- Archivo CSS externo -->
</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Inicio</a></li>
                <li><a href="cards/cards.php">Cartas</a></li>
                <li><a href="config/config.php">Configuración</a></li>
                <li><a href="users/users.php">Usuarios</a></li>
                <li><a href="?logout=true"><?php if(isset($_SESSION['nickname'])) echo "Hola " . $_SESSION['nickname'] ." "?>(Cerrar Sesión)</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-info">
            <h2>Información del juego</h2>
            <p>Número total de cartas: <!-- Aquí va el número de cartas --> </p>
            <p>Configuración actual: <!-- Aquí va la configuración actual --> </p>
        </section>
    </main>
</body>
</html>
