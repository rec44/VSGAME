<?php
class TipoCartaEspecial extends CartaBase{

    private $poderEspecial;

    public function __construct($nombre, $ataque, $defensa,$poderEspecial)
    {
        parent::__construct($nombre,$ataque,$defensa);
        $this->poderEspecial = $poderEspecial;
    }

    public function mostrarInfo(){
        return "Nombre:". parent::getNombre(). " |Ataque: ". parent::getAtaque()." |Defensa: ".parent::getDefensa()." |Poder: ".$this->poderEspecial;
    }

    public function __toString(){
        return $this->mostrarInfo();
    }
}