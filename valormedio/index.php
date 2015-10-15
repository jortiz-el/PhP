<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Valor medio.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Valor medio</h1>
<div>
<form action="#" method="post">
    <label>Introduce un numero 1 :</label>
    <input type="text" name="num1" maxlength="" size="3" /><br> 
    <label>Introduce un numero 2 :</label>
    <input type="text" name="num2" maxlength="" size="3" /><br> 
    <label>Introduce un numero 3 :</label>
    <input type="text" name="num3" maxlength="" size="3" />
   <p><input type="submit" class="submit" name="submit" value="Busca el Valor medio" /></p>
</form>
    <form action="secuencial.php" method="post">
      <input type="submit" class="submit" name="submit2" value="ir a busqueda secuencial" />  
    </form>    
</div>    
<?php  

if (isset($_POST['submit'])){
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    
    echo "<p class='centrar'>";
    if((is_numeric($num1))&&(is_numeric($num2))&&(is_numeric($num3))){
    if(((($num1 > $num2) && ($num1 < $num3))||(($num1 < $num2) && ($num1 > $num3)) ) && (($num2 > $num3)||($num2 < $num3) )){
        echo "El numero : $num1 es el numero del medio.";
    }else if(((($num2 > $num1) && ($num2 < $num3))|| (($num2 < $num1) && ($num2 > $num3)))){
        echo "El numero : $num2 es el numero del medio.";
    }else {
        echo "El numero : $num3 es el numero del medio.";
    }
    }else{
        echo "no has introducido numeros correctos";
    }
    echo "</p>";
}


?>
</body>
</html>