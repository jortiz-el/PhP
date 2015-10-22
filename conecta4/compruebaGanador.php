<?php

    

    $i = rand(1, 48);



    while ($jugadas[$i] !== ''){
        $i = rand(1, 48);
    }
    if ($i < 42){
      while (isset($jugadas[$i+7]) && $jugadas[$i+7] === ''){
        $i = $i+7;
      }  
    }
    
   $jugadas[$i] = 5; 



function contarValores($array) {
    $contar = [];
    foreach ($array as $valor){
        if (isset($contar[$valor])){
            $contar[$valor] += 1;
        }else{
            $contar[$valor] = 1;
        }
    }
    if ($contar[$valor] === 4) {
        return $valor;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

