<?php
require_once 'clases/Collection.php';
require_once 'clases/BD.php';
require_once 'clases/Jornadas.php';
require_once 'clases/Partidos.php';

class Liga {
    protected $id;
    protected $nombre;
    protected $jornadas;
    
    public function __construct($nombre = null) {
        $this->nombre = $nombre;
        $this->jornadas = new Collection();
    }
    public static function getLiga($id) {
        $bd = BD::getConexion();
        $sql = "select * from liga where id = :id ";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id" => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE , "Liga");
        $jornada = $stmt->fetch();
        if ($jornada) {
            $jornada->setJornadas(Jornadas::getJornadas($jornada->getId()));
        }
        return $jornada;
    }

    public function persit() {
        $bd = BD::getConexion();
        $sql = "INSERT INTO liga (nombre) VALUES (:nombre)";
        $stmt = $bd->prepare($sql);
        $obj = $stmt->execute([":nombre" => $this->nombre]);
        if ($obj) {
            $this->setId($bd->lastInsertId());
        }
    }
    
    public function generaLiga($liga) {
        $interval = new DateInterval("P7D");
        $fecha = new DateTime("2014-11-2");
        $format = "Y-m-d";
        foreach ($liga as $num => $partidos) {
            $fechaPartido = $fecha->format($format);
            $jornada = new Jornadas($this->id, $fechaPartido);
            $jornada->persit();
            $fecha->add($interval);
            foreach ($partidos as $jugado) {
                $partido = new Partidos($jornada->getId(), $jugado['local'], $jugado['visitante']);
                $partido->persit();
            }
        }
    }

    public function checkEquipos($equipos) {
        $arr_equipos = explode(",", $equipos);
        $valido = (count($arr_equipos) < 4)? 0: $arr_equipos;
        return $valido;
    } 
    public function roundRobin($equipos) {

        if (count($equipos) % 2 != 0) {
            array_push($equipos, "colocolo");
        }
        for ($i = 0; $i < count($equipos) - 1; $i++) {
            $locales = array_slice($equipos, 0, (count($equipos) / 2));
            $visitantes = array_reverse(array_slice($equipos, (count($equipos) / 2)));

            for ($j = 0; $j < count($visitantes); $j++) {
                $liga[$i][$j]['local'] = $locales[$j];
                $liga[$i][$j]['visitante'] = $visitantes[$j];
            }
            $equipoBase = array_shift($equipos);
            array_unshift($equipos, array_pop($equipos));
            array_unshift($equipos, $equipoBase);
        }
        foreach ($liga as $jornada) {
            $jornadaVuelta = [];
            foreach ($jornada as $partido) {
                $partidoVuelta['local'] = $partido['visitante'];
                $partidoVuelta['visitante'] = $partido['local'];
                $jornadaVuelta[] = $partidoVuelta;
            }
            array_push($liga, $jornadaVuelta);
        }
        return $liga;
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getJornadas() {
        return $this->jornadas;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setJornadas($jornadas) {
        $this->jornadas = $jornadas;
    }


}