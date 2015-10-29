<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Tablas de multiplicar.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />
   
</head>
<body>
<h1>Tablas de multiplicar</h1>
<h3>Escribe un número del 1 al 9 y yo te diré la tabla de multiplicar.</h3>
<form action="#" method="post">
   <p>Escribe aquí el número: <input type="text" name="num" maxlength="3" size="1" /></p>   
   <p><input type="submit" class="submit" name="submit" value="Ver tabla de multiplicar." /></p>
</form>
<form action="secuenciaTabla.php" method="post">      
   <p><input type="submit" class="submit" name="submit2" value="ir a tablas secuencial" /></p>
</form>
<?php  

if (isset($_POST['submit'])){
    
    $n = $_POST['num'];       
    
    if (is_numeric($n)){
if ($n<1 || $n>9) {
    echo "el numero $n no esta entre entre el 1 y el 9.";
    }
else {     
        tablaMultiplicar($n);    
     }
    }else{
     echo "no se admite $n como un numero";
    
    }
}else{
    echo "escribe un nùmero entre el 1 y el 9.";
}
?>
</body>
</html>




<?php
    function tablaMultiplicar($n){
        echo "<h2>Tabla del $n:</h2>";
     $i = 1;
     echo "<table class='tabla' border='2'>";
     while ($i <= 10) {
           echo "<tr>";
           echo "<td class='fila_".$i%2 ."'>$n x $i</td><td class='fila_".$i%2 ."'> = </td><td class='fila_".$i%2 ."'>".$n*$i."</td>";           
           $i++;
           }
      echo "</table>";
    } 
?>