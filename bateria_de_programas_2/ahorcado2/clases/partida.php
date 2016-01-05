<?php
require_once 'clases/AlmacenPalabras.php';
require_once 'clases/Db.php';
require_once 'clases/collection.php';

class partida {
    protected $palabra_secreta;
    protected $letras_usadas;
    protected $intentos;
    protected $estado_palabra;
    protected $fallos;
    protected $id_user;
    protected $id;
    protected $estado_juego;
    


    public function __construct() {
        $this->palabra_secreta = AlmacenPalabras::getInstance()->getPalabraAleatoria();
        $this->letras_usadas = "";
        $this->intentos = 0;
        $this->fallos = 1;
        $this->id_user = null;
        $this->id = null;
        $this->estado_juego = 0;
        $this->estado_palabra = "";
        $this->setEstado();
    }
    
    function setEstado() {
        $long = strlen($this->palabra_secreta);
        for ($i = 0; $i < $long; $i++){
            $this->estado_palabra .= "_";
        }
    }
    function descubrePalabra($letra) {
        $long = strlen($this->palabra_secreta);
        $encontrada = 0;
        for ($i = 0; $i < $long; $i++){
            if ($letra == $this->palabra_secreta[$i]) {
                $this->estado_palabra[$i] = $letra;
                $encontrada = 1;
            }
        }
        if ($encontrada == 0){
            $this->fallos += 1;
        }
        $this->sumaIntentos();
        $this->setLetras_usadas($letra);
        $this->estado_juego = ($this->esFin() || $this->getFallos() == 8)? 1 : 0;
    }
    function persit() {
        $bd = Db::getInstance();
        if ($this->id == null) {
            $sql = "Insert into partidas (id_user,palabra_secreta,letras_usadas,intentos, fallos, estado_palabra,estado_juego)"
                . " values (:id_user, :p_secreta, :l_usadas, :intentos, :fallos, :e_palabra, :e_juego)";
            $stmt = $bd->prepare($sql);
            try {
                $stmt->execute([":id_user" => $this->id_user, ":p_secreta" =>  $this->palabra_secreta,
                    ":l_usadas" => $this->letras_usadas,":intentos" => $this->intentos, ":fallos" => $this->fallos,
                    ":e_palabra" => $this->estado_palabra, ":e_juego" => $this->estado_juego]);
            } catch (Exception $ex) {
               echo $ex; 
            }
            $this->setId($bd->lastInsertId());
                
        }else {
            $sql = "update partidas SET id_user = :id_user,palabra_secreta = :p_secreta,letras_usadas = :l_usadas,intentos = :intentos,fallos = :fallos, estado_palabra = :e_palabra,estado_juego = :e_juego WHERE id = :id";
            $stmt = $bd->prepare($sql);
            $stmt->execute([":id_user" => $this->id_user, ":p_secreta" =>  $this->palabra_secreta, ":l_usadas" => $this->letras_usadas,
                ":intentos" => $this->intentos, ":fallos" => $this->fallos, ":e_palabra" => $this->estado_palabra, ":e_juego" => $this->estado_juego, ":id" => $this->id]);
        }
    }

    public static function getPendientes($id_user) {
        $bd = Db::getInstance();
        $sql = "SELECT * FROM partidas WHERE estado_juego = 0 AND id_user = :id_user";
        $stmt = $bd->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "partida");
        $stmt->execute([":id_user" => $id_user]);
        $partida = $stmt->fetchAll();
        $partidas = new Collection();
        foreach ($partida as $valor) {
            $partidas->add($valor);
        }
        return $partidas;
    }
    public static function getFinalizadas($id_user) {
        $bd = Db::getInstance();
        $sql = "SELECT * FROM partidas WHERE estado_juego = 1 AND id_user = :id_user";
        $stmt = $bd->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "partida");
        $stmt->execute([":id_user" => $id_user]);
        $partida = $stmt->fetchAll();
        $partidas = new Collection();
        foreach ($partida as $valor) {
            $partidas->add($valor);
        }
        return $partidas;
    }
    public static function getPartida($id) {
        $bd = Db::getInstance();
        $sql = "SELECT * FROM partidas WHERE id= :id";
        $stmt = $bd->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "partida");
        $stmt->execute([":id" => $id]);
        $partida = $stmt->fetch();
        return $partida;
    }


            
    function esFin(){
        return ($this->palabra_secreta == $this->estado_palabra);
    }
    function sumaIntentos() {
        $this->intentos ++;
    }
    function setLetras_usadas($letra) {
        $this->letras_usadas .= $letra;
    }
            
    function getPalabra_secreta() {
        return $this->palabra_secreta;
    }

    function getLetras_usadas() {
        return $this->letras_usadas;
    }

    function getIntentos() {
        return $this->intentos;
    }


    function getFallos() {
        return $this->fallos;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function getId() {
        return $this->id;
    }

    function getEstado_palabra() {
        return $this->estado_palabra;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getEstado_juego() {
        return $this->estado_juego;
    }


    
}
