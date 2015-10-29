<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Resultado de la liga.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Resultado de la liga</h1>
   
<?php  

$equipos = array("Real madrid","Manchester Utd","AC Milan");
$equipos2 = array("Real madrid","Manchester Utd","AC Milan");


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
                    . "<td><input type='number' name='partido[$v][$v2][golL]' maxlength='' size='2' min='0'  /></td>"
                    . "<td>vs</td>"
                    . "<td><input type='number' name='partido[$v][$v2][golV]' maxlength='' size='2' min='0'  /></td>"
                    . "<td class='Tfijo'>$v2</td>";        
                echo "</tr>"; 
                
                }
                
            }
        }
        echo "</table><br>";
        echo "<input type='submit' class='submit' name='submit' value='calcular'>";
        echo "</form>";
    echo "</div><br>";    

if (isset($_POST['submit'])){
    $resultado = $_POST['partido'];
    $clasificacion = [];
    $golF = [];
    $golC = [];
    $golA = [];
    $puntos = [];
    $ganado = [];
    $empatado = [];
    $perdido = [];
    
    foreach ($resultado as $equipoL => $visitantes){
        foreach ($visitantes as $equipoV => $marca){
          //goles a favor de los equipos
          $golF += [$equipoL => '']; 
          $golF[$equipoL] += $marca['golL'];
          $golF[$equipoL] += $marca['golV'];
          //goles en contra de los equipos
          $golC += [$equipoL => '',$equipoV => ""]; 
          $golC[$equipoL] += $marca['golV'];
          $golC[$equipoV] += $marca['golL'];
          //puntos por equipo y partido G/E/P
          if ($marca['golL'] == $marca['golV']){
              $puntos += [$equipoL => '',$equipoV => ""]; 
              $puntos[$equipoL] += 1;
              $puntos[$equipoV] += 1;
              //partidos empatados por equipo
              $ganado += [$equipoL => 0,$equipoV => 0]; 
              $perdido += [$equipoL => 0,$equipoV => 0]; 
              $empatado += [$equipoL => 0,$equipoV => 0];
              $empatado[$equipoL] += 1; 
              $empatado[$equipoV] += 1; 
          }else if ($marca['golL'] > $marca['golV']){
              $puntos += [$equipoL => '',$equipoV => ""];
              $puntos[$equipoL] += 3;
              $puntos[$equipoV] += 0;
              //partidos ganados/perdidos por equipo
              $ganado += [$equipoL => 0,$equipoV => 0]; 
              $perdido += [$equipoL => 0,$equipoV => 0]; 
              $empatado += [$equipoL => 0,$equipoV => 0];
              $ganado[$equipoL] += 1;
              $perdido[$equipoV] +=1;
          }else{
              $puntos += [$equipoL => '',$equipoV => ""];
              $puntos[$equipoL] += 0;
              $puntos[$equipoV] += 3;
              //partidos ganados/perdidos por equipo
              $ganado += [$equipoL => 0,$equipoV => 0]; 
              $perdido += [$equipoL => 0,$equipoV => 0]; 
              $empatado += [$equipoL => 0,$equipoV => 0];
              $ganado[$equipoV] += 1;
              $perdido[$equipoL] +=1;
          }
        }
    }
    
    foreach ($resultado as $equipoL => $visitantes){
        //gol average
        $golA[$equipoL] = $golF[$equipoL]-$golC[$equipoL];
        
        $clasificacion[$equipoL] = ['puntos' => $puntos[$equipoL], 'golF' => $golF[$equipoL], 'golC' => $golC[$equipoL], 'golA' => $golA[$equipoL],
            'ganado' => $ganado[$equipoL],'empatado' => $empatado[$equipoL], 'perdido' => $perdido[$equipoL]];   
    }
    foreach ($clasificacion as $valor){
        $ordenapuntos = array_column($clasificacion, 'puntos');        
        $ordenagolA = array_column($clasificacion, 'golA');
    }
   array_multisort($ordenapuntos,SORT_NUMERIC,SORT_DESC,$ordenagolA,SORT_DESC,$clasificacion);
    
    
    echo "<div>";   
    echo "<h1>Clasificacion</h1>";
        echo "<table class='tabla' border='2'>";
        echo "<tr>";
        echo "<td class='Tfijo'>Equipos Liguilla</td><td>Puntos</td><td>G</td><td>E</td><td>P</td><td>GFavor</td><td>GContra</td><td>GAverage</td>";
        echo "</tr>";
    foreach ($clasificacion as $equipoL => $valor){        
        //creacion de las filas de la tabla
        echo "<tr>";
        echo "<td class='Tfijo'>$equipoL</td><td>{$valor['puntos']}</td><td>{$valor['ganado']}</td><td>{$valor['empatado']}</td><td>{$valor['perdido']}</td>"
        . "<td>{$valor['golF']}</td><td>{$valor['golC']}</td><td>{$valor['golA']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    
    

}
?>
