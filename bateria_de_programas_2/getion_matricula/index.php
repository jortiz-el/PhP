<?php

require_once 'clases/BD.php';
require_once 'clases/Usuario.php';
require_once 'clases/Alumno.php';
session_start();

if (isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    if (isset($_POST['salir'])) {
        session_unset();
        session_destroy();
        $view = "conexion";
        include 'vistas/conexion.php';
    }else if (isset($_POST['ingresar'])) {
        $view = "ingresar";
        include 'vistas/ingresar.php'; 
    }else if (isset($_POST['guardar'])) {
        $nuevo_alumno = new Alumno($_POST['grupo'], $_POST['nombre'],
                $_POST['apellido1'], $_POST['apellido2'], $_POST['edad'], $_POST['sexo']) ;
        $usuario->addAlumno($nuevo_alumno, $_POST['grupo']);
        $_SESSION['usuario'] = $usuario;
        $view = "lista";
        include 'vistas/lista.php'; 
    }else if (isset($_POST['modificar'])) {
        if (isset($_POST['id_alumno'])) {
          $alumno = $_POST['id_alumno'];
          $grupo = key($alumno);
          $_SESSION['id_alumno'] = $alumno[$grupo];
          $view = "modificar";
          include 'vistas/modificar.php';  
        }else {
           $view = "lista";
           include 'vistas/lista.php';  
        }
    } else if (isset ($_POST['modalumno'])) {
        $usuario->modifyAlumno($_SESSION['id_alumno'],$_POST['nombre'],
                $_POST['apellido1'],$_POST['apellido2'],$_POST['edad'],$_POST['sexo']);
        $view = "lista";
        include 'vistas/lista.php';  
    } else if (isset($_POST['borrar'])) {
        if (isset($_POST['id_alumno'])) {
          $alumno = $_POST['id_alumno'];
          $grupo = key($alumno);
          $id_alum = $alumno[$grupo];
          $usuario->deleteAlumno($id_alum,$grupo);
          $view = "lista";
          include 'vistas/lista.php';  
        }else {
           $view = "lista";
           include 'vistas/lista.php';  
        }
    }else if (isset($_POST['xml'])) {
        if (isset($_POST['id_alumno'])) {
          $alumno = $_POST['id_alumno'];
          $grupo = key($alumno);
          $view = "descarga";
          include 'vistas/descarga.php';  
        }else {
           $view = "lista";
           include 'vistas/lista.php';  
        }
    }else {
        $view = "lista";
        include 'vistas/lista.php'; 
    }
    
}else if (isset($_POST['conexion'])) {
        
  $usuario = Usuario::validar($_POST['usuario'], $_POST['clave']); 
  if ($usuario) {
    $_SESSION['usuario'] = $usuario;
    $view = "lista";
    include 'vistas/lista.php'; 
  }else {
    $errormsg = "Usuario o contraseña invalida";
    $view = "conexion";
    include 'vistas/conexion.php'; 
  }
    
}else {
    $view = "conexion";
    include 'vistas/conexion.php';
}
