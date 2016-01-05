<?php
    if ($view !== 'resumen') {
       header('Location: /');
    } else {
        $view = '';
    }   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Juego del Ahorcado</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="../css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
    <div class="conectado"> 
<?php
$xmlstr = <<<XML
        <partidas>
        </partidas>
XML;
    $xml = new SimpleXMLElement($xmlstr);
    foreach ($partidaxml as $id_partida => $jugadas){
        $partidasXML = $xml->addChild('partida');
        $partidasXML->addAttribute('id', $id_partida);
        if (!$jugadas->isEmpty()){
            $actual = $jugadas->iterate();
            while ($actual) {
                $jugadaXML = $partidasXML->addChild('jugada');
                $jugadaXML->addAttribute('id', $actual->getId_user());
                $jugadaXML->addChild('letra', $actual->getLetra());
                $jugadaXML->addChild('palabra_descubierta', $actual->getPalabra_secreta());
                $actual = $jugadas->iterate();
            }
        }
        "<br>";
    }
    echo htmlspecialchars($xml->asXML());
    
    //Guardar documento xml
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save('partidas.xml');
    


?>
    </div>
    <a href="partidas.xml">Descargar XML</a>
    <form action="/" method="post">
        <input type="submit" name="res_xml" value="volver"></input>
    </form>
</body>
</html>   