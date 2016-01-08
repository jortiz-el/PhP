<?php
    if ($view !== 'categorias') {
        header("location: /");
    } else {
        $view = '';
    }
?>

<html>
    <head>
        <title>Catalogo de productos</title>
    </head>
    <body>
        <h1>Catalogo de productos</h1>
        <form action="/" method="post">
            <input type="submit" name="desconectar" value="logout">
            <label>Categorias:</label>
            <select name="categ">
                <option value="bebidas">bebidas</option>
                <option value="charcuteria">charcuteria</option>
                <option value="pescaderia">pescaderia</option>
                <option value="panaderia">panaderia</option>
            </select>
            <input type="submit" name="productos" value="entrar">
        </form>
    </body>
</html>

