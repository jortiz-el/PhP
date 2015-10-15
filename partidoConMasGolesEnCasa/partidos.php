<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Partido con mas goles en casa.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Partido con mas goles en casa</h1>
  

<?php
if (isset($_POST['submit'])){
    $nombres = $_POST['equipos'];
    $equipos = explode(",", $nombres);    
    $equipos2 = $equipos;
    
    if ((count($equipos2)<3)){
        header('location: index.php');
    }else{
    echo "<div>";
    echo "<form action='#' method='post'>";
    echo "<table class='tabla' border='2'>";
    echo "<tr>";
    echo "<td class='Tfijo'>Equipo Local</td><td>Gol Local</td><td>VS</td><td>Gol Visitante</td><td class='Tfijo'>Equipo Visitante</td>";
    echo "</tr>";  
    foreach ($equipos as $v){ 
        foreach ($equipos2 as $v2){
            if ($v !== $v2){
            echo "<tr>";
            echo "<td class='Tfijo'>$v</td>"
                . "<td><input type='number' name='partido[$v][$v2][golL]' maxlength='' size='2' min='0' /></td>"
                . "<td>vs</td>"
                . "<td><input type='number' name='partido[$v][$v2][golV]' maxlength='' size='2' min='0' /></td>"
                . "<td class='Tfijo'>$v2</td>";        
            echo "</tr>"; 
            }
        }
    }
    echo "</table>";
    echo "<input type='submit' class='submit' name='submit2' value='calcular'>";
    echo "</form>";
   }
}
?>
<?php  

if (isset($_POST['submit2'])){
    
    $resumen = $_POST['partido'];    
    
    foreach ($resumen as $equipo ){
        foreach ($equipo as $goles){
            $golLocal[] = $goles['golL'];           
        }   
    }
    echo "<br><br><br>";
    echo "<p class='centrar'>";
    echo "El partido/s con mas goles como local :";
    echo "</p>";
    echo "<table class='tabla' border='2'>";
    foreach ($resumen as $equipos => $equipo ){
        foreach ($equipo as $equipoV => $goles){            
            if($goles['golL'] == max($golLocal)){
                
                echo "<tr>";
                echo "<td class='Tfijo'>$equipos</td><td>{$goles['golL']}</td><td>vs</td><td>{$goles['golV']}</td><td class='Tfijo'>$equipoV</td>";
                echo "</tr>";                
                
            }
        }   
    }
    echo "</table>";
}


?>