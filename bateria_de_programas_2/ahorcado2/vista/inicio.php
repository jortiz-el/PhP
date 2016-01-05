<?php
    if ($view !== 'login') {
        header('Location: /');
    } else {
        $view = '';
    }   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Juego del Ahorcado</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
    <h1>Juego del Ahorcado</h1> 
    <?php
        if (isset($_SESSION['error'])) {
            echo "<h1 class='rojo'>error autenticacion</h1>";
        }
    ?>
    <h2>Autenticacion cliente</h2>
    <div>
        <form action="/" method="post">
            <label>Usuario:</label>
            <input type="text" name="usuario" required="required" size="26" /><br><br>
            <label>Contraseña:</label>
            <input type="password" name="contrasenia" required="required" size="26" /><br><br>     
            <input type="submit" class="submit" name="conectar" value="Conectar" />

        </form>
    </div>
</body>
</html>    

