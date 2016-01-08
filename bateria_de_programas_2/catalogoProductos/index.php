<?php

require_once 'clases/usuario.php';
require_once 'clases/categorias.php';
require_once 'clases/productos.php';
session_start();

if (isset($_SESSION['usuario'])) {

    if (isset($_POST['desconectar'])) {
        session_unset();
        session_destroy();
        $view = 'conexion';
        include ('vistas/conexion.php');
    } else if (isset ($_POST['productos'])) {
        $categoria =  new Categorias($_POST['categ']);
        $categoria->getCategoria();
        $_SESSION['categoria'] = $categoria;
        $view = 'productos';
        include ('vistas/productos.php');
    } else if (isset ($_POST['insertar'])) {
        $categoria = $_SESSION['categoria'];
        $producto = new Productos($categoria->getNombre(), $_POST['nombre'], $_POST['precio']);
        $valido = $producto->persist();
        if ($valido) {
            $categoria->getCategoria();
            $_SESSION['categoria'] = $categoria;
        } else {
            $errormsg = "Nombre producto no valido";
        }
        $view = 'productos';
        include ('vistas/productos.php');
        
    }else if (isset ($_POST['modificar'])) {
        $categoria = $_SESSION['categoria'];
        $producto = new Productos($categoria->getNombre(), $_POST['nombre'], $_POST['precio']);
        $valido = $producto->update($_POST['prod']);
        if ($valido) {
            $categoria->getCategoria();
            $_SESSION['categoria'] = $categoria;
        } else {
            $errormsg = "Nombre producto no valido";
        }
        $view = 'productos';
        include ('vistas/productos.php');
        
    } else if (isset ($_POST['borrar'])) {
        $categoria = $_SESSION['categoria'];
        $producto = new Productos($categoria->getNombre(), $_POST['nombre'], $_POST['precio']);
        $producto->setNombre($_POST['prod']);
        $valido = $producto->delete();
        if ($valido) {
            $categoria->getCategoria();
            $_SESSION['categoria'] = $categoria;
        } else {
            $errormsg = "Nombre producto no valido";
        }
        $view = 'productos';
        include ('vistas/productos.php');
        
    } else {
        $view = 'categorias';
        include ('vistas/categorias.php');
    }
    
    
} else if (isset($_POST['conexion'])) {
        $usuario = Usuario::validar($_POST['usuario'], $_POST['clave']);
        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            $view = 'categorias';
            include ('vistas/categorias.php');
        } else {
            $errormsg = "Usuario o contraseña no validos";
            $view = 'conexion';
            include ('vistas/conexion.php');
        }
} else {
    $view = 'conexion';
    include ('vistas/conexion.php');
}


?>
