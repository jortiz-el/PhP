<?php
if ($view !== "descarga") {
    header('Location: /');
} else {
    $view = '';
}

$xmlstr = <<<XML
        <matricula>
        </matricula>
XML;
    $xml = new SimpleXMLElement($xmlstr);
    $grupo_actual = $usuario->getGrupos()->getByProperty("nombre",$grupo);
    $listado = $grupo_actual->getAlumnos()->iterate();
    while ($listado) {
        $contabilidadXML = $xml->addChild('grupo');
        $contabilidadXML->addAttribute('grupo', $grupo);
        $contabilidadXML->addChild("nombre", $listado->getNombre());
        $contabilidadXML->addChild("apellido1", $listado->getApellido1());
        $contabilidadXML->addChild("apellido2", $listado->getApellido2());
        $contabilidadXML->addChild("edad", $listado->getEdad());
        $contabilidadXML->addChild("sexo", $listado->getSexo());
        "<br>";
        $listado = $grupo_actual->getAlumnos()->iterate();;
    }

    //Guardar documento xml
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save('matricula.xml');
    
$enlace = "matricula.xml";
header ("Content-Disposition: attachment; filename=matricula.xml ");
header ("Content-Type: application/xml");
readfile($enlace);
