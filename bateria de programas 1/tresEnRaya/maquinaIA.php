<?php

//juega la maquina elige una casilla libre aleatoria
        //$i = rand(0, 8);
        $i = 4;
        if ($jugadas[$i] !== ''){
            $i = 0;
        }
        
        //jugada ganadora maquina
        if (($jugadas[0]+$jugadas[1]) == 6 || ($jugadas[8]+$jugadas[5]) == 6 || ($jugadas[6]+$jugadas[4]) == 6){
            $i = 2;
        }else if (($jugadas[0]+$jugadas[2]) == 6 || ($jugadas[7]+$jugadas[4]) == 6) {
            $i = 1;
        }else if (($jugadas[1]+$jugadas[2]) == 6 || ($jugadas[3]+$jugadas[6]) == 6 || ($jugadas[8]+$jugadas[4]) == 6) {
            $i = 0;
        }else if (($jugadas[3]+$jugadas[4]) == 6 || ($jugadas[2]+$jugadas[8]) == 6) {
            $i = 5;
        }else if (($jugadas[3]+$jugadas[5]) == 6 || ($jugadas[1]+$jugadas[7]) == 6 || ($jugadas[0]+$jugadas[8]) == 6 || ($jugadas[2]+$jugadas[6]) == 6) {
            $i = 4;
        }else if (($jugadas[5]+$jugadas[4]) == 6 || ($jugadas[0]+$jugadas[6]) == 6) {
            $i = 3;
        }else if (($jugadas[6]+$jugadas[7]) == 6 || ($jugadas[2]+$jugadas[5]) == 6 || ($jugadas[0]+$jugadas[4]) == 6) {
            $i = 8;
        }else if (($jugadas[6]+$jugadas[8]) == 6 || ($jugadas[1]+$jugadas[4]) == 6) {
            $i = 7;
        }else if (($jugadas[8]+$jugadas[7]) == 6 || ($jugadas[0]+$jugadas[3]) == 6 || ($jugadas[2]+$jugadas[4]) == 6) {
            $i = 6;
        }else {
            
           //bloquear al jugador
        if (($jugadas[0]+$jugadas[1]) == 2 || ($jugadas[8]+$jugadas[5]) == 2 || ($jugadas[6]+$jugadas[4]) == 2){
            $i = 2;
        }else if (($jugadas[0]+$jugadas[2]) == 2 || ($jugadas[7]+$jugadas[4]) == 2) {
            $i = 1;
        }else if (($jugadas[1]+$jugadas[2]) == 2 || ($jugadas[3]+$jugadas[6]) == 2 || ($jugadas[8]+$jugadas[4]) == 2) {
            $i = 0;
        }else if (($jugadas[3]+$jugadas[4]) == 2 || ($jugadas[2]+$jugadas[8]) == 2) {
            $i = 5;
        }else if (($jugadas[3]+$jugadas[5]) == 2 || ($jugadas[1]+$jugadas[7]) == 2 || ($jugadas[0]+$jugadas[8]) == 2 || ($jugadas[2]+$jugadas[6]) == 2) {
            $i = 4;
        }else if (($jugadas[5]+$jugadas[4]) == 2 || ($jugadas[0]+$jugadas[6]) == 2) {
            $i = 3;
        }else if (($jugadas[6]+$jugadas[7]) == 2 || ($jugadas[2]+$jugadas[5]) == 2 || ($jugadas[0]+$jugadas[4]) == 2) {
            $i = 8;
        }else if (($jugadas[6]+$jugadas[8]) == 2 || ($jugadas[1]+$jugadas[4]) == 2) {
            $i = 7;
        }else if (($jugadas[8]+$jugadas[7]) == 2 || ($jugadas[0]+$jugadas[3]) == 2 || ($jugadas[2]+$jugadas[4]) == 2) {
            $i = 6;
        } 
            
        }
        
        while ($jugadas[$i] !== ''){
            $i = rand(0, 8);
        }
        $jugadas[$i] = '3';   
        
        
      
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
