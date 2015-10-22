<?php
//comprobar si quedan casillas libres
$libre = 0;
for ($i = 0; $i < 9; $i++) {
 $libre += ($jugadas[$i] == '')?1:0;
}
if ($libre !== 0){
    
        //comprobar si gana jugador
if (($jugadas[0] == 1 && $jugadas[1] == 1 && $jugadas[2] == 1) ||
    ($jugadas[3] == 1 && $jugadas[4] == 1 && $jugadas[5] == 1) ||
    ($jugadas[6] == 1 && $jugadas[7] == 1 && $jugadas[8] == 1) ||
    ($jugadas[0] == 1 && $jugadas[3] == 1 && $jugadas[6] == 1) ||
    ($jugadas[1] == 1 && $jugadas[4] == 1 && $jugadas[7] == 1) ||
    ($jugadas[2] == 1 && $jugadas[5] == 1 && $jugadas[8] == 1) ||
    ($jugadas[0] == 1 && $jugadas[4] == 1 && $jugadas[8] == 1) ||
    ($jugadas[2] == 1 && $jugadas[4] == 1 && $jugadas[6] == 1)){
    //header('Location: ganadorJugador.php');
    $estado = 1;
    
    } else {
        include('maquinaIA.php');
    } 
//comprobar si gana maquina    
if (($jugadas[0] == 3 && $jugadas[1] == 3 && $jugadas[2] == 3) ||
    ($jugadas[3] == 3 && $jugadas[4] == 3 && $jugadas[5] == 3) ||
    ($jugadas[6] == 3 && $jugadas[7] == 3 && $jugadas[8] == 3) ||
    ($jugadas[0] == 3 && $jugadas[3] == 3 && $jugadas[6] == 3) ||
    ($jugadas[1] == 3 && $jugadas[4] == 3 && $jugadas[7] == 3) ||
    ($jugadas[2] == 3 && $jugadas[5] == 3 && $jugadas[8] == 3) ||
    ($jugadas[0] == 3 && $jugadas[4] == 3 && $jugadas[8] == 3) ||
    ($jugadas[2] == 3 && $jugadas[4] == 3 && $jugadas[6] == 3)){
    $estado = 2;
    }  
} else {
    $estado = 3;
}



    
    
    
?>
