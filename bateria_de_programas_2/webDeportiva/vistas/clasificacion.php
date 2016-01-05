<?php
    if ($view !== 'clasificacion') {
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
        <h1>Web Deportiva -Clasificacion-</h1>
        <div class="clasificacion">
            <form action="/" method="post">
                <input type="submit" name="desconectar" value="Desconectar" />
                <input type='submit' name='desconectars' value='Volver' />
            </form> 
    <?php
    $Jornada_actual = $liga->getJornadas()->iterate();
    while ($Jornada_actual) {
        $partido_actual = $Jornada_actual->getPartidos()->iterate();
        while ($partido_actual) {
            if ($Jornada_actual->getEstado() == 1){
                $eql = $partido_actual->getEquipo_L();
                $eqv = $partido_actual->getEquipo_V();
                $golL = $partido_actual->getGol_L();
                $golV= $partido_actual->getGol_V();
                if ($golL > $golV) {
                        $puntosL = 3;
                        $puntosV = 0;
                    } else if ($golL < $golV) {
                        $puntosL = 0;
                        $puntosV = 3;
                    } else {
                        $puntosL = 1;
                        $puntosV = 1;
                    }
                if (isset($clasificacion[$eql])) {
                    $clasificacion[$eql]["puntos"] += $puntosL;
                    $clasificacion[$eql]["golF"] += $golL;
                    $clasificacion[$eql]["golC"] += $golV;
                    $clasificacion[$eql]["golA"] = ($clasificacion[$eql]["golF"] - $clasificacion[$eql]["golC"]);
                    $clasificacion[$eqv]["puntos"] += $puntosV;
                    $clasificacion[$eqv]["golF"] += $golV;
                    $clasificacion[$eqv]["golC"] += $golL;
                    $clasificacion[$eqv]["golA"] = ($clasificacion[$eqv]["golF"] - $clasificacion[$eqv]["golC"]);
                } else {
                    $clasificacion[$eql] = ["puntos" => $puntosL,"golF" => $golL,"golC" => $golV,"golA" => ($golL-$golV)];
                    $clasificacion[$eqv] = ["puntos" => $puntosV,"golF" => $golV,"golC" => $golL,"golA" => ($golL-$golV)];
                }
            }
           $partido_actual = $Jornada_actual->getPartidos()->iterate(); 
        }
        $Jornada_actual = $liga->getJornadas()->iterate();
    }
    foreach ($clasificacion as $valor){
        $ordenapuntos = array_column($clasificacion, "puntos");        
        $ordenagolA = array_column($clasificacion, "golA");
    }
   array_multisort($ordenapuntos,SORT_NUMERIC,SORT_DESC,$ordenagolA,SORT_DESC,$clasificacion);
    
   echo "<table>";
   echo "<tr>";
   echo "<td>Equipo</td><td>Puntos</td><td>Gol F</td><td>Gol C</td><td>gol A</td>";
   foreach ($clasificacion as $equipo => $datos) {
       echo "<tr>";
       echo "<td>$equipo</td><td>{$datos['puntos']}</td><td>{$datos['golF']}</td><td>{$datos['golC']}</td><td>{$datos['golA']}</td>";
       echo "</tr>";
   }
   echo "</tr>";
   echo "</table>";

$xmlstr = <<<XML
        <clasificacion>
        </clasificacion>
XML;
    $xml = new SimpleXMLElement($xmlstr);
    foreach ($clasificacion as $equipo => $datos){
        $ligaXML = $xml->addChild('equipo');
        $ligaXML->addAttribute('id', $equipo);
        $ligaXML->addChild("puntos", $datos['puntos']);
        $ligaXML->addChild("gol_favor", $datos['golF']);
        $ligaXML->addChild("gol_contra", $datos['golC']);
        $ligaXML->addChild("gol_average", $datos['golA']);
        "<br>";
    }
    //Guardar documento xml
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save('clasificacion.xml');

    ?>
            <form action="vistas\descarga.php" method="post">
                <input type="submit" name="descargaXML" value="Descargar XML" />
            </form> 
        </div>
    </div>

</body>
</html>