<?php
    if ($view !== 'conectado') {
       header('Location: /');
    } else {
        $view = '';
    }   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Juego del Ahorcado</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="../css/CascadeStyleSheet.css" media="screen" />   
</head>
<body>
    <div class="conectado"> 
        <h1>Conectado</h1>
        <?php 
            if (isset($registrado_msg)){
                echo "<h2>$registrado_msg</h2>";
            }
        ?>
        <h2><?php echo "Jugador: ".$usuario->getUsuario()?></h2>
            <form action="/" method="post">
                <input type="submit" class="submit" name="desconectar" value="Desconectar" />
                    <input type="submit" class="submit" name="n_partida" value="nueva Partida" />
                    <?php
                    if($usuario->getCod() == 1){ ?>
                    <input type="submit" class="submit" name="alta" value="Alta Usuario" />
                    <?php
                    }
                    ?>
            </form><br> 
        
        <?php 
            $partidas_iniciadas = partida::getPendientes($usuario->getID());
            if (!$partidas_iniciadas->isEmpty()){
               echo "<h1>Partidas pendientes</h1>";
               $actual = $partidas_iniciadas->iterate();
               echo "<form action='/' method='post'>";
               echo "<div class='radios'>";
               while ($actual) {
                   $numeroPartida = $partidas_iniciadas->getCurrent()->getId();
                   echo "<label>Partida_$numeroPartida</label>";
                   echo "<input type='radio' name='partida_ini' value='$numeroPartida' checked></input><br>";
                   $actual = $partidas_iniciadas->iterate();
               }
               echo "</div>";
               echo "<input type='submit' class='submit' name='recuperar' value='recuperar'></input><br>";
               echo "</form>";
            }
            $partidas_acabadas = partida::getFinalizadas($usuario->getID());
            if (!$partidas_acabadas->isEmpty()){
               echo "<h1>Historico partidas</h1>";
               $actual = $partidas_acabadas->iterate();
               echo "<form action='/' method='post'>";
               echo "<div class='checks'>";
               while ($actual) {
                   $numeroPartida = $partidas_acabadas->getCurrent()->getId();
                   echo "<label>Partida_$numeroPartida</label>";
                   echo "<input type='checkbox' name='partida_fin[$numeroPartida]' value='$numeroPartida'></input><br>";
                   $actual = $partidas_acabadas->iterate();
               }
               echo "</div>";
               echo "<input type='submit' class='submit' name='resumenxml' value='ver resumen'></input><br>";
               echo "</form>";
            }
        ?>
        
        
    </div>      
</body>
</html>   