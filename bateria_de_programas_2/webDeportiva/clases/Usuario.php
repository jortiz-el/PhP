<?php

require_once 'clases/BD.php';

class Usuario {
    
    protected $id;
    protected $nombre;
    protected $clave;
    protected $estado;


    public function __construct($id = null, $nombre = null, $clave = null, $estado = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->estado = $estado;
    }
    
    public static function getUsuario($nombre, $clave) {
        $bd = BD::getConexion();
        $sql = "select * from login where nombre = :nombre and clave = :clave";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":nombre"=>$nombre, ":clave"=>$clave]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE , "Usuario");
        $usuario = $stmt->fetch();
        return $usuario;
    }
    public function persist(){
        $bd = BD::getConexion();
        $sql = "UPDATE login set estado = 1 WHERE id = :id";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id" => $this->id]);
    }
            
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getClave() {
        return $this->clave;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }
    function getEstado() {
        return $this->estado;
    }



}

