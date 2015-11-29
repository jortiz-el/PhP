<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>numero primo.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Numero primo</h1>
<div>
    <form action="#" method="post">
        <label>Introduce un numero :</label>
        <input type="text" name="num1" maxlength="" size="39" /><br>            
       <p><input type="submit" class="submit" name="submit" value=" es numero primo?" /></p>        
    </form>    
</div>
        <?php
        /**
         * Función que determina si un numero es primo
         * Tiene que recibir el numero a determinar si es primo o no
         * Devuelve True o False
         */
        function primo($num){
            $cont=0;
            // Funcion que recorre todos los numero desde el 2 hasta el valor recibido
            for($i=2;$i<=$num;$i++){
                if($num%$i==0){
                    # Si se puede dividir por algun numero mas de una vez, no es primo
                    if(++$cont>1)
                        return false;
                }
            }
            return true;
        }
        
        if(isset($_POST['submit'])){
            $numero = $_POST['num1'];
             if (is_numeric($numero)){
                 if(primo($numero)){
                     echo "<p class=centrar>";
                     echo "'{$numero}' es un numero primo";    
                     echo "</p>";  
                 }else{
                   echo "<p class=centrar>";
                   echo "'{$numero}' no es un numero primo";    
                   echo "</p>";  
                 }
             }else{
                echo "<p class=centrar>";
                echo "'{$numero}' no es un numero correcto";    
                echo "</p>";
             }
        }
?>
    </body>
</html>
