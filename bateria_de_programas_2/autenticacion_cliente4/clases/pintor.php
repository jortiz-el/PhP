<?php
require_once 'clases/Db.php';
require_once 'clases/collection.php';
require_once 'clases/cuadro.php';

class Pintor {
    
    private $pintor;
    private $cuadros;
    
    public function __construct($pintor = null) {
        $this->pintor = $pintor;
        $cuadro = null;
    }

    public static function get_Pintor($pintor) {
        $bd = Db::getInstance();
        $sql = "SELECT * FROM pintor WHERE pintor=:pintor";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":pintor" => $pintor]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pintor");
        $obj = $stmt->fetch();
        if ($obj) {
            $obj->cuadros = new Collection();
            $obj->generaColeccion();
        }
        return $obj;
    }
    public function generaColeccion() {
        $bd = Db::getInstance();
        $sql = "SELECT * FROM cuadros WHERE pintor=:pintor";
        $stmt = $bd->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Cuadro");
        $stmt->execute([":pintor" => $this->pintor]);
        $coleccion = $stmt->fetchAll();
        foreach ($coleccion as $cuadro) {
            $this->cuadros->add($cuadro);
        }
    }

    public function generaAleatorio() {
        $tamanio = $this->getCuadros()->getNumObjects();
        $aleatorio = rand(0, $tamanio-1);
        return $this->cuadros->getObjNum($aleatorio); 
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




}
