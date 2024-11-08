<main>
    <section class="dashboard-info">
        <div class="form-container">
            <h2>Añadir Usuario</h2>
            <form action="index.php?controller=Usuario&action=modificarUsuario" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nickname">Nickname:</label>
                <input type="text" name="nickname" id="nickname" value="<?php echo $nombre?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $email?>" required>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Actualizar Usuario</button>
            </form>
        </div>
    </section>
</main>
</body>
</html>