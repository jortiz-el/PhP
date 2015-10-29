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
            //funcion para comprobar si hay minas
            function hayMinas($array,$f,$c){
                $bool = 0;
                
                for ($i = $f-1; $i <= $f+1; $i++){
                    for ($j = $c-1; $j <= $c+1; $j++) {
                        if (isset($array[$i][$j]) && $array[$i][$j] === '*' ){
                            $bool = 1;
                        }
                    }
                }
                return $bool;
            }
            //colocar 10 minas aleatorias
            $num = 0;
            do{
                $i = rand(0, 9);
                $j = rand(0, 9);

                if (hayMinas($minas, $i, $j)) {
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
            
                
            
            
