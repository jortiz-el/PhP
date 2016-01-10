<?php

require_once 'clases/BD.php';

class Apuntes {
    
    protected $id_usuario;
    protected $tipo;
    protected $concepto;
    protected $cantidad;
    protected $fecha;
    
    public function __construct($id_usuario = null,$tipo = null,$concepto = null,$cantidad = null, $fecha = null) {
        $this->id_usuario = $id_usuario;
        $this->tipo = $tipo;
        $this->concepto = $concepto;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
    }
    
    public static function getApuntes($id) {
        $bd = BD::getConexion();
        $sql = "SELECT * FROM apuntes where id_usuario = :id";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id" => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE , "Apuntes");
        $apuntes = $stmt->fetchAll();
        $listado = new Collection();
        foreach ($apuntes as $apunte) {
            $listado->add($apunte);
        }
        return $listado;
    }
    public function persist() {
        $bd = BD::getConexion();
        $sql = "INSERT INTO apuntes(id_usuario, tipo, concepto, cantidad, fecha)"
                . " VALUES (:id_usuario, :tipo, :concepto, :cantidad, :fecha)";
        $stmt = $bd->prepare($sql);
        $valido = $stmt->execute([":id_usuario" => $this->id_usuario, ":tipo" => $this->tipo,":concepto" => $this->concepto,
            ":cantidad" => $this->cantidad,":fecha" => $this->fecha]);
        return $valido;
    }
    public static function getDetalle($id,$tipo,$fecha1,$fecha2) {
        $bd = BD::getConexion();
        $sql = "SELECT * FROM apuntes where id_usuario = :id_usuario and tipo = :tipo and fecha BETWEEN :fecha1 AND :fecha2 ";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id_usuario" => $id,":tipo"=>$tipo,":fecha1"=>$fecha1,":fecha2"=>$fecha2]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE , "Apuntes");
        $apuntes = $stmt->fetchAll();
        $listado = new Collection();
        foreach ($apuntes as $apunte) {
            $listado->add($apunte);
        }
        return $listado; 
    }
    function getTipo() {
        return $this->tipo;
    }

    function getConcepto() {
        return $this->concepto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setConcepto($concepto) {
        $this->concepto = $concepto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}


