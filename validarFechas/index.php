<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Validar fecha.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Validar fecha</h1>
<div>
    <form action="#" method="post">
        <label>Introduce una fecha (dd-mm-yyy) :</label>
        <input type="text" name="num1" maxlength="" size="24" /><br>            
       <p><input type="submit" class="submit" name="submit" value="Validar fecha" /></p>
       <input type="submit" class="submit" name="submit2" value=">Validar 2" /> 
    </form>    
</div>    
<?php  

if (isset($_POST['submit'])){
    
    $anio = $_POST['num1'];
    
    
    echo "<p class=centrar>";
    
    echo "</p>"; 
}
if (isset($_POST['submit2'])){
    
    $anio = $_POST['num1'];
    
    echo "<p class=centrar>";
    validarFecha($anio);
    echo "</p>"; 
}
?>
</body>
</html>
<?php
    function validarFecha($fecha){
        $arrayFecha = explode("-", $fecha);
        //chekea fecha por mes,dia,año
        if (is_numeric($arrayFecha[0]) && is_numeric($arrayFecha[1]) && is_numeric($arrayFecha[2])){ 
        if (checkdate($arrayFecha[1], $arrayFecha[0], $arrayFecha[2])){
            echo "La fecha es valida";
        }else{
            echo "La fecha no es valida";          
        }
      }else{
          echo "La fecha no esta en formato numerico";
      }
    }
?>