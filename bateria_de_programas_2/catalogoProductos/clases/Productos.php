<?php
require_once 'clases/BD.php';

class Productos {
    
    protected $nombre_categ;
    protected $nombre;
    protected $precio;
    
    public function __construct($nombre_categ = null, $nombre = null, $precio = null) {
        $this->nombre_categ = $nombre_categ;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
   
    public function persist() {
        $bd = BD::getConexion();
        $sql = "INSERT INTO producto(nombre_categ, nombre, precio) VALUES (:nombre_categ,:nombre,:precio)";
        $stmt = $bd->prepare($sql);
        $valido = $stmt->execute([":nombre_categ" => $this->nombre_categ,":nombre"=>  $this->nombre,":precio"=>  $this->precio]);
        return $valido;
    }
    public function update($nombre) {
        $bd = BD::getConexion();
        $sql = "UPDATE producto SET nombre= :nombre,precio= :precio WHERE nombre= :nombreP";
        $stmt = $bd->prepare($sql);
        $valido = $stmt->execute([":nombreP" => $nombre,":nombre"=>  $this->nombre,":precio"=>  $this->precio]);
        return $valido;
    }
    public function delete() {
        $bd = BD::getConexion();
        $sql = "DELETE FROM producto WHERE nombre = :nombre";
        $stmt = $bd->prepare($sql);
        $valido = $stmt->execute([":nombre"=>  $this->nombre]);
        return $valido;
    }
            
    function getNombre_categ() {
        return $this->nombre_categ;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setNombre_categ($nombre_categ) {
        $this->nombre_categ = $nombre_categ;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }


}

