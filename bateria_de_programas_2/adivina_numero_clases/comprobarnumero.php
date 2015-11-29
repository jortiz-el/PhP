<?php
    include ('clases/partida.php');
    session_start();
    
    //si intentas entrar directamente sin el formulario, direcciona al index
    if (!isset($_POST['submit'])){
        header('location: index.php');
    }
    
    if (isset($_POST['submit'])){
        //contar numero de veces que intenta adivinar numero
        $_SESSION['intentos']->suma_intentos(); 
        $numero = $_POST['numero'];
        
        if ($numero > $_SESSION['intentos']->get_numero_secreto()){
            include ('vistas/menor.php');
        }else if ($numero < $_SESSION['intentos']->get_numero_secreto()){
            include ('vistas/mayor.php');
        }else {
            include ('vistas/acierto.php');
        }
        
       
    } 
?>
        