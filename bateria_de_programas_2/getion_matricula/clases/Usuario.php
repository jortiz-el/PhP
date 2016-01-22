<?php

require_once 'clases/BD.php';
require_once 'clases/Collection.php';
require_once 'clases/grupo.php';
require_once 'clases/Alumno.php';

class Usuario {
    
    protected $id;
    protected $usuario;
    protected $clave;
    protected $grupos;


    public function __construct($id = null, $usuario = null, $clave = null, $grupos = null) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->grupos = new Collection();
    }
    
    public static function validar($usuario, $clave) {
        $bd = BD::getConexion();
        $sql = "select * from usuario where usuario = :usuario and clave = :clave";
        $stmt = $bd->prepare($sql);
        $stmt->execute([":usuario"=> $usuario, ":clave"=> $clave]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
        $valido = $stmt->fetch();
        if ($valido){
            $valido->setgrupos(Grupo::obtenerGrupo($valido->getId()));
        }
        return $valido;
    }
    public function deleteAlumno($id,$grupo) {
        $bd = BD::getConexion();
        $sql = "DELETE FROM alumno WHERE id = :id";
        $stmt = $bd->prepare($sql);
        $valido = $stmt->execute([":id"=> $id]);
        if ($valido){
            $this->getGrupos()->getByProperty("nombre", $grupo)->getAlumnos()->removeByProperty("id",$id);
        }
        return $valido;
    }
    public function modifyAlumno($id,$nombre,$apellido1,$apellido2,$edad,$sexo) {
        $bd = BD::getConexion();
        $sql = "UPDATE alumno SET nombre =:nombre,apellido1=:apellido1,apellido2=:apellido2,edad=:edad,sexo=:sexo WHERE id=:id ";
        $stmt = $bd->prepare($sql);
        $valido = $stmt->execute([":id"=> $id,":nombre"=>$nombre,":apellido1"=>$apellido1,":apellido2"=>$apellido2,":edad"=>$edad,":sexo"=>$sexo]);
        if ($valido){
            $this->setGrupos(Grupo::obtenerGrupo($this->getId()));
        }
        return $valido;
    }

    public function addAlumno($alumno,$nombre){
        $alumno->persist();
        $this->getGrupos()->getByProperty("nombre",$nombre)->getAlumnos()->add($alumno);
    }
            
    function getId() {
        return $this->id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getGrupos() {
        return $this->grupos;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setGrupos($grupos) {
        $this->grupos = $grupos;
    }




}

