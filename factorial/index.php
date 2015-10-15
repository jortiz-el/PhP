<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Calculo Factorial</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Calculo Factorial</h1>
<div>
<form action="#" method="post">
    <input type="text" class="cuadro" name="num" maxlength="6" size="10" />     
   <input type="submit" class="submit" name="submit" value="Calcular factorial" />
</div>
<p class="centrar">
        <?php
        
        if (isset($_POST['submit'])){
            $numero = $_POST['num'];
            $fac = 1;
            if(is_numeric($numero)){                
                for($i=$numero;$i>=1;$i--){
                    $fac *= $i;
                    echo $i;
                    echo ($i==1)?" = ":" x ";
                }
                echo "<b> $fac </b>";
                
            }else{
            echo "$numero  no es un numero correcto";
        }
        }
               
        ?>
</p>

    </body>
</html>
