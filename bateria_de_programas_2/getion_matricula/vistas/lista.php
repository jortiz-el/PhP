<?php
if ($view !== "lista") {
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
            <div class="lista">
            <form action="/" method="post">
                <input type="submit" name="salir" value="LogOut">
            </form>
            <form action="/" method="post">
                
                <?php
                $grupos = $usuario->getGrupos()->iterate();
                while ($grupos) {
                    $nom_grupo = $grupos->getNombre();
                    echo '<br>';
                    echo "<table>";
                    echo "<tr>";
                    echo "<td colspan='6'>Grupo: $nom_grupo</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td></td><td>Nombre</td><td>Apellido 1</td><td>Apellido 2</td><td>Edad</td><td>Sexo</td>";
                    echo "</tr>";
                    $alumnos = $grupos->getAlumnos()->iterate();
                    while ($alumnos){
                        $id_alum = $alumnos->getId();
                        echo "<tr>";
                        echo "<td><input type='radio' name='id_alumno[$nom_grupo]' value='$id_alum' ></td>"
                        . "<td>{$alumnos->getNombre()}</td><td>{$alumnos->getApellido1()}</td>"
                        . "<td>{$alumnos->getApellido2()}</td><td>{$alumnos->getEdad()}</td><td>{$alumnos->getSexo()}</td>";
                        echo "</tr>";
                        $alumnos = $grupos->getAlumnos()->iterate();
                    }
                    echo "</table>";
                    echo '<br>';
                    $grupos = $usuario->getGrupos()->iterate();
                }
                
                ?>
                
                
                <input type="submit" name="ingresar" value="Añadir">
                <input type="submit" name="modificar" value="Modificar">
                <input type="submit" name="borrar" value="Borrar">
                <input type="submit" name="xml" value="XML">              
            </form>
        </div>
        </div>
    </body>
</html>








