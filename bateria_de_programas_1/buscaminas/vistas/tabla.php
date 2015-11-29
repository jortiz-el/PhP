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
            <h1>Buscaminas</h1>
        <form action="procesaJugada.php" method="post">
            <table class='tabla'>
            <?php
                for ($i = 0; $i <10; $i++){
                    echo "<tr>";
                    for ($j = 0; $j <10; $j++){
                    echo "<td><input type='text' name='minas[$i][$j]'  maxlength='1'></td>";
                    }
                    echo "</tr>";
                }
            ?>
            </table>
            <input type="submit" class="submit" name="submit" value="enviar"/>    
        </form> 
        </div>    
    </body>
</html>  