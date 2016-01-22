<?php

require_once 'clases/BD.php';
require_once 'clases/Collection.php';
require_once 'clases/Alumno.php';

class Grupo {
    
    protected $id_usuario;
    protected $nombre;
    protected $idioma;
    protected $alumnos;
    
    public function __construct($id_usuario = null, $nombre = null, $idioma = null, $alumnos = null) {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre ;
        $this->idioma = $idioma;
        $this->alumnos = new Collection();
    }
    
    public static function obtenerGrupo($id) {
        $bd = BD::getConexion();
        $sql = "select * from grupo where id_usuario = :id_usuario";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":id_usuario"=> $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Grupo");
        $grupo = $stmt->fetchAll();
        $grupos = new Collection();
        foreach ($grupo as $alumnos){
           $alumnos->setAlumnos(Alumno::obtenerAlumno($alumnos->getNombre()));
           $grupos->add($alumnos);        
        }
        return $grupos;
    }
    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getIdioma() {
        return $this->idioma;
    }

    function getAlumnos() {
        return $this->alumnos;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setIdioma($idioma) {
        $this->idioma = $idioma;
    }

    function setAlumnos($alumnos) {
        $this->alumnos = $alumnos;
    }


}

