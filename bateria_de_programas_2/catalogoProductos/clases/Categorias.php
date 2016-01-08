<?php
require_once 'clases/BD.php';
require_once 'clases/collection.php';

class Categorias {
    
    protected $nombre;
    protected $productos;
    
    public function __construct($nombre = null, $producto = null) {
        $this->nombre = $nombre;
        $this->productos = new Collection();
    }
    
    public function getCategoria() {
      $bd = BD::getConexion();
      $sql = "select * from producto where nombre_categ = :nombre";
      $stmt = $bd->prepare($sql);
      $stmt->execute([":nombre" => $this->nombre]);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "productos");
      $productos = $stmt->fetchAll();
      $this->productos->removeAll();
      foreach ($productos as $producto) {
        $this->productos->add($producto);
      }
    }
    
    
    function getNombre() {
        return $this->nombre;
    }

    function getProductos() {
        return $this->productos;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setProductos($productos) {
        $this->productos = $productos;
    }


}

