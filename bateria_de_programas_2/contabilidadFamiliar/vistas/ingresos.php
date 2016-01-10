<?php
if ($view !== "ingresos") {
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
        <h1>Ingresar Apuntes Contables</h1>
        <div>
            <form action="/" method="post">
                 <input type="submit" name="desconectar" value="LogOut" />
                 <input type="submit" name="volver" value="Volver" />
            </form>
            <form action="/" method="post">
                <label>Tipo</label>
                <select name="tipo">
                    <option value="ingresos" selected>Ingresos</option>
                    <option value="gastos">Gastos</option>
                </select>
                <label>Concepto</label>
                <input type="text" name="concepto" size="10" required="required" />
                <label>Cantidad</label>
                <input type="number" name="cantidad"  required="required" />
                <label>Fecha (9999-12-31)</label>
                <input type="text" name="fecha" size="10" required="required" /><br>
                <input type="submit" name="enviar" value="Enviar" />
            </form>
        </div>
        </div>
    </body>
</html>