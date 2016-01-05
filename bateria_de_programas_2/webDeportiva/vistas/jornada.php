<?php
    if ($view !== 'jornada') {
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
        <h1>Web Deportiva -Jornada-</h1>
        <div class='partidos'>
            <form action="/" method="post">
                <input type="submit" name="desconectar" value="Desconectar" />
            </form> 
           
            <form action="/" method="post">
    <?php
        echo "<div class='partidos'>";
    if (!$liga->getJornadas()->isEmpty()){
        $actual = $liga->getJornadas()->iterate();
        
        while ($actual) {
            $partido_actual = $actual->getPartidos()->iterate();
            while ($partido_actual){
                if ($numeroJornada == $partido_actual->getId_jornada()){
                   $partido = $partido_actual->getId();
                   echo "<div>"; 
                   echo "<label>{$partido_actual->getEquipo_L()}</label>";
                   echo "<input type='text' name='resultado[$numeroJornada][$partido][golL]' value='{$partido_actual->getGol_L()}' />";
                   echo "<input type='text' name='resultado[$numeroJornada][$partido][golV]' value='{$partido_actual->getGol_V()}' />"; 
                   echo "<label>{$partido_actual->getEquipo_V()}</label>";
                   echo "</div>";
                }
                $partido_actual = $actual->getPartidos()->iterate();
            }
            $actual = $liga->getJornadas()->iterate();
        }
        echo "</div>";
        echo "<input type='submit' name='enviar' value='Enviar' />";
        echo "<input type='submit' name='desconectars' value='Volver' />";
        
    }
    ?>
            </form> 
        </div>
    </div>

</body>
</html>

