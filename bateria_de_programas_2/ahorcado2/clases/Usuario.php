<?php

    
require_once 'clases/Db.php';



class Usuario  {
    private $id;
    private $usuario;
    private $clave;
    private $cod;

    
    public function __construct($usuario = null, $clave = null, $id = null, $cod = null) {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->id = $id;
        $this->cod = $cod;
    }
    
    /*funcion para ver si usuario esta en la base de datos, valida usuario correcto*/
    public static function validar_usuario($usuario, $clave) {
        /*Creamos la instancia del objeto. ya estamos conectados*/
        $bd = Db::getInstance();
        $sql = "SELECT * FROM login WHERE usuario= :usuario AND clave= :clave";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":usuario" => $usuario, ":clave" => $clave]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
        $obj = $stmt->fetch();
        return $obj;
    }
        public function persist($usario, $clave, $cod) {
        $bd = Db::getInstance();
        $sql = "Insert into login (usuario,clave,cod) values (:usuario, :clave, :cod)";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":usuario" => $usario, ":clave" => $clave, ":cod" => $cod]);
    }

    public function getID() {
        return $this->id;
    }
    public function getUsuario() {
        return $this->usuario;
    }
    public function getClave() {
        return $this->clave;
    }
    function getCod() {
        return $this->cod;
    }




}

