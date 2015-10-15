<?php
//si se apreta el boton submit de adivinar se guardan las variables
if (isset ($_POST['adivina'])){
    
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];   
    $numero3 = $_POST['numero3'];
    //comprueba si los input han recibido numeros 
    if(!(is_numeric($numero1) && is_numeric($numero2) && is_numeric($numero3))
            || ($numero3 > $numero2 || $numero3 < $numero1)){
        header('location: index.php');
    }else{ 
     
    //con la funcion ran($min,$max) sacamos un numero aleatorio entre los 2 numeros 
    $randon = rand($numero1, $numero2);
    //si el numero 3 del usuario son iguales adivina el numero
    if ($numero3 == $randon){
        echo '<h1>Enhorabuena!!! has adivinado el numero secreto</h1>'.'<br>';
        echo 'Numero usuario: '.$numero3.'<br>';
        echo 'Numero secreto: '.$randon.'<br><br>';         
    }else{
        //si no adivina manda un mensaje y compara los numeros
        echo '<h1>Ohh no!!! no has adivinado el numero secreto</h1>'.'<br>';
        echo 'Numero usuario: '.$numero3.'<br>';
       //echo 'Numero secreto: '.$randon.'<br><br>';
        if ($numero3<$randon){
            echo 'tu numero es menor que el numero aleatorio secreto '.'<br><br>';
        }else{
            echo 'tu numero es mayor que el numero aleatorio secreto '.'<br><br>';
        }
        ?>
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="stylesheet.css">
            </head>
            <body>        
                <form action="adivinar.php" method="post">
                    <input type="text" size="3" name="num" />
                   <?php echo "<input type='hidden' size='3' name='numR' value=$randon />" ?>
                    <input id="volver" class="submit2" type="submit" name="volver" value="Vuelve a intentarlo" />
                </form>
            </body>
        </html>
            
    <?php
    }
    }
}else if (isset ($_POST['volver'])){
    $numero = $_POST['num'];
    $oculto = $_POST['numR'];
    if (is_numeric($numero)){
        if ($numero == $oculto){
            echo '<h1>Enhorabuena!!! has adivinado el numero secreto</h1>'.'<br>';
            echo 'Numero usuario: '.$numero.'<br>';
            echo 'Numero secreto: '.$oculto.'<br><br>';
        }else {
            echo '<h1>Ohh no!!! no has adivinado el numero secreto</h1>'.'<br>';
            echo 'Numero usuario: '.$numero.'<br>';
           //echo 'Numero secreto: '.$randon.'<br><br>';
            if ($numero<$oculto){
                echo 'tu numero es menor que el numero aleatorio secreto '.'<br><br>';
            }else{
                echo 'tu numero es mayor que el numero aleatorio secreto '.'<br><br>';
            }
            ?>
            <html>
                <head>
                    <link rel="stylesheet" type="text/css" href="stylesheet.css">
                </head>
                <body>        
                    <form action="adivinar.php" method="post">
                        <input type="text" size="3" name="num" />
                       <?php echo "<input type='hidden' size='3' name='numR' value=$oculto />" ?> 
                        <input id="volver" class="submit2" type="submit" name="volver" value="Vuelve a intentarlo" />
                    </form>
                </body>
            </html>
            
    <?php
            
        }
    }else {
        echo '<h1>No has Jugado Bien GAME OVER</h1>';
    }
}
?>


