<?php

        //sacar los numeros agraciados 
        $premiados = [];
        for ($i = 0; $i < 6; $i++ ){
            $num = rand(1, 49);
            if (in_array($num, $premiados)){
                $i--; 
            }else{
                $premiados[$i] = $num;
                $num += 65;
                $ascii[$i] = chr($num);  
            }
        }
        //pasar a estrings los codigos ascii y numeros agraciados
        sort($premiados);
        $ascii = implode('', $ascii);
        $agraciados = implode("-", $premiados);

        include ('vista/apuestaInicial.php');
?>