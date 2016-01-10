<?php
if ($view !== "detalle") {
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
        <h1><?php echo $_SESSION['tipo']?> Ocurridos</h1>
        <div>
            <form action="/" method="post">
                <input type="submit" name="desconectar" value="LogOut" />
                 <input type="submit" name="volver" value="Volver" />
            </form>
            <form action="/" method="post">
                <label>Fecha 1 (9999-12-31)</label>
                <input type="text" name="fecha1" size="10" required="required" />
                <label>Fecha 2 (9999-12-31)</label>
                <input type="text" name="fecha2" size="10" required="required" />
                <input type="submit" name="lista" value="Enviar" />
            </form>
        </div>
        </div>
    </body>
</html>