<?php


class Cuadro {
    
    private $pintor;
    private $cuadros;
    
    function __construct($pintor = null, $cuadros = null) {
        $this->pintor = $pintor;
        $this->cuadros = $cuadros;
    }
    function getPintor() {
        return $this->pintor;
    }

    function getCuadros() {
        return $this->cuadros;
    }

    function setPintor($pintor) {
        $this->pintor = $pintor;
    }

    function setCuadros($cuadros) {
        $this->cuadros = $cuadros;
    }


}
