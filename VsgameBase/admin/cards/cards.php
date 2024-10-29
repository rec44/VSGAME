<?php
require "../../../vendor/autoload.php";
require_once "../../config/Conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Conexion();
    $conexion = $db->get_conexion();
    $consulta = "SELECT * FROM cartas";
    $stmt = $conexion->prepare($consulta);
    $stmt->execute();

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
    while ($resultado = $stmt->fetch()) {
        $contador++;
        $texto .= "<tr>
                <td>" . $resultado['nombre'] . "</td>
                <td>" . $resultado['ataque'] . "</td>
                <td>" . $resultado['defensa'] . "</td>
                </tr>";
    }
    $texto .= '</table>';

    $texto .= '<p>Numero de total de cartas: ' . $contador . '</p>';

    $documento->Image('../../img/vs.png', 15, 15, 30, 0, 'PNG');
    $documento->writeHTML($texto);
    $documento->Output("Informe de Cartas.pdf", 'D');
    exit();
}

$db = new Conexion();
$conexion = $db->get_conexion();
$consulta = "SELECT * FROM cartas";
$stmt = $conexion->prepare($consulta);
$stmt->execute();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "DELETE FROM cartas WHERE ID = :id";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: cards.php");
    exit();
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
            while ($resultado = $stmt->fetch()) {
                echo "<tr>
                    <td>" . $resultado['ID'] . "</td>
                    <td>" . $resultado['nombre'] . "</td>
                    <td>" . $resultado['ataque'] . "</td>
                    <td>" . $resultado['defensa'] . "</td>
                    <td>" . $resultado['tipo'] . "</td>
                    <td>" . $resultado['poderEspecial'] . "</td>
                    <td>" . $resultado['img'] . "</td>
                    <td><a href='cards.php?id=" . $resultado['ID'] . "'>Eliminar</a></td>
                    <td><a href='cardEdit.php?id=" . $resultado['ID'] . "'>Modificar</a></td>
                </tr>";
            }
            ?>
    </table>

    <form action="cards.php" method="POST">
        <input type="submit" value="Descargar"> Descargar PDF
    </form>

</body>

</html>
<table>
</table>