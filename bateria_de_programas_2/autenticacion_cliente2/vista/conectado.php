<?php
    if (!isset($_SESSION['vista'])) {
       header("location: /");
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Autenticacion cliente.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="../css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
    <div class="conectado">  
        <h1>SALVADOR DALI</h1>
        <h2>The Temptation of St. Anthony, 1946</h2>
            <form action="/" method="post">
                <input type="submit" class="submit" name="submit2" value="Desconectar" /> 
            </form> 
        <br><br><hr><hr>
                        <img src="../img/dali.bmp"></img>   
    </div>      
</body>
</html>   