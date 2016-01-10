<?php
if ($view !== "registro") {
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
            <h1 >Registro Nuevos Usuarios</h1>
        <?php
            if (isset($errormsg)) {
                echo "<h2 class='rojo'>$errormsg</h2>";
            }
        ?>
        <div>
            <form action="/" method="post">
                <label>Usuario: </label>
                <input type="text" name="usuario" size="10" />
                <label>Contraseña: </label>
                <input type="text" name="clave" size="10" />
                <input type="submit" name="registrar" value="Registrar" />
                <input type="submit" name="volver" value="Volver" />
            </form>
        </div>
        </div>
    </body>
</html>