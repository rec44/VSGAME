<?php
require_once "../../models/UsuarioBD.php";
include "../header.php";
$modelo = new UsuarioBD();
$usuarios = $modelo->obtenerUsuarios();
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
                <li><a href="../dashboard.php?logout=true"><?php if (isset($_SESSION['nickname'])) echo "Hola " . $_SESSION['nickname'] . " " ?>Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-info">
            <div class="form-container">
                <h2>Mostrar usuarios</h2>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Nickname</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Imagen</th>
                        <th>Fecha de creacion</th>
                    </tr>
                    <?php
                    foreach ($usuarios as $usuario) {
                        echo "<tr>
                    <td>" . $usuario['id'] . "</td>
                    <td>" . $usuario['nickname'] . "</td>
                    <td>" . $usuario['email'] . "</td>
                    <td>" . $usuario['password'] . "</td>
                    <td>" . $usuario['imagen'] . "</td>
                    <td>" . $usuario['fecha_registro'] . "</td>
                    <td>
                        <form action='userEdit.php' method='get'>
                            <input type='hidden' name='id' value='" . $usuario['id'] . "'>
                            <input type='submit' value='Modificar'>
                        </form>
                    </td>
                    <td>
                        <form action='userDelete.php' method='get'>
                            <input type='hidden' name='id' value='" . $usuario['id'] . "'>
                            <input type='submit' value='Eliminar'></input>
                        </form>
                    </td>";
                    }
                    ?>
                </table>
                <?php
                ?>
            </div>
        </section>
    </main>
</body>

</html>