<?php
session_start();
if (!isset($_SESSION['vista'])) {
   $_SESSION['vista'] = ''; 
}

if (isset($_POST['submit'])) {
    
    $credenciales = ['perico' => 'perico', 'pepito' => 'pepito', 'manolo' => 'manolo'];
    
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['password'] = $_POST['contrasenia'];
    
    function compruebaCredenciales($array, $n, $c) {
        $bool = 0;
        foreach ($array as $key => $valor) {
            if ($key == $n && $valor == $c){
                $bool = 1;
            }
        }
        return $bool;
    }
    
    if (compruebaCredenciales($credenciales, $_SESSION['usuario'], $_SESSION['password'])) {
        $_SESSION['vista'] = 'conectado';
    } else {
        $_SESSION['vista'] = 'error';
    }
  
}
if (isset($_POST['submit2'])) {
    session_unset();
    session_destroy();
}

if (isset($_SESSION['vista'])) {
    if ($_SESSION['vista'] == 'conectado') {
        include("vista/conectado.php");
    }else if ($_SESSION['vista'] == 'error') {
        echo "<h1>error de usuario o contraseña</h1>";
        include("vista/inicio.php");
        
    } else {
        include("vista/inicio.php");
    }
}else {
    include("vista/inicio.php");
}
?>