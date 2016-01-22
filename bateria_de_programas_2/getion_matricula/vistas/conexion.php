<?php
if ($view !== "conexion") {
    header('Location: /');
} else {
    $view = '';
}

?>
<html>
    <head>
        <title>Gestion Matricula</title>
        <link rel="stylesheet" href="../css/newCascadeStyleSheet.css"/>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="centrado">
            <h1 >Gestion Matricula</h1>
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
            </form>
        </div>
        </div>
    </body>
</html>








