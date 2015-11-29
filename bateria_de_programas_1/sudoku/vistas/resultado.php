<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../css/newCascadeStyleSheet.css">
    </head>
    <body>
        <div class="centrar">
            <h1>Sudoku</h1>
            <table border=1>

            <?php

                //variables para contabilizar aciertos
                $numeros_escritos = 0;
                $numeros_correctos = 0;
                $numeros_incorrectos = 0;
                //creacion de tabla resultados indicando aciertos en verde e incorrectos en rojo
                foreach ($tabla as $ind => $fila){
                echo "<tr>";
                foreach ($fila as $indice => $valor){
                    if (isset($jugadas[$ind][$indice])){
                        if ($jugadas[$ind][$indice] == $valor){
                            echo "<td class ='verde'>{$jugadas[$ind][$indice]}</td>";
                            $numeros_escritos += 1;
                            $numeros_correctos += 1;
                        }else if ($jugadas[$ind][$indice] !== ""){
                            echo "<td class ='rojo'>{$jugadas[$ind][$indice]}</td>";
                            $numeros_escritos += 1;
                            $numeros_incorrectos += 1;
                        }else {
                            echo "<td class ='rojo'>{$jugadas[$ind][$indice]}</td>"; 
                        }
                        
                    }else {
                       echo "<td>$valor</td>"; 
                    }

                }
                    echo "</tr>";
                }

            
            ?>
            </table>
            </form> 
            <?php
            echo "<h3>Numeros escritos por el jugador :</h3><br>$numeros_escritos<br>";
            echo "<h3>Numeros correctos :</h3><br>$numeros_correctos<br>";
            echo "<h3>Numeros incorrectos :</h3><br>$numeros_incorrectos<br>";
            ?>
        </div>    
    </body>
</html> 
            