

<table class="tabla">
<?php 
    $imgJugador = 'img/x.png';
    $imgMaquina = 'img/o.png';
    for ($i = 0; $i < 3; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 3; $j++) {
            $pos = $i * 3 + $j;
            if (isset($jugadas[$pos])) {
                if ($jugadas[$pos] == 1) {
                    $valor = $jugadas[$pos];
                    echo "<td id='jugadas$pos'>";
                    echo "<img src='$imgJugador'>";
                    echo "<input type='hidden' name='jugadas[$pos]' value='$valor' />";
                    echo "</td>";
                }else if ($jugadas[$pos] == 3) {
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
