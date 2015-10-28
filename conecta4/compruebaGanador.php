<?php
    //funccion para elaborar jugada de la maquina
    function juegaMaquina(&$jugadas) {
        $i = rand(1, 48);
        while ($jugadas[$i] !== 'x'){
            $i = rand(1, 48);
        }
        if ($i < 42){
          while (isset($jugadas[$i+7]) && $jugadas[$i+7] === 'x'){
            $i = $i+7;
          }  
        }
       $jugadas[$i] = 5; 
       return $jugadas;
    }

    $jugador = "1111";
    $maquina = "5555";
    $libre = 0;
    if (isset($_POST['submit'])) {
    $jugadas = $_POST['jugadas'];
        //inicializar array 
       for ($i = 0; $i < 49; $i++) {
           if (isset($jugadas[$i])){
              $jugadas[$i] = $jugadas[$i];
           }else {
               $jugadas[$i] = 'x';
           }
       }
       //recorro array comprobando si hay ficha mal colocada del jugador
       for ($i = 0; $i < 49; $i++) {
           if ($jugadas[$i] == 1){
               if (isset($jugadas[$i+7]) && $jugadas[$i+7] === 'x'){
                  $jugadas[$i] = 'x'; 
                  while (isset($jugadas[$i+7]) && $jugadas[$i+7] === 'x'){
                    $i = $i+7; 
                  }
                  $jugadas[$i] = 1; 
                }
           }
       }

       //array filas para recorrer filas y columnas
       function actualizaArray($array){
        for ($i = 0; $i < 7; $i++) {
            for ($j = 0; $j < 7; $j++) {
                $pos = $i * 7 + $j;
                $filas[$i][$j]= $array[$pos];
            }
        } 
        return $filas;
       }
       
       //comprobar si hay ganador
       function buscar4EnLinea($array, $jug) {
            $num = 0;
            $i = 0;
            //buscar 4 en linea en todas las filas
            foreach ($array as $array2){
                $filas =  implode('', $array2);
                if(substr($filas, 0, 4) === $jug ||
                        substr($filas, 1, 4) === $jug ||
                        substr($filas, 2, 4) === $jug ||
                        substr($filas, 3) === $jug) {
                    $num +=1;
                        }
            //buscar 4 en linea en todas las columnas            
            $columnas = array_column($array, $i); 
               $columna =  implode('', $columnas);
                if(substr($columna, 0, 4) === $jug ||
                        substr($columna, 1, 4) === $jug ||
                        substr($columna, 2, 4) === $jug ||
                        substr($columna, 3) === $jug) {
                    $num +=1;
                        } 
            $i++;        
            } 
           return ($num > 0)?true:false; 
        }
//        function buscar4EnDiagonal($array, $jug) {
//           $num = 0;
//           for ($i = 0; $i >= 49; $i++){
//               $diagonal = []; 
//                   while (isset($array[$i])){
//                       $diagonal[$i]= $array[$i];
//                       $i += 8;        
//                   }
//                   $dig = implode("", $diagonal);
//                   if(substr($dig, 0, 4) === $jug ||
//                        substr($dig, 1, 4) === $jug ||
//                        substr($dig, 2, 4) === $jug ||
//                        substr($dig, 3) === $jug) {
//                    $num +=1;
//                        }
//               
//           } 
//            return ($num > 0)?true:false; 
//        }





        $filas = actualizaArray($jugadas);
        //vistas de distintas salidas
        if (buscar4EnLinea($filas, $jugador)) {
            include ('vistas/ganaJugador.php');
        }else {
            juegaMaquina($jugadas);
            $filas = actualizaArray($jugadas);
            if (buscar4EnLinea($filas, $maquina)) {
            include ('vistas/ganaMaquina.php');
            }else {
                include('vistas/sigueJugando.php');
            }
        }
        

       

    }
?>
