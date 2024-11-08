<main>
    <section class="dashboard-info">
        <h2>Mostrar usuarios</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nickname</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Imagen</th>
                <th>Fecha de creacion</th>
                <th>Modificar</th>
                <th>Eliminar</th>
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
                        <a href='index.php?controller=Usuario&action=modificarUsuario&id=" . $usuario['id'] . "'>Modificar</a>  
                    </td>
                    <td>
                        <a href='index.php?controller=Usuario&action=borrarUsuario&id=" . $usuario['id'] . "'>Eliminar</a>  
                    </td>";
            }
            ?>
        </table>
        <form action="index.php?controller=Usuario&action=anadirUsuario" method="POST">
            <input type="submit" value="Añadir Usuario">
        </form>
    </section>
</main>
</body>

</html>