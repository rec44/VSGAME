<?php
    include_once 'Carta.php';
    include_once 'CartaBase.php';
    include_once 'Jugador.php';
    include_once 'TipoCartaEspecial.php';
    include_once 'Mazo.php';
    

    class Juego{
        private $numCartas;
        private $maxAtaque;
        private $maxDefensa;

        public function __construct($numCartas, $maxAtaque, $maxDefensa)
        {
            $this->numCartas = $numCartas;
            $this->maxAtaque = $maxAtaque;
            $this->maxDefensa = $maxDefensa;
        }

        public function getNumCartas(){
            return $this->numCartas;
        }

        public function getMaxAtaque(){
            return $this->maxAtaque;
        }

        public function getMaxDefensa(){
            return $this->maxDefensa;
        }

        public function generarCartasAleatorias(){
            $nombres = ['Guardián', 'Místico', 'Sombra', 'Mago de Hielo', 'Elemental de Fuego',
            'Cazador de Tormentas', 'Caballero Dragón', 'Oráculo, Bardo',
            'Encantador', 'Domador', 'Caballero Sombrío', 'Mago Rúnico',
            'Acechador Nocturno', 'Hechicero Celestial', 'Guerrero Fénix',
            'Ranger', 'Druida', 'Vampiro', 'Hechicero', 'Bruja', 'Gladiador', 'Monje',
            'Alquimista', 'Valquiria', 'Ilusionista', 'Maestro de Bestias', 'Cambiante',
            'Elementalista', 'Nigromante'];
            $cartas = array();
            for ($i = 0; $i < $this->numCartas; $i++){
                $nombre = $nombres[array_rand($nombres)];
                $ataque = rand(1,$this->maxAtaque);
                $defensa = rand(1,$this->maxDefensa);
                $cartas[] = new CartaBase($nombre,$ataque,$defensa,"Mago");
            }
            return $cartas;
        }

    }