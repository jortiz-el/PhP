<?php
if ($view !== "estado") {
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
        <h1>Estado del Saldo Actual</h1>
        <div>
            <form action="/" method="post">
                <input type="submit" name="desconectar" value="LogOut" />
                <h2>Ingesos - gastos : </h2>
                <?php
                $listado = $usuario->getApuntes()->iterate();
                    while ($listado) {
                        if ($listado->getTipo() == "ingresos"){
                            if (isset($ingresos)){
                                $ingresos += $listado->getCantidad();
                            } else {
                                $ingresos = $listado->getCantidad();
                            }
                        } else if ($listado->getTipo() == "gastos") {
                            if (isset($gastos)){
                                $gastos += $listado->getCantidad();
                            } else {
                                $gastos = $listado->getCantidad();
                            }
                        } 
                        $listado = $usuario->getApuntes()->iterate();
                    }
                    $ingresos = isset($ingresos)?$ingresos:0;
                    $gastos = isset($gastos)?$gastos:0;
                    $total = $ingresos - $gastos;
                ?>
                <p><?php echo $total ." €" ?></p>
                <input type="submit" name="volver" value="volver" />
            </form>
            
        </div>
        </div>
    </body>
</html>