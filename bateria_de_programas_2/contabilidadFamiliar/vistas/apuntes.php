<?php
if ($view !== "apuntes") {
    header('Location: /');
} else {
    $view = '';
}

?>
<html>
    <head>
        <title>Contabilidad Familiar</title>
        <link rel="stylesheet" href="../css/newCascadeStyleSheet.css"/>
    </head>
    <body>
        <div class="centrado">
        <h1>Apuntes contables</h1>
        <div class ="conexion">
            <form action="/" method="post">
                <input type="submit" name="desconectar" value="LogOut" />
            <table>
                <tr>
                    <th>Tipo</th><th>Concepto</th><th>Cantidad</th><th>Fecha</th>
                </tr>
                    <?php
                    $listado = $usuario->getApuntes()->iterate();
                    while ($listado) {
                        echo '<tr>';
                        echo "<td>{$listado->getTipo()}</td><td>{$listado->getConcepto()}</td>"
                        . "<td>{$listado->getCantidad()}</td><td>{$listado->getFecha()}</td>";
                        echo '</tr>';
                    $listado = $usuario->getApuntes()->iterate();
                    }
                    
$xmlstr = <<<XML
        <contabilidad>
        </contabilidad>
XML;
    $xml = new SimpleXMLElement($xmlstr);
    $listado = $usuario->getApuntes()->iterate();
    while ($listado) {
        $contabilidadXML = $xml->addChild('tipo');
        $contabilidadXML->addAttribute('tipo', $listado->getTipo());
        $contabilidadXML->addChild("concepto", $listado->getConcepto());
        $contabilidadXML->addChild("cantidad", $listado->getCantidad());
        $contabilidadXML->addChild("fecha", $listado->getFecha());
        "<br>";
        $listado = $usuario->getApuntes()->iterate();
    }

    //Guardar documento xml
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save('contabilidad.xml');
    
                    ?>
            </table>
                <input type="submit" name="nuevo" value="Nuevo Apunte" />
                <input type="submit" name="saldos" value="Saldos" />
                <input type="submit" name="ingresos" value="Ingresos" />
                <input type="submit" name="gastos" value="Gastos" />
            </form><br>
            <form action="/vistas/descarga.php" method="post">
                <input type="submit" name="xml" value="Xml" />
            </form>
        </div>
        </div>
    </body>
</html>

