<?php
if (!isset($_SESSION['vista'])) {
       header("location: /");
    }
    
require_once 'clases/Db.php';



class Usuario  {
    private $id;
    private $usuario;
    private $clave;
    private $email;
    private $pintor;
    
    public function __construct($usuario = null, $clave = null, $email = null, $pintor = null) {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->email = $email;
        $this->pintor = $pintor;
    }
    
    /*funcion para ver si usuario esta en la base de datos, valida usuario correcto*/
    public function validar_usuario($usuario, $clave) {
        /*Creamos la instancia del objeto. ya estamos conectados*/
        $bd = Db::getInstance();
        $sql = "SELECT * FROM login WHERE usuario= :usuario AND clave= :clave";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":usuario" => $usuario, ":clave" => $clave]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
        $obj = $stmt->fetch();
        return $obj;
    }
    /*funcion para ingresar a la base de datos*/
    public function registrar_usuario($usuario, $clave, $email, $pintor) {
        /*Creamos la instancia del objeto. ya estamos conectados*/
        $bd = Db::getInstance();
        $sql = "INSERT INTO login (usuario, clave, email, pintor) VALUES (:usuario, :clave, :email, :pintor)";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":usuario" => $usuario, ":clave" => $clave, ":email" => $email, ":pintor" => $pintor]);
    }
    /*funcion para hacer un aupdate*/
    public function update($usuario, $clave, $email, $pintor) {
        $bd = Db::getInstance();
        $sql = "UPDATE login SET usuario= :usuario, clave= :clave, email= :email, pintor= :pintor WHERE id= :id";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":usuario" => $usuario, ":clave" => $clave, ":email" => $email, ":pintor" => $pintor, ":id" => $this->id]);
    }
    /*funcion para dar de baja un usuario*/
    public function delete(){
        $bd = Db::getInstance();
        $sql = "DELETE FROM login WHERE id= :id";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id" => $this->id]);
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
    
}

