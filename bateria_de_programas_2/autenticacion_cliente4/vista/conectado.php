<?php
    if ($view !== 'conectado') {
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
   <link rel="stylesheet" type="text/css" href="../css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
    <div class="conectado"> 
        <p>Bienvenido <?php echo $usuario->getUsuario();?></p>
            <form action="/" method="post">
                <input type="submit" class="submit" name="desconectar" value="Desconectar" /> 
                <input type="submit" class="submit" name="modificar" value="Modificar" />
                <input type="submit" class="submit" name="baja" value="Dar Baja" />
            </form> 
        <br><br><hr><hr>
                        <img src="img/<?php echo $usuario->getPintor()->generaAleatorio()->getCuadros();?>.bmp">    
    </div>      
</body>
</html>   