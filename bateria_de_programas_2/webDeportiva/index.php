
<?php

require_once 'clases/Usuario.php';
require_once 'clases/Liga.php';

session_start();

    if (isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        if (isset($_POST['desconectar'])){
            session_unset();
            session_destroy();
            $view = "conexion";
            include 'vistas/conexion.php';  
        } else if (isset ($_POST['generar'])) {
            $liga = new Liga($usuario->getNombre());
            $equipos = $liga->checkEquipos($_POST['equipos']);
            if ($equipos) {
                $calendario = $liga->roundRobin($equipos);
                $liga->persit();
                $liga->generaLiga($calendario);
                $liga = Liga::getLiga($usuario->getId());
                $usuario->persist();
            } else {
                $errmsg = "Equipos infucientes";
            }
            $view = "calendario";
            include 'vistas/calendario.php';
        } else if (isset($_POST['modificar'])) {
            $liga = Liga::getLiga($usuario->getId());
            $numeroJornada = $_POST['jornada'];
            $view = "jornada";
            include 'vistas/jornada.php';
        } else if (isset($_POST['enviar'])) {
            $partidos = $_POST['resultado'];
            $liga = Liga::getLiga($usuario->getId());
            foreach ($partidos as $jornada => $partido) {
                $jornada = $liga->getJornadas()->getByProperty("id", $jornada);
                foreach ($partido as $id_partido => $goles) {
                    $partido_actual = $jornada->getPartidos()->getByProperty("id", $id_partido);
                    $partido_actual->setGol_L($goles['golL']);
                    $partido_actual->setGol_V($goles['golV']);
                    $partido_actual->persit();
                }
                $jornada->setEstado(1);
                $jornada->persit();
            }
            $view = "calendario";
            include 'vistas/calendario.php';
        } else if (isset($_POST['borrar'])) {
            $partidos = $_POST['jornada'];
            $liga = Liga::getLiga($usuario->getId());
            $jornada = $liga->getJornadas()->getByProperty("id", $partidos);
            $partido_actual = $jornada->getPartidos()->iterate();
            while ($partido_actual){
                $partido_actual->setGol_L(0);
                $partido_actual->setGol_V(0);
                $partido_actual->persit();
                $partido_actual = $jornada->getPartidos()->iterate();
            }
            $jornada->setEstado(0);
            $jornada->persit();
            
            $view = "calendario";
            include 'vistas/calendario.php';
        } else if (isset ($_POST['clasificacion'])){
            $liga = Liga::getLiga($usuario->getId());
            $view = "clasificacion";
            include 'vistas/clasificacion.php';
        } else {
            if ($usuario->getEstado() == 1) {
                $liga = Liga::getLiga($usuario->getId());
                $view = "calendario";
                include 'vistas/calendario.php';
            } else {
                $view = "generaEquipos";
                include 'vistas/generaEquipos.php';
            }
        }
        
    } else if (isset ($_POST['registro'])) {
        $usuario = Usuario::getUsuario($_POST['nombre'], $_POST['clave']);
        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            if ($usuario->getEstado() == 1) {
                $liga = Liga::getLiga($usuario->getId());
                $view = "calendario";
                include 'vistas/calendario.php';
            }else {
                $view = "generaEquipos";
                include 'vistas/generaEquipos.php';
            }
            
        }else {
            $errmsg = "Usuario Invalido";
            $view = "conexion";
            include 'vistas/conexion.php';
        }
    } else {
        $view = "conexion";
        include 'vistas/conexion.php';
    }
?>
