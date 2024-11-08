<main>
    <section class="dashboard-info">
        <div class="form-container">
            <h2>Añadir Usuario</h2>
            <form action="index.php?controller=Carta&action=modificarCarta" method="POST">
                <input type="hidden" name="id" value="<?php echo $id?>">
                
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $nombre?>" required>

                <label for="ataque">Ataque:</label>
                <input type="text" name="ataque" id="ataque" value="<?php echo $ataque?>" required>

                <label for="defensa">Contraseña:</label>
                <input type="text" name="defensa" id="defensa" value="<?php echo $defensa?>" required>

                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" id="tipo" value="<?php echo $tipo?>" required>

                <label for="img">Imagen:</label>
                <input type="text" name="img" id="img" value="<?php echo $img?>" required>

                <label for="poderEspecial">Poder Especial: </label>
                <input type="text" name="poderEspecial" id="poderEspecial" value="<?php echo $poderEspecial?>" required>

                <button type="submit">Añadir Carta</button>
            </form>
        </div>
    </section>
</main>
</body>