<?php

    
require_once 'clases/Db.php';



class Usuario  {
    private $id;
    private $usuario;
    private $clave;
    private $email;
    private $pintor;
    
    public function __construct($usuario = null, $clave = null, $email = null, $pintor = null, $id = null) {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->email = $email;
        $this->pintor = $pintor;
        $this->id = $id;
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
        if ($obj) {
            $pintor = $obj->getPintor();
            $obj->setPintor(Pintor::get_Pintor($pintor));
        }
        return $obj;
    }
        public function persist() {
        $bd = Db::getInstance();
        
        if($this->id) {
            $sql = "update login SET usuario = :usuario, clave = :clave, email = :email, pintor = :pintor WHERE id = :id";
            $stmt = $bd->prepare($sql);
            $stmt->execute([":usuario" => $this->getUsuario(), ":clave" => $this->getClave(),
                ":email" => $this->getEmail(), ":pintor" => $this->getPintor(), "id" => $this->getID()]);
            $obj = self::validar_usuario($this->usuario, $this->clave);
            
        } else {
            $obj = self::validar_usuario($this->usuario, $this->clave);
            if(!$obj){
            $sql = "Insert into login (usuario,clave,email,pintor) values (:usuario, :clave, :email, :pintor)";
            $stmt = $bd->prepare($sql);
            $stmt->execute([":usuario" => $this->getUsuario(), ":clave" => $this->getClave(),
                ":email" => $this->getEmail(), ":pintor" => $this->getPintor()]);
            $obj = self::validar_usuario($this->usuario, $this->clave);
            } else {
               $obj = 0; 
            }
        }
        return $obj;
    }
    /*funcion para dar de baja un usuario*/
    public function delete(){
        $bd = Db::getInstance();
        $sql = "DELETE FROM login WHERE id= :id";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id" => $this->id]);
        session_unset();
        session_destroy();
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
    public function getEmail() {
        return $this->email;
    }
    public function getPintor() {
        return $this->pintor;
    }
    function setPintor($pintor) {
        $this->pintor = $pintor;
    }


}

