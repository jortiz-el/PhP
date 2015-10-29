<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
        $aciertos = numeroAciertos($boleto, $premiados);
        //bloque de informacion final de resultado
        echo "<h1>Numeros agraciados: $agraciados </h1><br>";
        
        if (count($boleto) === 0) {
           echo "<h3>Ingresa algunas apuestas a ver si tienes suerte </h3><br>"; 
        }

        foreach ($boleto as $key => $valores){
               echo "<h2>Boleto nº".($key+1)."</h2>";
           if (count($valores) <= 6){
               echo "<h3>Numeros introducidos por el jugador</h3>";
               $introducidos = implode("-", $valores);
               echo "numeros: ".$introducidos."<br>";
               echo "aciertos: ".$aciertos[$key];
            } else {
                echo "Apuesta invalida - numero apuestas introducidas son demasiadas";
            }
        }
 ?>
    </body>    
</html>