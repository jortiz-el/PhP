<?php
    class Partida {
        var $numero_secreto;
        var $intentos;
        function __construct() {
            $this->numero_secreto = rand(1, 10);
            $this->intentos = 0;
        }
        function get_numero_secreto() {
            return $this->numero_secreto; 
        }
        function get_intentos() {
            return $this->intentos; 
        }
        function suma_intentos() {
            $this->intentos++;
        }
    }

