<?php


    
/*Clase encargada de gestionar las conexiones a la base de datos*/
class Db  {
    private $servidor = 'localhost';
    private $username = 'admin';
    private $passwd = 'admin';
    private $base_datos = 'ahorcado';
    private $link;
    
    static $_instance;
    
    /*La funcion construct es privada para evitar que el objeto pueda ser creado mediante new*/
    private function __construct() {
        $this->conectar();
    }
    
    /*Evitamos el clonaje del objeto.Patron Singleton*/
    private function __clone() { }
    
   /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
   public static function getInstance(){
      if (!self::$_instance){
         new Db();
      }
      return self::$_instance;
   }
   
   /*Realizamos la conexion a la base de datos*/
   private function conectar() {
       $this->link = "mysql:host=$this->servidor;dbname=$this->base_datos";
       try {
           self::$_instance = new PDO($this->link, $this->username, $this->passwd);
            } catch (PDOException $e) {
        echo "error: ".$e->getMessage();
        }
   }
   
   
   
}


