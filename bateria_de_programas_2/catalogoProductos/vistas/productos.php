<?php
    if ($view !== 'productos') {
        header("location: /");
    } else {
        $view = '';
    }
    
?>
<html>
    <head>
        <title>Catalogo de Productos</title>
    </head>
    <body>
        <h1><?php echo $categoria->getNombre()?></h1>
        <?php
            if (isset($errormsg)) {
                echo "<h2>$errormsg</h2>";
            }
        ?>
        <form action="/" method="post">
            <input type="submit" name="desconectar" value="logout" />
            <input type="submit" name="volver" value="volver" />
            <table>
                <tr>
                    <td></td><td>Nombre</td><td>Precio</td>
                    <?php
                    $productos = $categoria->getProductos()->iterate();
                    while ($productos) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name = 'prod' value = '{$productos->getNombre()}'>"
                        . "</td><td>{$productos->getNombre()}</td><td>{$productos->getPrecio()}</td>";
                        echo "</tr>";
                        $productos = $categoria->getProductos()->iterate();
                    }
                    ?>
                </tr>
                
            </table>
            <input type="submit" name="borrar" value="Borrar">
            <h2>Insertar productos</h2>
            <label>Nombre:</label>
            <input type="text" name="nombre" size="10" />
            <label>Precio:</label>
            <input type="number" name="precio" />
            <input type="submit" name="insertar" value="Insertar"/>
            <input type="submit" name="modificar" value="Modificar"/>
                
                
        </form>
        <?php
        
        ?>
        
    </body>
</html>



