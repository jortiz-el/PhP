<?php
if ($view !== "conexion") {
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
            <h1 >Contabilidad Familiar</h1>
        <?php
            if (isset($errormsg)) {
                echo "<h2 class='rojo'>$errormsg</h2>";
            } else if (isset($okmsg)) {
                echo "<h2 class='verde'>$okmsg</h2>";
            }
        ?>
        <div>
            <form action="/" method="post">
                <label>Usuario: </label>
                <input type="text" name="usuario" size="10" />
                <label>Contraseña: </label>
                <input type="text" name="clave" size="10" />
                <input type="submit" name="conexion" value="Entrar" />
                <input type="submit" name="registro" value="Registro" />
            </form>
        </div>
        </div>
    </body>
</html>








