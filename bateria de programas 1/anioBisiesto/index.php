<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Año Bisiesto.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Año Bisiesto</h1>
<div>
    <form action="#" method="post">
        <label>Introduce un año :</label>
        <input type="text" name="num1" maxlength="" size="30" /><br>            
       <p><input type="submit" class="submit" name="submit" value="Comprobar si es bisiesto" /></p>
       <input type="submit" class="submit" name="submit2" value="comprobar 2" /> 
    </form>    
</div>    
<?php  

if (isset($_POST['submit'])){
    
    $anio = $_POST['num1'];
    
    echo "<p class=centrar>";
    //si el año es divisible por 4 pero no divisible por 100 salvo en el caso de ser divisible por 400.
    if (is_numeric($anio) && $anio > 0 && $anio < 2101){
    if((!($anio%4) && ($anio%100)|| !($anio%400))){
        echo "Es bisiesto";
    }else{
        echo "No es bisiesto"."<br>";
        cuantoFalta($anio);        
     }
    }else {
        echo "escribe solo numeros entre 1 y 2100";
    }
    echo "</p>"; 
}
if (isset($_POST['submit2'])){
    
    $anio = $_POST['num1'];
    echo "<p class=centrar>";
    if (is_numeric($anio) && $anio > 0 && $anio < 2101){
    //si el año es divisible por 4 pero no divisible por 100 salvo en el caso de ser divisible por 400.
    if(esBisiesto($anio)){
        echo "Es bisiesto";
    }else{
        echo "No es bisiesto ";
        cuantoFalta($anio);
    }        
    }else {
        echo "escribe solo numeros entre 1 y 2100";
    }
    echo "</p>"; 
}
?>
</body>
</html>

<?php
    function esBisiesto($year){
        return date('L',  mktime(1,1,1,1,1,$year));
    }
    //funcion que nos dice cuantos años faltan para el siguiente año bisiesto
    function cuantoFalta($year){
        if ($year%100 != 0){
        $division = $year/4;
        $decimales = explode(".", $division);        
        if ( $decimales[1] == 75){
            echo "a '{$year}' le falta un año para que sea bisiesto";
        }elseif ($decimales[1] == 5) {
            echo "a '{$year}' le faltan dos años para que sea bisiesto";
        }elseif ($decimales[1] == 25) {
            echo "a '{$year}' le faltan tres años para que sea bisiesto";
        }
      }else {
          echo "el año '{$year}' no es bisiesto por ser multiplo de 100";
      }
    }
?>
