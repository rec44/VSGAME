<main>
    <section class="dashboard-info">
        <div class="form-container">
            <h2>Añadir Carta</h2>
            <form action="index.php?controller=Carta&action=anadirCartas" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="ataque">Ataque:</label>
                <input type="text" name="ataque" id="ataque" required>

                <label for="defensa">Defensa:</label>
                <input type="text" name="defensa" id="defensa" required>

                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" id="tipo" required>

                <label for="img">Imagen:</label>
                <input type="text" name="img" id="img" required>

                <label for="poderEscpecial">Poder Especial: </label>
                <input type="text" name="poderEscpecial" id="poderEscpecial" required>

                <button type="submit">Añadir Carta</button>
            </form>
        </div>
    </section>
</main>
</body>
</html>