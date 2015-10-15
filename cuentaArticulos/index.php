<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Cuenta articulos.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Cuenta articulos</h1>
<div>
    <form action="#" method="post">
        <label>Introduce un texto :</label>
        <textarea rows="3" cols="47" name="text" > escribe el texto aqui </textarea>        
       <p><input type="submit" class="submit" name="submit" value="Cuenta articulos" /></p>
       
    </form>    
</div>    
<?php  

if (isset($_POST['submit'])){
    
    $texto = $_POST['text'];    
    $articulos = array("el","la","los","las");
    $separado = strtok($texto, " \n\t.,:;");
    $contador = 0;
    
    while ($separado !== FALSE){
        if(in_array($separado, $articulos)){
            $contador += 1;
//            echo "<p class='centrar'>"; 
//            echo " - ".$separado;   
//            echo "</p>"; 
            
        }
        
        $separado = strtok(" \n\t.,:;");
        }
        echo "<p class='centrar'>"; 
        echo "has introducido ".$contador." articulos.";    
        echo "</p>"; 
}   
?>