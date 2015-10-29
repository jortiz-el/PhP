<?php

if (isset($_POST['submit'])){
    
    $tabla = $_POST['minas'];
    $minas = [];
    
            //inicializar tablero
            for ($i = 0; $i <10; $i++){
                for ($j = 0; $j <10; $j++){
                    $minas[$i][$j] = '';
                }
            }
            //colocar 10 minas aleatorias
            $num = 0;
            do{
                $i = rand(0, 9);
                $j = rand(0, 9);

                if ((isset($minas[$i-1][$j-1]) && $minas[$i-1][$j-1] === '*') || (isset($minas[$i-1][$j]) && $minas[$i-1][$j] === '*') ||
                        (isset($minas[$i-1][$j+1]) && $minas[$i-1][$j+1] === '*') || (isset($minas[$i][$j-1]) && $minas[$i][$j-1] === '*') ||
                        (isset($minas[$i][$j+1]) && $minas[$i][$j+1] === '*') || (isset($minas[$i+1][$j-1]) && $minas[$i+1][$j-1] === '*') ||
                        (isset($minas[$i+1][$j]) && $minas[$i+1][$j] === '*') || (isset($minas[$i+1][$j+1]) && $minas[$i+1][$j+1] === '*') ||
                        (isset($minas[$i][$j]) && $minas[$i][$j] === '*')) {
               
                    $num --;
                } else {
                    $minas[$i][$j] = '*'; 
                }
                
                $num ++;
            } while($num !== 10);
            
            //contar que haya 10 casillas marcadas
            $marcadas = 0;
            foreach ($tabla as $filas){
                foreach ($filas as $valor){
                    if ($valor !== ''){
                        $marcadas++;
                    }
                }
            }
            
            if ($marcadas <= 10){
               include ('vistas/resultado.php'); 
            } else {
                header('location: index.php');
            }
            
            
            
            
}           
            
                
            
            
