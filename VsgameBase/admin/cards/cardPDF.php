<?php
include('../../tcpdf/config/tcpdf_config.php');
include('../../tcpdf/tcpdf.php');
require_once "../../config/Conexion.php";

$db = new Conexion();
$conexion = $db->get_conexion();
$consulta = "SELECT * FROM cartas";
$stmt = $conexion->prepare($consulta);
$stmt->execute();

$documento = new TCPDF();
$documento->AddPage();
$texto = 
'<h1> Informe de Cartas de VSGAME</h1>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Ataque</th>
        <th>Defensa</th>
    </tr>';
    while($resultado = $stmt->fetch()){
                $texto.="<tr>
                <td>" . $resultado['nombre'] . "</td>
                <td>" . $resultado['ataque'] . "</td>
                <td>" . $resultado['defensa'] . "</td>
                </tr>";
            }    
$texto.= '</table>';


$documento->writeHTML($texto);

$documento->Output("Informe de Cartas",'I');
