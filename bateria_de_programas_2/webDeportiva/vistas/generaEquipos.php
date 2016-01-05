<?php
    if ($view !== 'generaEquipos') {
        header('Location: /');
    } else {
        $view = '';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <title>Web Deportiva</title>
    <link rel="stylesheet" type="text/css" href="../css/newCascadeStyleSheet.css" media="screen" /> 
</head>
<body>
    <div class="centrado">
        <h1>Web Deportiva -Equipos-</h1>
        <div>
            <form action="/" method="post">
                <label>Equipos:</label>
                <input type="text" name="equipos" size="35" />
                <br><br>
                <input type="submit" name="generar" value="Genera liga">
                <input type="submit" name="desconectar" value="volver">
            </form> 
        </div>
    </div>
</body>
</html>





