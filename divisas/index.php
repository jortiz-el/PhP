<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Conversor de Divisas.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />
   <script language="javascript">
    function combofunction(){

    //Se obtiene el elemento llamado moneda para posteriormente
    //cambiarle la propiedad selectedindex el cual le cambiara el elemento seleccionado.

       var combo1 = document.getElementById("moneda");
       var combo2 = document.getElementById("moneda2");
       var index = combo1.options.selectedIndex; //sacar en valor del index 
        combo1.selectedIndex = combo2.options.selectedIndex;
        combo2.selectedIndex = index;
    }
    </script>
</head>
<body>
<h1>Conversor de Divisas</h1>
<div>
<form action="#" method="post">
   <input type="text" name="num" maxlength="6" size="2" />
   <select name="moneda" id="moneda" size="1">
       <option value="1"  >Euro (EUR)</option>
       <option value="2"  />Dolar (USD)</option>
       <option value="3"  />Libra Esterlina (GBP)</option>
       <option value="4"  />Yuan (CNY)</option>
   </select>
   <input type="button" name="invertir" value="<->" onclick="combofunction()" />
   <select name="moneda2" id="moneda2" size="1">
       <option value="1"  >Euro (EUR)</option>
       <option value="2"  />Dolar (USD)</option>
       <option value="3"  />Libra Esterlina (GBP)</option>
       <option value="4"  />Yuan (CNY)</option>
   </select>  
   <p><input type="submit" class="submit" name="submit" value="Convertir divisa" /></p>
</div>    
<?php  

if (isset($_POST['submit'])){
    
    $cantidad = $_POST['num'];
    $moneda = $_POST['moneda'];
    $moneda2 = $_POST['moneda2'];
    
    echo "<p class='centrar'>";
    //echo "convierte $cantidad de $moneda a $moneda2";    
    if (is_numeric($cantidad)){
    switch ($moneda) {
        case 1: 
            if ($moneda2 == 1){
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*1 ." EUR";
            }else if ($moneda2 == 2){
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*1.11545 ." USD";
            }else if ($moneda2 == 3){
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*0.734600 ." GBP";
            }else{
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*7.10964 ." CNY";
            }
            break;
        case 2: 
        if ($moneda2 == 1){
            echo "$cantidad ".codigo($moneda)." = ". $cantidad*0.893067 ." EUR";
        }else if ($moneda2 == 2){
            echo "$cantidad ".codigo($moneda)." = ". $cantidad*1 ." USD";
        }else if ($moneda2 == 3){
            echo "$cantidad ".codigo($moneda)." = ". $cantidad*0.658928 ." GBP";
        }else{
            echo "$cantidad ".codigo($moneda)." = ". $cantidad*6.37575 ." CNY";
        }
            break;
        case 3: 
            if ($moneda2 == 1){
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*1.35558 ." EUR";
            }else if ($moneda2 == 2){
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*1.51752 ." USD";
            }else if ($moneda2 == 3){
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*1 ." GBP";
            }else{
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*9.67678 ." CNY";
            }
            break;
        case 4: 
            if ($moneda2 == 1){
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*0.140099 ." EUR";
            }else if ($moneda2 == 2){
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*0.156844 ." USD";
            }else if ($moneda2 == 3){
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*0.103340 ." GBP";
            }else{
                echo "$cantidad ".codigo($moneda)." = ". $cantidad*1 ." CNY";
            }
            break;    

        default:
            break;
    }
    }else{
        echo "$cantidad  no es un numero correcto";
    }
    
    echo "</p>";
    
}
?>
</body>
</html> 
<?php
function codigo($variable){
    switch ($variable) {
        case 1: $value = "EUR";
            break;
        case 2: $value = "USD";
            break;
        case 3: $value = "GBP";
            break;
        case 4: $value = "CNY";
            break;
        default:
            break;
    }
    return $value;
}
?>
