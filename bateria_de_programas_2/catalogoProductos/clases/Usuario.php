<?php

require_once 'clases/BD.php';

class Usuario {
    
    protected $usuario;
    protected $clave;
    
    public function __construct() {
      
    }
    
    public static function validar($usuario, $clave) {
        $bd = BD::getConexion();
        $sql = "select * from usuario where usuario = :usuario and clave = :clave";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":usuario"=> $usuario, ":clave"=> $clave]);
        $valido = $stmt->fetch();
        return $valido;
    }
}

