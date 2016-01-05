<?php
$enlace = "..\clasificacion.xml";
header ("Content-Disposition: attachment; filename=clasificacion.xml ");
header ("Content-Type: application/xml");
readfile($enlace);
?>
