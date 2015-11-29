<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Calculo de edad.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Calculo de edad</h1>
<div>
    <form action="#" method="post">
        <label>Introduce tu fecha de nacimiento (dd-mm-yyy) :</label>
        <input type="text" name="num1" maxlength="" size="10" /><br>            
       <p><input type="submit" class="submit" name="submit" value="Calculo edad" /></p>
       <input type="submit" class="submit" name="submit2" value=">Calculo edad 2" /> 
    </form>    
</div>    
<?php  

if (isset($_POST['submit'])){
    
    //fecha de nacimiento introducida
    $anio = $_POST['num1'];    
    if (ereg("([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})", $anio)){
    $fecha = explode("-", $anio);
    $dia = $fecha[0];
    $mes = $fecha[1];
    $agno = $fecha[2];
    //fecha del sistema actual
    $anioSistema = date("Y-m-d");
    $fechaSistema = explode("-", $anioSistema);
    $diaSistema = $fechaSistema[2];
    $mesSistema = $fechaSistema[1];
    $agnoSistema = $fechaSistema[0];
    
    if (is_numeric($dia) && is_numeric($mes) && is_numeric($agno)){
        
        $diasmes = diasMes($mes, $agno);
        if($dia > 0 && $dia <= $diasmes && $agno >0 && $agno < 2300){ 
         if(($mes == $mesSistema) && ($dia > $diaSistema)){
             $agnoSistema = $agnoSistema -1;
         }
         if($mes > $mesSistema){
             $agnoSistema = $agnoSistema -1;
         }
         if(($mes == $mesSistema) && ($dia == $diaSistema)){
             echo "<p class=centrar>";
             echo " Hoy es tu cumpleaños , FELICIDADES!!! <br>";
             echo "</p>"; 
         }
            $edad = ($agnoSistema - $agno);
         
            echo "<p class=centrar>";
                   echo "tu tienes $edad años <br>";                   
            echo "</p>";         
                }else{
            echo "<p class=centrar>";        
                    echo "La fecha no es valida";
            echo "</p>";         
                }       
    }else{
    echo "<p class=centrar>";      
          echo "La fecha no esta en formato (dd-mm-yyy) ";
    echo "</p>";       
      }   
    }else{
        echo "<p class=centrar>";      
          echo "La fecha no esta en formato (dd-mm-yyy) ";
        echo "</p>";
    }
}
if (isset($_POST['submit2'])){
    
    $anio = $_POST['num1'];
    if (ereg("([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})", $anio)){
    $fecha = explode("-", $anio);    
    $anio2 = "$fecha[2]-$fecha[1]-$fecha[0]";//arreglar $anio2 para que quede en un string la fecha cambiada
    
    
    echo "<p class=centrar>";
    echo "Tienes ".CalculaEdad($anio2)." años";
    echo "</p>"; 
    }else{
        echo "<p class=centrar>";      
          echo "La fecha no esta en formato (dd-mm-yyy) ";
        echo "</p>";
    }
}
?>
</body>
</html>
<?php
    function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    $agnos = ( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    return $agnos;
}
?>
<?php

function diasMes($mes, $year){
 $diasMes = 0;
      
      switch( $mes ) {
      
         case 1:
         case 3:
         case 5:
         case 7:
         case 8:
         case 10:
         case 12:		// meses de 31 dias
            $diasMes = 31;
            break;
      
         case 4:
         case 6:
         case 9:
         case 11:		// meses de 30 dias
            $diasMes = 30;
            break;
      
         case 2:		// febrero
            if (esBisiesto($year))
               $diasMes = 29;
            else
               $diasMes = 28;
            break;
      		
         default:			// mes incorrecto
            throw new FechaException( "Mes incorrecto" );
      }
      
      return $diasMes;
}
function esBisiesto($year){
        return date('L',  mktime(1,1,1,1,1,$year));
    }
?>