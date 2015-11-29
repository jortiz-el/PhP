   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adivina numero con varios intentos</title>
        <link rel="stylesheet" href="css/newCascadeStyleSheet.css"/>
    </head>
    <body>
        <div>
            <h1>El numero secreto es menor que tu numero</h1>
            <h3>Sigue intentandolo</h3>
            <form action="comprobarnumero.php" method="post">
                <label rel="numero">Introduce un número:</label>
                <input type="number" name="numero" min="1" max="10"/>
                <input type="submit" name="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>