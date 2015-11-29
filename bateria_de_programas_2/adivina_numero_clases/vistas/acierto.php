
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adivina numero con varios intentos</title>
        <link rel="stylesheet" href="css/newCascadeStyleSheet.css"/>
    </head>
    <body>
        <div>
            <h1>Enhorabuena!! has acertado el número</h1>
            
                <?php 
                
                if ($_SESSION['intentos']->get_intentos() === 1){
                  echo "Lo conseguiste en ".$_SESSION['intentos']->get_intentos()." intento";  
                } else {
                  echo "Lo conseguiste en ".$_SESSION['intentos']->get_intentos()." intentos"; 
                }
                        
                ?>
            <h3>jugar otra vez?</h3>
            <form action="index.php" method="post">
                <input type="submit" name="destruye" value="Enviar">
            </form>
        </div>
    </body>
</html>