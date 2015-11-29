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
   <link rel="stylesheet" type="text/css" href="css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Autenticacion cliente</h1>
<div>
    <form action="/" method="post">
        <label>Usuario:</label>
        <input type="text" name="usuario" required="required" size="20" /><br><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required="required" size="20" /><br><br>     
        <input type="submit" class="submit" name="submit" value="Conectar" /> 
    </form>    
</div>
</body>
</html>    

