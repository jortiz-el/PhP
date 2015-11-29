
        <?php
        //inicializar el array del sudoku
        $tabla[0] = [9,7,6,2,4,3,8,5,1];
        $tabla[1] = [3,2,8,1,6,5,7,4,9];
        $tabla[2] = [5,1,4,8,7,9,3,6,2];
        $tabla[3] = [6,4,2,7,3,8,1,9,5];
        $tabla[4] = [7,5,9,6,1,2,4,3,8];
        $tabla[5] = [1,8,3,9,5,4,6,2,7];
        $tabla[6] = [8,6,5,4,9,1,2,7,3];
        $tabla[7] = [4,9,1,3,2,7,5,8,6];
        $tabla[8] = [2,3,7,5,8,6,9,1,4];
        
        //guardo tabla inicial  para mandarla por post
        function array_envia($array){
            $tmp = serialize($array);
            $tmp = urlencode($tmp);
            
            return $tmp;
        }
        $tablaInicial = array_envia($tabla);
        
        //bucle para eliminar casillas aleatoriamente por cuadrante de 3
        for ($i = 0; $i < 3; $i++){
            for ($j = 0; $j < 3; $j++){
                $random = rand(3,6);
                //do while entre 3 y 6 veces deja casilla blanca
                do{
                    $fila = rand(0,2);
                    $col = rand(0,2);
                    $fila = $fila + (3*$i);
                    $col = $col + (3*$j);
                    if($tabla[$fila][$col] === "") {
                        $random++;
                    } else {
                        $tabla[$fila][$col] = "";
                    } 
                  $random--;  
                }while($random !== 0);
            }
        }

        
        //generamos la primera vista de la tabla
        include ('vistas/tabla.php');

        ?>
