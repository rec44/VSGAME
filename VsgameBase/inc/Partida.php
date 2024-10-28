<?php
include_once 'Carta.php';
include_once 'CartaBase.php';
include_once 'Juego.php';
include_once 'Jugador.php';
include_once 'Mazo.php';

class Partida{
    private $jugador;
    private $maquina;
    private $puntosJugador;
    private $puntosMaquina;

    public function __construct(Jugador $jugador,Jugador $maquina)
    {
        $this->jugador = $jugador;
        $this->maquina = $maquina;
        $this->puntosJugador = 0;
        $this->puntosMaquina = 0;
    }

    public function getPuntosJugador(){
        return $this->puntosJugador;
    }

    public function getPuntosMaquina(){
        return $this->puntosMaquina;
    }

    public function getCartaJugador(){
        return $this->jugador->jugarCarta();
    }

    public function getCartaMaquina(){
        return $this->maquina->jugarCarta();
    }

    public function elegirAccion($accion,$cartaJugador,$cartaMaquina){
        if($this->jugador->tieneCarta() > 0 && $this->maquina->tieneCarta() > 0){

            if($accion === "ataque"){
                if($cartaJugador->getAtaque() > $cartaMaquina->getAtaque()){
                    $this->puntosJugador++;
                    return "Has ganado la ronda <br>". "Tu carta: ". $cartaJugador->mostrarInfo(). " || Carta Maquina: ". $cartaMaquina->mostrarInfo();
                } 
                elseif($cartaJugador->getAtaque() < $cartaMaquina->getAtaque()){
                    $this->puntosMaquina++;
                    return "Has perdido la ronda <br>". "Tu carta: ". $cartaJugador->mostrarInfo(). " || Carta Maquina: ". $cartaMaquina->mostrarInfo();
                } 
                else{
                    return "Empate <br>". "Tu carta: ". $cartaJugador->mostrarInfo(). " || Carta Maquina: ". $cartaMaquina->mostrarInfo();
                }
            }
            elseif($accion === "defensa"){
                if($cartaJugador->getDefensa() > $cartaMaquina->getDefensa()){
                    $this->puntosJugador++;
                    return "Has ganado la ronda <br>". "Tu carta: ". $cartaJugador->mostrarInfo(). " || Carta Maquina: ". $cartaMaquina->mostrarInfo();
                }
                elseif($cartaJugador->getDefensa() < $cartaMaquina->getDefensa()){
                    $this->puntosMaquina++;
                    return "Has perdido la ronda <br>". "Tu carta: ". $cartaJugador->mostrarInfo(). " || Carta Maquina: ". $cartaMaquina->mostrarInfo();
                }
                else{
                    return "Empate <br>". "Tu carta: ". $cartaJugador->mostrarInfo(). " || Carta Maquina: ". $cartaMaquina->mostrarInfo();
                }
            }
        }
    }

    public function finPartida(){
        return !($this->jugador->tieneCarta() && $this->maquina->tieneCarta());
    }

    public function determinarGanador(){
        if($this->puntosJugador > $this->puntosMaquina){
            return "El jugador ha ganado la partida con un total de $this->puntosJugador puntos";
        }
        elseif($this->puntosJugador < $this->puntosMaquina){
            return "La maquina ha ganado la partida con un total de $this->puntosMaquina puntos";
        }
        else{
            return "La partida ha terminado en empate con un total de $this->puntosJugador - $this->puntosMaquina puntos";
        }
    }
}