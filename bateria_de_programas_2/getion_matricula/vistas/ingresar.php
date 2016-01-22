<?php
if ($view !== "ingresar") {
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
                <input type="submit" name="salir" value="LogOut">
            </form>
            <form action="/" method="post">
                <select name="grupo">
                    <option value="1ESOA">1ESOA</option>
                    <option value="1ESOB">1ESOB</option>
                    <option value="1ESOC">1ESOC</option>
                    <option value="2ESOA">2ESOA</option>
                    <option value="2ESOB">2ESOB</option>
                    <option value="2ESOC">2ESOC</option>
                    <option value="3ESOA">3ESOA</option>
                    <option value="4ESOA">4ESOA</option>
                </select>
                <label>Nombre: </label>
                <input type="text" name="nombre" size="10" required/>
                <label>Apellido 1: </label>
                <input type="text" name="apellido1" size="10" required/>
                <label>Apellido 2: </label>
                <input type="text" name="apellido2" size="10" required/>
                <label>Edad: </label>
                <input type="text" name="edad" size="10" required/>
                <label>sexo: </label>
                <input type="text" name="sexo" size="10" required/>
                <input type="submit" name="guardar" value="Guardar" />
                
            </form>
            <form action="/" method="post">
                <input type="submit" name="volver" value="Volver" />
            </form>
        </div>
        </div>
    </body>
</html>










