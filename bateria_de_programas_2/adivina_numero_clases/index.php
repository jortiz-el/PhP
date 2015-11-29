<?php
    include 'clases/partida.php';
    session_start();
    if (isset($_POST['destruye'])){
        session_unset();
    }
    //al inciar index se borra la sesion intentos 
    if (!isset($_SESSION['intentos'])){
       $_SESSION['intentos'] =  new Partida();
    }
    
    
    

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adivina numero con varios intentos</title>
        <link rel="stylesheet" href="css/newCascadeStyleSheet.css"/>
    </head>
    <body>
        <div>
            <h1>Adivina el numero secreto</h1>
            <form action="comprobarnumero.php" method="post">
                <label rel="numero">Introduce un número:</label>
                <input type="number" name="numero" min="1" max="10"/>
                <input type="submit" name="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>
