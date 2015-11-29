<?php
    if ($view !== 'update') {
       header('Location: /');
    } else {
        $view = '';
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
<?php
    if (isset ($updateerrmsg)) {
        echo "<h1 class='rojo'>$updateerrmsg</h1>";
    }
?>
<h1>Update cliente</h1>
<div class="registro">
    <form action="/" method="post">
        <label>email:</label>
        <input type="email" name="email" required="required" size="26" value="<?php echo $usuario->getEmail();?>" /><br><br> 
        <label>Usuario:</label>
        <input type="text" name="usuario" required="required" size="26" value="<?php echo $usuario->getUsuario();?>" readonly /><br><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required="required" size="26"  /><br><br>
                <label>Pintores:</label>
                <select name="pintor">
                    <option value="dali">Dalí</option>
                    <option value="frida">Frida</option> 
                    <option value="miro">Miró</option> 
                    <option value="renoir">Renoir</option> 
                </select><br><br>
        <input type="submit" class="submit" name="update" value="Update" /> 
         
    </form>
    <form action="/" method="post">
        <input type="submit" class="submit" name="submit6" value="Volver" />
    </form>
</div>
</body>
</html>   