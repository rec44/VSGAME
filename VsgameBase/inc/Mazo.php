<?php

class Mazo
{
    private $cartas = [];

    public function __construct(Juego $juego)
    {
        $this->cartas = $juego->generarCartasAleatorias();
    }

    public function generarCartasAleatorias()
    {
    }

    public function getMazo(){
        return $this->cartas;
    }

    public function sacarCarta()
    {
        return array_pop($this->cartas);
    }

    public function cartasRestantes()
    {
        return count($this->cartas);
    }
}
