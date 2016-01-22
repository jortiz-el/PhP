<?php

require_once 'clases/BD.php';
require_once 'clases/Collection.php';


class Alumno {
    
    protected $id;
    protected $n_grupo;
    protected $nombre;
    protected $apellido1;
    protected $apellido2;
    protected $edad;
    protected $sexo;
    
    public function __construct($n_grupo = null, $nombre = null, $apellido1 = null, $apellido2 = null, $edad = null, $sexo = null) {
        $this->n_grupo = $n_grupo;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->edad = $edad;
        $this->sexo = $sexo;
    }
    
    public static function obtenerAlumno($n_grupo) {
        $bd = BD::getConexion();
        $sql = "select * from alumno where n_grupo = :n_grupo";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":n_grupo"=> $n_grupo]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Alumno");
        $valido = $stmt->fetchAll();
        $alumnos = new Collection();
        foreach ($valido as $alumno) {
            $alumnos->add($alumno);
        }
        return $alumnos;
    }
    
    public function persist() {
         $bd = BD::getConexion();
        $sql = "INSERT INTO alumno(n_grupo, nombre, apellido1, apellido2, edad, sexo)"
                . " VALUES (:n_grupo, :nombre, :apellido1, :apellido2, :edad, :sexo)";
        $stmt = $bd->prepare($sql);
        $valido = $stmt->execute([":n_grupo" => $this->n_grupo, ":nombre" => $this->nombre,
            ":apellido1" => $this->apellido1, ":apellido2" => $this->apellido2, ":edad" => $this->edad, ":sexo" => $this->sexo]);
        if ($valido) {
            
            $this->setId($bd->lastInsertId());
        }
        return $valido;
    }
    
    function getN_grupo() {
        return $this->n_grupo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido1() {
        return $this->apellido1;
    }

    function getApellido2() {
        return $this->apellido2;
    }

    function getEdad() {
        return $this->edad;
    }

    function getSexo() {
        return $this->sexo;
    }

    function setN_grupo($n_grupo) {
        $this->n_grupo = $n_grupo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }



}
