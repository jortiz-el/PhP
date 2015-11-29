<?php
    if (!isset($_SESSION['vista'])) {
       header("location: /");
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Autenticacion cliente.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="../css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
    <div class="conectado">  
        <?php
        echo "<p>Hola ".$_SESSION['usuario']."</p>";
        if ($_SESSION['pintor'] == 1) {
            echo '<h1>SALVADOR DALI</h1>';
            echo '<h2>The Temptation of St. Anthony, 1946</h2>';
        }else if ($_SESSION['pintor'] == 2) {
            echo '<h1>FRIDA KHALO</h1>';
            echo '<h2>Autoretrato con Bonito, 1941</h2>';
        } else if ($_SESSION['pintor'] == 3) {
            echo '<h1>JOAN MIRÓ</h1>';
            echo '<h2>Escalera de Escape, 1921</h2>';
        } else if ($_SESSION['pintor'] == 4) {
            echo '<h1>CLAUDE MONET</h1>';
            echo '<h2>Impresión Sol Naciente, 1872</h2>';
        } else if ($_SESSION['pintor'] == 5) {
            echo '<h1>PIERRE-AUGUSTE RENOIR</h1>';
            echo '<h2>Almuerzo de Remeros, 1881</h2>';
        } else if ($_SESSION['pintor'] == 6) {
            echo '<h1>VICENT VAN GOGH</h1>';
            echo '<h2>Habitación de Vicent en Arles, 1889</h2>';
        }
        
        ?>
            <form action="/" method="post">
                <input type="submit" class="submit" name="submit2" value="Desconectar" /> 
                <input type="submit" class="submit" name="submit6" value="Modificar" />
                <input type="submit" class="submit" name="submit5" value="Dar Baja" />
            </form> 
        <br><br><hr><hr>
        <?php
        if ($_SESSION['pintor'] == 1) {
            echo '<img src="../img/dali.bmp"></img>';
        } else if ($_SESSION['pintor'] == 2) {
            echo '<img src="../img/frida.bmp"></img>';
        } else if ($_SESSION['pintor'] == 3) {
            echo '<img src="../img/miro.bmp"></img>';
        } else if ($_SESSION['pintor'] == 4) {
            echo '<img src="../img/monet.bmp"></img>';
        } else if ($_SESSION['pintor'] == 5) {
            echo '<img src="../img/renoir.bmp"></img>';
        } else if ($_SESSION['pintor'] == 6) {
            echo '<img src="../img/van_gogh.bmp"></img>';
        }
        
        ?>     
    </div>      
</body>
</html>   