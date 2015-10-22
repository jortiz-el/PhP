<?php

if (isset($_POST['submit'])) {
$jugadas = $_POST['jugadas'];
    //inicializar array 
   for ($i = 0; $i < 49; $i++) {
       if (isset($jugadas[$i])){
          $jugadas[$i] = $jugadas[$i];
       }else {
           $jugadas[$i] = '';
       }
   }
   //recorro array comprobando si hay ficha mal colocada del jugador
   for ($i = 0; $i < 49; $i++) {
       if ($jugadas[$i] == 1){
           if (isset($jugadas[$i+7]) && $jugadas[$i+7] === ''){
              $jugadas[$i] = ''; 
              while (isset($jugadas[$i+7]) && $jugadas[$i+7] === ''){
                $i = $i+7; 
              }
              $jugadas[$i] = 1; 
            }
       }
   }
   
   
   //var_dump($jugadas);
   include ('compruebaGanador.php');

}
?>

<table class="tabla">
<?php 
    $imgJugador = 'img/rojo.png';
    $imgMaquina = 'img/amarillo.png';
    for ($i = 0; $i < 7; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            $pos = $i * 7 + $j;
            if (isset($jugadas[$pos])) {
                if ($jugadas[$pos] == 1) {
                    $valor = $jugadas[$pos];
                    echo "<td id='jugadas$pos'>";
                    echo "<img src='$imgJugador'>";
                    echo "<input type='hidden' name='jugadas[$pos]' value='$valor' />";
                    echo "</td>";
                }else if ($jugadas[$pos] == 5) {
                    $valor = $jugadas[$pos];
                    echo "<td id='jugadas$pos'>";
                    echo "<img src='$imgMaquina'>";
                    echo "<input type='hidden' name='jugadas[$pos]' value='$valor' />";
                    echo "</td>";
                }else {
                echo "<td id='jugadas$pos' onclick='colocar(this)'></td>";
            }
            }else {
                echo "<td id='jugadas$pos' onclick='colocar(this)'></td>";
            }
            
        }
        echo '</tr>';
    }
  ?>
</table>
