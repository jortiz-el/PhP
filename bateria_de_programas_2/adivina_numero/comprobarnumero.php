<?php

    session_start();
    
    //si intentas entrar directamente sin el formulario, direcciona al index
    if (!isset($_POST['submit'])){
        header('location: index.php');
    }
    
    //contar numero de veces que intenta adivinar numero
    if (isset($_SESSION['intentos'])){
        $_SESSION['intentos']++;
    } else {
        $_SESSION['intentos'] = 1;
    }   
    
    
    if (isset($_POST['submit'])){
        
        $numero = $_POST['numero'];
        
        if ($numero > $_SESSION['numeroSecreto']){
            include ('vistas/menor.php');
        }else if ($numero < $_SESSION['numeroSecreto']){
            include ('vistas/mayor.php');
        }else {
            include ('vistas/acierto.php');
        }
        
        
    } 
?>
        