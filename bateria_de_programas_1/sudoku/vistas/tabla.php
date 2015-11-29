<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../css/newCascadeStyleSheet.css">
    </head>
    <body>
        <div class="centrar">
            <h1>Sudoku</h1>
            <form action="recogeDatos.php" method="post">
            <table border=1>
            <?php

            foreach ($tabla as $ind => $fila){
                echo "<tr>";
                foreach ($fila as $indice => $valor){
                    if ($valor === ''){
                       echo "<td><input type='text' name='casilla[$ind][$indice]' value='$valor' maxlenght=1/></td>";
                    }else {
                       echo "<td>$valor</td>"; 
                    }
                }
                echo "</tr>";
            }
            ?>    
            </table>
                <br>
                <input type="hidden" name="tabla" value="<?php echo $tablaInicial?>" />
                <input type="submit" name="submit" value="enviar">
            </form>    
        </div>    
    </body>
</html> 

