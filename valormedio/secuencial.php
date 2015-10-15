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
    <label>Introduce los numeros :</label>
    <input type="text" name="num1" maxlength="" size="30" /><br>     
   <p><input type="submit" class="submit" name="submit" value="Busca el Valor medio" /></p>
</form>
    <form action="index.php" method="post">
      <input type="submit" class="submit" name="submit2" value="ir a busqueda normal" />  
    </form>    
</div>    
<?php  

if (isset($_POST['submit'])){
    
    $cadena = $_POST['num1'];
    $array = explode(",", $cadena);
    
    
    if (controlarError($array) == 0){
       if(count($array)>= 3){ 
       asort($array);
    
       //recorre los valores del array para sacar y borrar min y max
        while(current($array)== true){

            if(current($array)==  min($array)){
            unset($array[key($array)]);
            }elseif(current($array)==  max($array)){
            unset($array[key($array)]);
            }

            next($array);
        }
        echo "<p class='centrar'>El valor medio de la secuencia es : </p>";
        echo "<p class='centrar'>";        
        echo implode(",", $array);  
        echo "</p>"; 
        }else{
            echo "<p class='centrar'>";
            echo "La secuencia tiene que contener 3 o mas numeros ";
            echo "</p>"; 
           }
    }else{
        echo "<p class='centrar'>";
        echo "La secuencia contiene letras o algun numero esta repetido ";
        echo "</p>"; 
    }
            
     
}
?>
</body>
</html>

<?php
    function controlarError($n){
        $repetido = array();
        $contador = 0;

        foreach($n as $element) {
        if(is_numeric($element)) {
            if(!in_array($element, $repetido)){
                array_push($repetido, $element);
                //echo "'{$element}' es numérico", PHP_EOL;
            }else{
                //echo "'{$element}' esta repetido", PHP_EOL;
                $contador += 1;
            }

        } else {
           // echo "'{$element}' NO es numérico", PHP_EOL;
            $contador += 1;
        }
       }
       //echo $contador; 
       return $contador;
    }
?>