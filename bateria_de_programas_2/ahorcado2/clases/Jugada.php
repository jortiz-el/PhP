<?php


class Jugada {
    
    protected $id_partida;
    protected $id_user;
    protected $letra;
    protected $palabra_secreta;
    
    public function __construct($id_partida = null, $id_user = null, $letra = null, $palabra_secreta = null) {
        $this->id_partida = $id_partida;
        $this->id_user = $id_user;
        $this->letra = $letra;
        $this->palabra_secreta = $palabra_secreta;
    }
    public function persist() {
        $bd = Db::getInstance();
        $sql = "insert into jugadas (id_partida,id_user,letra,palabra_secreta) "
                . "values (:id_partida, :id_user, :letra, :palabra_secreta)";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id_partida" => $this->id_partida,":id_user" => $this->id_user, ":letra" => $this->letra, ":palabra_secreta" => $this->palabra_secreta]);
    }
    public static function getJugadas($id_partida) {
        $bd = Db::getInstance();
        $sql = "select * from jugadas where id_partida = :id_partida";
        $stmt = $bd->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Jugada");
        $stmt->execute([":id_partida" => $id_partida]);
        $jugadas = $stmt->fetchAll();
        $jugada = new Collection();
        foreach ($jugadas as $valor) {
            $jugada->add($valor);
        }
        return $jugada;
    }
            function getId_partida() {
        return $this->id_partida;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getLetra() {
        return $this->letra;
    }

    function getPalabra_secreta() {
        return $this->palabra_secreta;
    }


    
}
