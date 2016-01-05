<?php
     if ($view !== 'registro') {
        header('Location: /');
    } else {
        $view = '';
    }   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Registro Jugadores Ahorcado.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
    <?php
    if (isset ($registroerrmsg)) {
        echo "<h1 class='rojo'>$registroerrmsg</h1>";
    }
    ?>
<h1>Registro Jugadores Ahorcado</h1>
<div class="registro">
    <form action="/" method="post">
        <label>cod (1-admin / 0-user):</label>
        <input type="number" name="cod" required="required" size="2" min="0" max="1" /><br><br> 
        <label>Usuario:</label>
        <input type="text" name="usuario" required="required" size="26" /><br><br>
        <label>Clave:</label>
        <input type="password" name="clave" required="required" size="26" /><br><br>
        <input type="submit" class="submit" name="registroform" value="Registrar" /> 
    </form>
    <form action="/" method="post">
        <input type="submit" class="submit" name="volver" value="Volver" />
    </form>
</div>
</body>
</html>   