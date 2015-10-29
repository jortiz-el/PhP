<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Tiradas de un dado.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Tiradas de un dado</h1>
<div>
    <form action="#" method="post">
        <label>Introduce un numero de tiradas (DADO) :</label>
        <input type="text" name="num1" maxlength="" size="17" /><br>            
       <p><input type="submit" class="submit" name="submit" value="Tirar dado" /></p>
       
    </form>    
</div>    
<?php  

if (isset($_POST['submit'])){
    
    $veces = $_POST['num1'];
    $tiradas = array ();
    $contador = 0;
    
    if(is_numeric($veces) && $veces >= 1){
        
        for($i = 1;$i <= $veces;$i++){
            $numero = rand(1, 6);
            array_push($tiradas, $numero);
            asort($tiradas);
            echo "<p class='centrar'>";
            echo "$i º- tirada = $numero";
            echo "</p>";  
        }
        echo "<p class='centrar'>";
        echo "Las tiradas sacaron los numeros : <br>";
        $todos = implode(" - ", $tiradas);
        echo $todos."<br><br>";
        //sacar el porcentaje de salidas del numero
        for($i = 1; $i <= 6;$i++){
        $uno = substr_count($todos,$i);
        $uno = ($uno*100)/$veces;
        echo "el numero $i ha salido un ".round($uno,2)." % <br>";
        }
        echo "</p>";  
        
    }else{
        echo "<p class='centrar'>";
        echo "escribe un numero correcto mayor o igual que 1";
        echo "</p>";
    }
    
}    
?>