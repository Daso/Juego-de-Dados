<?php
require_once 'Dado.php';
class Jugador {
    private $_nombre;
    private $_pozo;
    

    public function __construct($nombre, $pozo) {
        $this->_nombre = $nombre;
        $this->_pozo = $pozo;
    }

    public function jugar($apuesta){
        
        $this->_pozo -= $apuesta;;
        $total = $this->_lanzarDados();
        $this->_evaluarLanzamiento($total, $apuesta);
        return $this->mostrarResultado($total, $apuesta);
    }

    private function mostrarResultado($total, $apuesta){
        return "La suma de dados del jugador: ".$this->_nombre." es: ".$total." su nuevo pozo es: ".$this->_pozo;
    }

    public function getPozo(){
        return $this->_pozo;
    }

    private function _lanzarDados(){
        $dado = new Dado();
        $total = $dado->mostrarValor() + $dado->mostrarValor();
        return $total;
    }
    
    private function _evaluarLanzamiento($total , $apuesta){
        switch ($total) {
            case 7:
            case 11:
                $this->_pozo = 0;


                break;
            case 2:
            case 12:
                $this->_pozo = $this->_pozo + ($apuesta * 3);
                break;
            
            case 1:
            case 3:
            case 4:
            case 5:
            case 6:
                
               break;
           case 8:
            case 9:
            case 10:
                $this->_pozo = $this->_pozo + ($apuesta * 2);
                break;
            default:
                break;
        }
    }
}
?>
