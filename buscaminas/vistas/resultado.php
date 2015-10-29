<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/CascadeStyleSheet.css" media="screen" /> 
    </head>
    <body>
        <div class="centrar">
            <h1>Resultados</h1>
            <table class='tabla'>

<?php
            //variable para contar aciertos
            $contar = 0;
            //tabla final 
            for ($i = 0; $i <10; $i++){
                echo "<tr>";
                for ($j = 0; $j <10; $j++){
                    if ($minas[$i][$j] === '*' && $tabla[$i][$j] !== ''){
                       echo "<td>X</td>";
                       $contar++;
                    }else if ($minas[$i][$j] !== '*' && $tabla[$i][$j] !== ''){
                       echo "<td>0</td>"; 
                    }else if ($minas[$i][$j] === '*' && $tabla[$i][$j] === '') {
                      echo "<td>*</td>";  
                    }else {
                      echo "<td></td>";   
                    }
                }
                echo "</tr>";
            }
            
            
            
?>
            </table>
            <?php echo "<br><h3>Numero de aciertos : $contar</h3>"; ?>
        </div>    
    </body>
</html>  