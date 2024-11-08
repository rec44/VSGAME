<?php
require_once __DIR__ . "/../../../vendor/autoload.php";
require_once  __DIR__ . "/../models/CardBD.php";
include_once __DIR__ . "/../views/header.php";


class CartaController
{
    private $cartaModel;

    public function __construct()
    {
        $this->cartaModel = new CardBD();
    }

    public function mostrarCartas()
    {
        $cartas = $this->cartaModel->obtenerCartas();

        require_once __DIR__ . "/../views/cards/cards.php";
    }

    public function descargarPDF()
    {
        $cartas = $this->cartaModel->obtenerCartas();

        header('Content-Type: application/pdf');

        $documento = new TCPDF();
        $documento->SetMargins(15, 30, 15);
        $documento->setCellPadding(3);
        $documento->AddPage();
        $contador = 0;
        $texto =
            '<style>
        h1 { text-align: center; }
        tr th { font-size: 20px; padding: 20px !important; text-align: center; }
        td { text-align: center; padding: 10px; }
        table { margin-top: 30px; border-collapse: collapse; width: 100%; }
        </style>

        <h1> Informe de Cartas de VSGAME</h1>
        <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Ataque</th>
            <th>Defensa</th>
        </tr>';
        foreach ($cartas as $carta) {
            $contador++;
            $texto .= "<tr>
                <td>" . $carta['nombre'] . "</td>
                <td>" . $carta['ataque'] . "</td>
                <td>" . $carta['defensa'] . "</td>
                </tr>";
        }
        $texto .= '</table>';

        $texto .= '<p>Numero de total de cartas: ' . $contador . '</p>';

        $documento->Image('../img/vs.png', 15, 15, 30, 0, 'PNG');
        $documento->writeHTML($texto);
        $documento->Output("Informe de Cartas.pdf", 'D');
        exit();
    }

    public function anadirCartas()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $ataque = $_POST['ataque'];
            $defensa = $_POST['defensa'];
            $tipo = $_POST['tipo'];
            $img = $_POST['img'];
            $poderEspecial = $_POST['poderEspecial'];
            $this->cartaModel->insertarCarta($nombre, $ataque, $defensa, $tipo, $img, $poderEspecial);
        }

        require_once __DIR__ . "/../views/cards/cardAdd.php";
    }

    public function borrarCarta()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->cartaModel->eliminarCarta($id);
        }

        $this->mostrarCartas();
    }

    public function modificarCarta()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $ataque = $_POST['ataque'];
            $defensa = $_POST['defensa'];
            $tipo = $_POST['tipo'];
            $img = $_POST['img'];
            $poderEspecial = $_POST['poderEspecial'];

            $this->cartaModel->actualizarCartas($id, $nombre, $ataque, $defensa, $tipo, $img, $poderEspecial);
            $this->mostrarCartas();
            exit();
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $carta = $this->cartaModel->obtenerCartaPorID($id);
            if ($carta) {
                $nombre = $carta['nombre'];
                $ataque = $carta['ataque'];
                $defensa = $carta['defensa'];
                $tipo = $carta['tipo'];
                $img = $carta['img'];
                $poderEspecial = $carta['poderEspecial'];
            }
        }
        require_once __DIR__ . "/../views/cards/cardEdit.php";
    }
}
