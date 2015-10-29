<?php

    if (isset($_POST['submit'])){

        $jugadas = $_POST['boleto'];
        $agraciados = $_POST['agraciados'];
        $premiados = explode("-", $agraciados);
        
        $boleto = [];
        //pasar las input a numeros y guardarlas en boleto
        for ($i = 0 ; $i < 4; $i++){
            for ($j=1 ; $j < 49; $j++){
                if ($jugadas[$i][$j] !== ""){
                    $boleto[$i][$j] = $j;
                }
            }

        }
        
        //funcion para sacar el numero de aciertos por boleto
        function numeroAciertos($array,$comprobar){
            $cuenta = [];
            foreach ($array as $key => $numeros){
            $cuenta[$key] = 0;
            foreach ($numeros as $v){
                if (in_array($v, $comprobar)){
                   $cuenta[$key] += 1 ;
                }
            }
            }
            return $cuenta;
        }

        include ('vista/resultados.php');

    }