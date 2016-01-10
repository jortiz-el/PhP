<?php
if ($view !== "lista") {
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
        <h1>Lista <?php echo $_SESSION['tipo']?> Ocurridos</h1>
        <div class="conexion">
            <form action="/" method="post">
                <input type="submit" name="desconectar" value="LogOut" />
              <table>
                <tr>
                    <td>Tipo</td><td>Concepto</td><td>Cantidad</td><td>Fecha</td>
                    <?php
                    $listado = $lista->iterate();
                    while ($listado) {
                        echo '<tr>';
                        echo "<td>{$listado->getTipo()}</td><td>{$listado->getConcepto()}</td>"
                        . "<td>{$listado->getCantidad()}</td><td>{$listado->getFecha()}</td>";
                        echo '</tr>';
                    $listado = $lista->iterate();
                    }
                    ?>
                </tr>
            </table>
                <input type="submit" name="volver" value="volver" />
            </form>
            
        </div>
        </div>
    </body>
</html>