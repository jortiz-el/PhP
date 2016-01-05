<?php
    if ($view !== 'conexion') {
        header('Location: /');
    } else {
        $view = '';
    }   
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Web Deportiva</title>
        <link rel="stylesheet" type="text/css" href="../css/newCascadeStyleSheet.css" media="screen" /> 
    </head>
    <body>
        <div class="centrado">
            <?php
                if (isset($errmsg)){
                    echo "<h1 class='rojo'>$errmsg</h1>";
                }
            ?>
            <h1>Web Deportiva -Registro-</h1>
            <div>
                <form action="/" method="post">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" size="35" />
                    <label>clave:</label>
                    <input type="password" name="clave" size="35" /><br><br>
                    <input type="submit" name="registro" value="Registrar">
                </form> 
            </div>
        </div>
    </body>
</html>
        
