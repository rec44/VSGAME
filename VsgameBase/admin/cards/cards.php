<?php
require_once "../../config/Conexion.php";

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

if($_SERVER['REQUEST-METHOD'])
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
        <input type="submit" value="descargar"> Descargar PDF
    </form>

</body>

</html>
<table>
</table>