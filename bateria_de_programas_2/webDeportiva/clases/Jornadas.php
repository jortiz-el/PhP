<?php
require_once 'clases/Collection.php';
require_once 'clases/BD.php';
require_once 'clases/Partidos.php';

class Jornadas {
    protected $id;
    protected $id_liga;
    protected $partidos;
    protected $estado;
    protected $fecha;


    public function __construct($id_liga = null, $fecha = null) {
        $this->id_liga = $id_liga;
        $this->estado = 0;
        $this->fecha = $fecha;
        $this->id = null;
        $this->partidos = new Partidos();
    }
    public static function getJornadas($id_liga) {
        $bd = BD::getConexion();
        $sql = "select * from jornada where id_liga = :id_liga ";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id_liga" => $id_liga]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE , "Jornadas");
        $jornada = $stmt->fetchAll();
        $jornadas = new Collection();
        foreach ($jornada as $partidos) {
            $partidos->setPartidos(Partidos::getPartidos($partidos->getId()));
            $jornadas->add($partidos);
        }
        return $jornadas;
    }
    public function persit() {
        $bd = BD::getConexion();
        if ($this->id !== null){
            $sql = "update jornada SET estado = :estado where id = :id";
            $stmt = $bd->prepare($sql);
            $stmt->execute([":estado" => $this->estado, ":id" => $this->id]);
        } else {
            $sql = "INSERT INTO jornada (id_liga,fecha,estado) VALUES (:id_liga,:fecha,:estado)";
            $stmt = $bd->prepare($sql);
            $obj = $stmt->execute([":id_liga" => $this->id_liga, ":fecha" => $this->fecha, ":estado" => $this->estado]);
            if ($obj) {
                $this->setId($bd->lastInsertId());
            } 
        }
    }
    function getId() {
        return $this->id;
    }

    function getId_liga() {
        return $this->id_liga;
    }

    function getPartidos() {
        return $this->partidos;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_liga($id_liga) {
        $this->id_liga = $id_liga;
    }

    function setPartidos($partidos) {
        $this->partidos = $partidos;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}
