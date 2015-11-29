<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="centrar">
            <h1>Realiza tu apuesta</h1>    
            <?php
            echo $ascii;
            ?>
            <form action='procesaDatos.php' method='post'>
            <?php
            //generar 4 tablas para las apuestas
            for ($i = 0; $i < 4; $i++) {
                echo "<br>apuesta - $i ";
                echo "<table border=1>";
                        for ($j = 0; $j < 5; $j++){
                            echo "<tr>";
                            for ($k = 0; $k < 10; $k++){
                                $pos = $k + ($j*10);
                                $pos += 1;
                                if ($pos !== 50){
                                   echo "<td><input type='text' name='boleto[$i][$pos]'>"
                                           . "<input type='hidden' name='agraciados' value='$agraciados'> $pos</td>"; 
                                }
                            }
                            echo "</tr>";
                        }
                echo "</table>";
            }
            ?>
            <br>    
            <input type='submit' name='submit' value='enviar apuesta'/>
            </form>
        </div>
    </body>
</html>

