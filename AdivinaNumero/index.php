<!DOCTYPE html>
<!--
Adivina un numero aleatorio entre los numeros que ingresa un usuario
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adivina un numero</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <h1>Introduce 3 numeros </h1>
        <p>Dos de ellos serán los límites inferior y superior de un rango,
            el tercero será un número situado dentro de dicho rango.</p>
        <div class="capaform">
        <form action="adivinar.php" method="post">
            <label for="inferior">Introduce limite inferior :</label>
            <input id="numero1" class="cajas" type="text" name="numero1" required="required" size="5"><br>
            <label for="superior">Introduce limite superior :</label>    
            <input id="numero2" class="cajas" type="text" name="numero2" required="required" size="5"><br>
            <label for="numero">Introduce número entre los 2 limites :</label>    
            <input id="numero3" class="cajas" type="text" name="numero3" required="required" size="5"><br><br>
            <input id="adivina" class="submit" type="submit" name="adivina" value="Adivinar">
        </form> 
        </div>    
    </body>
</html>
