<?php
include_once 'inc/Carta.php';
include_once 'inc/CartaBase.php';
include_once 'inc/Juego.php';
include_once 'inc/Jugador.php';
include_once 'inc/Mazo.php';
include_once 'inc/Partida.php';


session_start();

$mensaje = '';


if (!isset($_SESSION['jugador']) || !isset($_SESSION['maquina'])) {
  $_SESSION['juego'] = new Juego(5, 20, 20);
  $_SESSION['jugador'] = new Jugador("Jugador 1", $_SESSION['juego']);
  $_SESSION['maquina'] = new Jugador("Maquina", $_SESSION['juego']);
  $_SESSION['rondas'] = 1;
}

if (!isset($_SESSION['partida'])) {
  $_SESSION['partida'] = new Partida($_SESSION['jugador'], $_SESSION['maquina']);
}

$partida = $_SESSION['partida'];

if (!isset($_SESSION['puntosJugador'])) {
  $_SESSION['puntosJugador'] = 0;
}
if (!isset($_SESSION['puntosMaquina'])) {
  $_SESSION['puntosMaquina'] = 0;
}

if (!isset($_SESSION['cartaJugador']) || !isset($_SESSION['cartaMaquina'])) {
  $_SESSION['cartaJugador'] = $partida->getCartaJugador();
  $_SESSION['cartaMaquina'] = $partida->getCartaMaquina();
}

$cartaJugador = $_SESSION['cartaJugador'];
$cartaMaquina = $_SESSION['cartaMaquina'];


if (isset($_GET['opcionJugada'])) {
  $mensaje = $partida->elegirAccion($_GET['opcionJugada'],$cartaJugador,$cartaMaquina);
  $_SESSION['puntosJugador'] = $partida->getPuntosJugador();
  $_SESSION['puntosMaquina'] = $partida->getPuntosMaquina();
  $_SESSION['rondas']++;
}


if ($partida->finPartida()) {
  $ganador = $partida->determinarGanador();
  $_SESSION['rondas'] = '0';
  echo "
      <h2>Fin de partida</h2>
      <p>'. $ganador. '</p>
    </div>
  </div>'";
  session_destroy();
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Juego de Cartas</title>
</head>

<body>

  <!-- Formulario para elegir ataque o defensa -->
  <form action="" method="GET" id="formEnvio" style="display: none" ;>
    <select name="opcionJugada" id="opcionJugada">
      <option value="ataque">Ataque</option>
      <option value="defensa">Defensa</option>
    </select>
    <input type="submit" value="Enviar">
  </form>
  <!-- container -->
  <div class="container">
    <div class="card">
      <img src="generarImagen.php?ataque=<?php echo $cartaJugador->getAtaque()?> &defensa=<?php echo $cartaJugador->getDefensa()?>" alt="Carta del Jugador">
    </div>
    <img src="img/vs.png" alt="VS" class="vs">
    <div class="card">
      <img src="generarImagen.php?ataque=<?php echo $cartaMaquina->getAtaque()?> &defensa=<?php echo $cartaMaquina->getDefensa()?>" alt="Carta de la Máquina">
    </div>
  </div>
  <div class="container">
    <div class="buttons">
      <a href="#" id="atacar" onclick="atacar(); return false">
        <img src="img/atacar.png" alt="Carta del Jugador" class="btn">
      </a>
      <a href="#" id="defensa" onclick="defender(); return false">
        <img src="img/defender.png" alt="Carta del Jugador" class="btn">
      </a>
    </div>


  </div>
  <form method="POST">
    <button type="submit" name="reiniciar" id="restartGame">
      <img src="img/restartgame.png" alt="Reiniciar">
    </button>
  </form>
  <div class="score">
    <div class="contentScore">
      <div id="bandera" class="show">
        <img src="img/win1.png" alt="win1" class="win1">
        <img src="img/win2.png" alt="win2" class="win2">

      </div>
      <img src="img/score.png" alt="reiniciar" id="scoreGame">
      <div class="ronda">
        <?php echo $_SESSION['rondas']; ?>
      </div>
      <div class="puntuacionJ1">
        <?php echo $_SESSION['puntosJugador']; ?>
      </div>
      <div class="puntuacionJ2">
        <?php echo $_SESSION['puntosMaquina']; ?>
      </div>
    </div>
  </div>



  <div class="popup active" id="popup">
    <div class="popup-content">
      <button class="close-btn" id="closePopupBtn">&times;</button>
      <?php
      if ($partida->finPartida()) {
        $ganador = $partida->determinarGanador();
        $_SESSION['rondas'] = '0';
        echo "
      <h2>Fin de partida</h2>
      <p>. $ganador. </p>";
      } else {
        echo " <h2>Jugada</h2>";
        echo $mensaje;
      } ?>
    </div>
  </div>

  <?php
  if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
  }

  if ($partida->finPartida()) {
    session_destroy();
    exit();
  }
  ?>


  <script>
    const selectOculto = document.getElementById('opcionJugada');
    const formulario = document.getElementById('formEnvio');

    function atacar() {
      selectOculto.value = 'ataque'; // Cambia el valor del select
      formulario.submit();
    };

    function defender() {
      selectOculto.value = 'defensa'; // Cambia el valor del select
      formulario.submit();
    };

    // POPUP
    const closePopupBtn = document.getElementById('closePopupBtn');
    const popup = document.getElementById('popup');

    closePopupBtn.addEventListener('click', function() {
      popup.classList.remove('active');
    });

    window.addEventListener('click', function(e) {
      if (e.target === popup) {
        popup.classList.remove('active');
      }
    });
  </script>

</body>

</html>