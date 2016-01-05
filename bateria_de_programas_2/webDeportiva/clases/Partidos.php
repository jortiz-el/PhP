
<?php
require_once 'clases/BD.php';
require_once 'clases/Collection.php';

class Partidos {
    protected $id;
    protected $id_jornada;
    protected $equipo_L;
    protected $gol_L;
    protected $equipo_V;
    protected $gol_V;
    
    public function __construct($id_jornada = null,$equipo_L = null,
            $equipo_V = null) {
        
        $this->id_jornada = $id_jornada;
        $this->equipo_L = $equipo_L;
        $this->equipo_V = $equipo_V;
        $this->gol_L = 0;
        $this->gol_V = 0;
        $this->id = null;
    }
    public static function getPartidos($id_jornada) {
        $bd = BD::getConexion();
        $sql = "select * from partido where id_jornada = :id_jornada ";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id_jornada" => $id_jornada]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE , "Partidos");
        $partido = $stmt->fetchAll();
        $partidos = new Collection();
        foreach ($partido as $partida) {
            $partidos ->add($partida);
        }
        return $partidos ;
    }
    public function persit() {
        $bd = BD::getConexion();
        if ($this->id !== null){
            $sql = "update partido SET gol_L = :gol_L, gol_V = :gol_V where id = :id";
            $stmt = $bd->prepare($sql);
            $stmt->execute([":gol_L" => $this->gol_L, ":gol_V" => $this->gol_V, ":id" => $this->id]);
        } else {
            $sql = "INSERT INTO partido (id_jornada,equipo_L,equipo_V,gol_L,gol_V)"
                    . " VALUES (:id_jornada,:equipo_L,:equipo_V,:gol_L,:gol_V)";
            $stmt = $bd->prepare($sql);
            $obj = $stmt->execute([":id_jornada" => $this->id_jornada,
                ":equipo_L" => $this->equipo_L, ":equipo_V" => $this->equipo_V,
                ":gol_L" => $this->gol_L, ":gol_V" => $this->gol_V]);
            if ($obj) {
                $this->setId($bd->lastInsertId());
            }
        }
    }
    function getId() {
        return $this->id;
    }

    function getId_jornada() {
        return $this->id_jornada;
    }

    function getEquipo_L() {
        return $this->equipo_L;
    }

    function getGol_L() {
        return $this->gol_L;
    }

    function getEquipo_V() {
        return $this->equipo_V;
    }

    function getGol_V() {
        return $this->gol_V;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_jornada($id_jornada) {
        $this->id_jornada = $id_jornada;
    }

    function setEquipo_L($equipo_L) {
        $this->equipo_L = $equipo_L;
    }

    function setGol_L($gol_L) {
        $this->gol_L = $gol_L;
    }

    function setEquipo_V($equipo_V) {
        $this->equipo_V = $equipo_V;
    }

    function setGol_V($gol_V) {
        $this->gol_V = $gol_V;
    }


}
