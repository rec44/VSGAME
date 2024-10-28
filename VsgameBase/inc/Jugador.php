<?php

include_once 'Carta.php';
include_once 'CartaBase.php';
include_once 'Juego.php';
include_once 'TipoCartaEspecial.php';
include_once 'Mazo.php';

class Jugador {
    private $nombre;
    private $mazo;

    public function __construct($nombre,Juego $juego)
    {
        $this->nombre = $nombre;
        $this->mazo = new Mazo($juego);
    }

    public function jugarCarta(){
        if($this->tieneCarta()){
            $carta = $this->mazo->sacarCarta();
            return $carta;
        }
        return null;
    }

    public function tieneCarta(){
        return $this->mazo->cartasRestantes() > 0;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function mostrarMazo(){
       foreach($this->mazo->getMazo() as $carta){
        echo $carta->getNombre()." ,". 
            $carta->getAtaque(). " , ".
            $carta->getDefensa()."<br>";
       } 
    }

    public function cartasRestantes(){
        return $this->mazo->cartasRestantes();
    }

}