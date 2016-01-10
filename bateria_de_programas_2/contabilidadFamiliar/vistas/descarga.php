<?php
$enlace = "..\contabilidad.xml";
header ("Content-Disposition: attachment; filename=contabilidad.xml ");
header ("Content-Type: application/xml");
readfile($enlace);

