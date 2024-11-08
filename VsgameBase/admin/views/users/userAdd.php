<main>
    <section class="dashboard-info">
        <div class="form-container">
            <h2>Añadir Usuario</h2>
            <form action="index.php?controller=Usuario&action=anadirUsuario" method="POST">
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