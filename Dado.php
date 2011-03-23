<?php

class Dado{

    private $_caraActual;

    public function mostrarValor(){
        $this->_generarValor();
        return $this->_caraActual;
    }
    private function _generarValor(){
        $this->_caraActual = rand(1, 6);
    }
}
?>
