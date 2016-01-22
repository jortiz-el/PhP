<?php

require_once ('clases/Usuario.php');
require_once 'clases/collection.php';
require_once 'clases/Apuntes.php';
session_start();

if (isset($_SESSION['usuario'])) {
    
    $usuario = $_SESSION['usuario'];
    
    if (isset($_POST['desconectar'])){
        session_unset();
        session_destroy();
        $view = 'conexion';
        include 'vistas/conexion.php'; 
    } else if (isset($_POST['nuevo'])){
        $view = 'ingresos';
        include 'vistas/ingresos.php'; 
    } else if (isset($_POST['enviar'])){
       $apunte = new Apuntes($usuario->getId(),$_POST['tipo'], $_POST['concepto'], $_POST['cantidad'], $_POST['fecha']);
       $usuario->addApunte($apunte);
       
       $_SESSION['usuario'] = $usuario;
       $view = 'apuntes';
       include 'vistas/apuntes.php';  
    } else if (isset ($_POST['saldos'])) {
        $view = 'estado';
        include 'vistas/estado.php'; 
    } else if (isset ($_POST['ingresos'])) {
        $view = 'detalle';
        $_SESSION['tipo'] = "ingresos";
        include 'vistas/detalle.php'; 
    }else if (isset ($_POST['gastos'])) {
        $view = 'detalle';
        $_SESSION['tipo'] = "gastos";
        include 'vistas/detalle.php'; 
    } else if (isset ($_POST['lista'])) {
        $lista = Apuntes::getDetalle($usuario->getId(),$_SESSION['tipo'],$_POST['fecha1'],$_POST['fecha2']);
        $view = 'lista';
        include 'vistas/lista.php'; 
    } else {
       $view = 'apuntes';
       include 'vistas/apuntes.php';  
    }
}else {
    if (isset($_POST['conexion'])){
        $usuario = Usuario::validar($_POST['usuario'], $_POST['clave']);
        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            $view = 'apuntes';
            include 'vistas/apuntes.php';  
        } else {
            $errormsg = "Usuario o contraseña no validos";
            $view = 'conexion';
            include 'vistas/conexion.php';  
        }
    } else if (isset ($_POST['registro'])) {
        $view = 'registro';
        include 'vistas/registro.php';
    } else if (isset ($_POST['registrar'])) {
        $valido = Usuario::persist($_POST['usuario'], $_POST['clave']);
        if ($valido){
            $okmsg = "Usuario registrado correctamente";
            $view = 'conexion';
            include 'vistas/conexion.php';
        }else {
            $errormsg = "Registro Usuario no valido";
            $view = 'registro';
            include 'vistas/registro.php';
        }
    } else {
      $view = 'conexion';
      include 'vistas/conexion.php';  
    }
}

?>