<?php
    if ($view !== 'calendario') {
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
    <?php
        if (isset($errmsg)) {
            echo "<h1 class='rojo'>$errmsg</h1>";
        }
    ?>
        <h1>Web Deportiva -Calendario-</h1>
        <div>
            <form action="/" method="post">
                <input type="submit" name="desconectar" value="Desconectar" />
            </form> 
           
            <form action="/" method="post">
    <?php
        echo "<div class='jornadas'>";
    if (!$liga->getJornadas()->isEmpty()){
        $actual = $liga->getJornadas()->iterate();
        while ($actual) {
            $numeroJornada = $actual->getId();
            $fecha = $actual->getFecha();
            echo "<input type='radio' name='jornada' value='$numeroJornada' checked/>";
            if ($actual->getEstado() == 1){
                echo "<label class = 'verde'>Jornada $numeroJornada - $fecha </label>";
            } else {
                echo "<label>Jornada $numeroJornada - $fecha </label>";
            }
            $actual = $liga->getJornadas()->iterate();
        }
        echo "</div>";
        echo "<input type='submit' name='clasificacion' value='Clasificacion' />";
        echo "<input type='submit' name='modificar' value='Modificar' />";
        echo "<input type='submit' name='borrar' value='Borrar' />";
        //var_dump($calendario);
    }
    ?>
            </form> 
        </div>
    </div>

</body>
</html>

