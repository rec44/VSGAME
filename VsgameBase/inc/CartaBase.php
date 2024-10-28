<?php
class CartaBase implements Carta
{
    private $nombre;
    private $ataque;
    private $defensa;
    private $tipo;

    public function __construct($nombre, $ataque, $defensa,$tipo)
    {
        $this->nombre = $nombre;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
        $this->tipo = $tipo;
    }
    public function getAtaque(){
        return $this->ataque;
    }

    public function getDefensa(){
        return $this->defensa;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function mostrarInfo(){
        return "Nombre: $this->nombre | Ataque: $this->ataque | Defensa: $this->defensa";
    }

    public function __toString()
    {
        return $this->mostrarInfo();
    }

    public function crearImagen(){
        $imagen = imagecreatefrompng('../img/cards/1_card.jpg');
        $colorTexto = imagecolorallocate($imagen,0,0,0);
        $texto = strval($this->ataque);
        $fuente ='riesling.ttf';
        $x = 10;
        $y = 20;

        imagettftext($imagen, 20, 0, $x, $y, $colorTexto, $fuente, $texto);
        imagepng($imagen);
        imagedestroy($imagen);
    }
}
