<?php
    if (!isset($_SESSION['vista'])) {
       header("location: /");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Update cliente.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Update cliente</h1>
<div class="registro">
    <form action="/" method="post">
        <label>email:</label>
        <input type="email" name="email" required="required" size="26" value="<?php echo $_SESSION['email'];?>" /><br><br> 
        <label>Usuario:</label>
        <input type="text" name="usuario" required="required" size="26" value="<?php echo $_SESSION['usuario'];?>" readonly /><br><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required="required" size="26"  /><br><br>
                <label>Pintores:</label>
                <select name="pintor">
                    <option value="1">Dalí</option>
                    <option value="2">Frida</option> 
                    <option value="3">Miró</option> 
                    <option value="4">Monet</option> 
                    <option value="5">Renoir</option> 
                    <option value="6">Van Gogh</option> 
                </select><br><br>
        <input type="submit" class="submit" name="submit4" value="Update" /> 
         
    </form>
    <form action="/" method="post">
        <input type="submit" class="submit" name="submit6" value="Volver" />
    </form>
</div>
</body>
</html>   