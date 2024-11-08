
<section class="dashboard-info">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ataque</th>
            <th>Defensa</th>
            <th>Tipo</th>
            <th>poderEspecial</th>
            <th>Img</th>
            <th>Eliminar</th>
            <th>Modificar</th>
        </tr>
        <?php
        foreach ($cartas as $carta) {
            echo "<tr>
                    <td>" . $carta['ID'] . "</td>
                    <td>" . $carta['nombre'] . "</td>
                    <td>" . $carta['ataque'] . "</td>
                    <td>" . $carta['defensa'] . "</td>
                    <td>" . $carta['tipo'] . "</td>
                    <td>" . $carta['poderEspecial'] . "</td>
                    <td>" . $carta['img'] . "</td>
                    <td><a href='index.php?controller=Carta&action=modificarCarta&id=" . $carta['ID']. "'>Modificar</a></td>
                    <td><a href='index.php?controller=Carta&action=borrarCarta&id=" . $carta['ID'] . "'>Eliminar</a></td>
                </tr>";
        }
        ?>
    </table>
    <form action="index.php?controller=Carta&action=descargarPDF" method="POST">
        <input type="submit" value="Descargar PDF">
    </form>
    <form action="index.php?controller=Carta&action=anadirCartas" method="POST">
        <input type="submit" value="Añadir Carta">
    </form>
</section>
</body>
</html>
