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
   <title>Autenticacion cliente.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
    <?php
        if (isset($_SESSION['error'])) {
            echo "<h1 class='rojo'>error autenticacion</h1>";
        }else if (isset ($eliminadomsg)) {
            echo "<h1 class='rojo'>$eliminadomsg</h1>";
        }
    ?>
<h1>Autenticacion cliente</h1>
<div>
    <form action="/" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required="required" size="26" /><br><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required="required" size="26" /><br><br>     
        <input type="submit" class="submit" name="conectar" value="Conectar" />
         
    </form>
    <form action="/" method="post">
        <input type="submit" class="submit" name="registro" value="Registro" />
    </form>
</div>
</body>
</html>    

