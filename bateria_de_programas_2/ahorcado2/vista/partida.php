<?php
    if ($view !== 'partida') {
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
    <div class="partida"> 
        <h1>Juego Ahorcado</h1> 
        <h2><?php echo "Jugador: ".$usuario->getUsuario()?></h2>
            <form action="/" method="post">
                <input type="submit" class="submit" name="desconectar" value="Desconectar" />
            </form>
        <div>
            <div id="secreta">
                <?php 
                if ($partida->getFallos() == 8){?>
                    <h1>Lo siento has perdido!</h1>
                    <h2>Palabra Secreta</h2>
                    <p><?php echo $partida->getPalabra_secreta()?></p>
                <?php
                }else if ($partida->esFin()) {?>
                    <h1>Enhorabuena has ganado!</h1>
                    <h2>Palabra Secreta</h2>
                    <p><?php echo $partida->getPalabra_secreta()?></p>  
                <?php
                }else { ?>
                    <h2>Palabra Secreta</h2>
                    <p><?php echo $partida->getEstado_palabra()?></p>
                <?php
                }
                ?>
                <h2>Letras Usadas</h2>
                <p><?php echo $partida->getLetras_usadas()?></p>
                <h2>Nº intentos</h2>
                <p><?php echo $partida->getIntentos()?></p>

            </div>
            <div id="imagen">
                <img src="../img/ahorcado<?php echo $partida->getFallos()?>.png"></img>
            </div>
        </div>
        <div>
            <form action="/" method="post">
                <label>Letra</label>
                <input type="text" name="letra" size="1" maxlength="1" />
                <input type="submit" class="submit" name="stop" value="stop" />
                <?php 
                if (($partida->getFallos() != 8) && !($partida->esFin())){?>
                <input type="submit" class="submit" name="enviar" value="enviar" />
                <?php
                }
                ?>
                
            </form>

        </div>
    </div>      
</body>
</html>   