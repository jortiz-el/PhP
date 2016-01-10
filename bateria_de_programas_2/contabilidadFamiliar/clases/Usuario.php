<?php

require_once 'clases/BD.php';
require_once 'clases/Apuntes.php';

class Usuario {
    
    protected $id;
    protected $usuario;
    protected $clave;
    protected $apuntes;


    public function __construct($id = null, $usuario = null, $clave = null, $apuntes = null) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->apuntes = new Collection();
    }
    
    public static function validar($usuario, $clave) {
        $bd = BD::getConexion();
        $sql = "select * from usuario where usuario = :usuario and clave = :clave";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":usuario"=> $usuario, ":clave"=> $clave]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
        $valido = $stmt->fetch();
        if ($valido) {
            $valido->setApuntes(Apuntes::getApuntes($valido->getId()));
        }
        return $valido;
    }
    public static function persist($usuario, $clave) {
        $bd = BD::getConexion();
        $sql = "INSERT INTO usuario (usuario, clave) VALUES (:usuario, :clave)";
        $stmt = $bd->prepare($sql);
        try {
          $valido = $stmt->execute([":usuario"=> $usuario, ":clave"=> $clave]);  
        } catch (PDOException $ex) {
           $valido = 0; 
        }
        return $valido;
    }
    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }
    function getId() {
        return $this->id;
    }

    function getApuntes() {
        return $this->apuntes;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setApuntes($apuntes) {
        $this->apuntes = $apuntes;
    }



}

