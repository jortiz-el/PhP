<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Encuentra la palabra correcta.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Encuentra la palabra correcta</h1>
<div>
<form action="#" method="post">
   <input type="text" name="palabras" maxlength="" size="62" />     
   <p><input type="submit" class="submit" name="submit" value="encuentra palabras" /></p>
</div>    
<?php  

function cmp($a,$b){
    if ((strlen($a)>  strlen($b)) || 
        (strlen($a)=== strlen($b) && ($a >= $b))){
                return (1);
            }  else {
                return (-1);        
            }
}

if (isset($_POST['submit'])){
 $cadena = $_POST['palabras']; 
 $separado = strtok($cadena, " \n\t.,:;");
 $palabras = array();
 
 echo "<p class='centrar'>Las Palabras que cumplean la condicion  son : </p>";
 echo "<p class='centrar'>"; 
 while ($separado !== FALSE){
     //comprobamos si la primera vocal es mayuscula
     if (strtoupper($separado[0])=== $separado[0]){
         //comprobamos si la longitud de la palabra esta entre 8 y 10 caract.
         if((strlen($separado)>7)&&(strlen($separado)<11)){
             $vocales = array("a","e","i","o","u","A","E","I","O","U");
             //eliminamos las vocales de la palabra
             $palabraConsonantes = str_replace($vocales, "", $separado);
             //si la resta de longitud de la palabra menos la palabra sin vocales es 4
             if (strlen($separado)- strlen($palabraConsonantes) == 4){
                 //comprobamos si las utimas 3 posiciones de la palabra es = a ero
                 if (substr($separado, -3) === "ero"){
                     $palabras[] = strtoupper($separado);
                 }
                 
             }
         }
     }
      $separado = strtok(" \n\t.,:;");
 }
 if ($palabras == TRUE){ 
     usort($palabras, "cmp");
 echo implode(' - ', $palabras);
 }  else {
     echo "no se encontraron palabras con estas condiciones";
 }
 echo "</p>";  
  
    
}

?>
</body>
</html> 

