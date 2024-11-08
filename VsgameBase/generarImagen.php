<?php
$ataque = isset($_GET['ataque'])? $_GET['ataque'] : '25'; 
$defensa = isset($_GET['defensa'])? $_GET['defensa'] : '20';

$imagen = imagecreatefromjpeg('img/cards/'.$random.'_card.jpg');
generarCirculoAtaque($imagen);
generarTextoAtaque($imagen,$ataque);
generarCirculoDefensa($imagen);
generarTextoDefensa($imagen,$defensa);
header('Content-Type: image/jpeg');
imagejpeg($imagen);
imagedestroy($imagen);


function generarTextoAtaque($imagen,$ataque)
{
  $colorTexto = imagecolorallocate($imagen, 0, 0, 0);
  $texto = strval($ataque);
  $fuente = 'riesling.ttf';
  $x = 10;
  $y = 465;
  imagettftext($imagen, 35, 0, $x, $y, $colorTexto, $fuente, $texto);
}

function generarCirculoAtaque($imagen)
{
  $colorCirculo = imagecolorallocate($imagen, 255, 0, 0);
  $x = 35;
  $y = 450;
  $diametro = 60;
  imagefilledellipse($imagen, $x, $y, $diametro, $diametro, $colorCirculo);
}

function generarTextoDefensa($imagen,$defensa)
{
  $colorTexto = imagecolorallocate($imagen, 0, 0, 0);
  $texto = strval($defensa);
  $fuente = 'riesling.ttf';
  $x = 290;
  $y = 465;
  imagettftext($imagen, 35, 0, $x, $y, $colorTexto, $fuente, $texto);
}

function generarCirculoDefensa($imagen)
{
  $colorCirculo = imagecolorallocate($imagen, 0, 255, 0);
  $x = 312;
  $y = 450;
  $diametro = 60;
  imagefilledellipse($imagen, $x, $y, $diametro, $diametro, $colorCirculo);
}
