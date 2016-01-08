<?php
if ($view !== "conexion") {
    header('Location: /');
} else {
    $view = '';
}

?>
<html>
    <head>
        <title>Catalogo de productos</title>
    </head>
    <body>
        <h1>catalogo de productos</h1>
        <?php
            if (isset($errormsg)) {
                echo "<h2>$errormsg</h2>";
            }
        ?>
        <div>
            <form action="/" method="post">
                <label>Usuario: </label>
                <input type="text" name="usuario" size="10" />
                <label>Contraseña: </label>
                <input type="text" name="clave" size="10" />
                <input type="submit" name="conexion" value="Entrar" />
            </form>
        </div>
    </body>
</html>








