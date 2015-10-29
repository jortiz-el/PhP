<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
       <title>Juego de 3 en raya.</title> 
       <meta charset="UTF-8" />
       <link rel="stylesheet" type="text/css" href="css/CascadeStyleSheet.css" media="screen" /> 
       <script type="text/javascript" src="js/js.js"></script>
    </head>
    <body>
        <div>
         <?php
         $estado = 0; 
         if (isset($_POST['submit'])) {
            $jugadas = $_POST['jugadas']; 
            for ($i = 0; $i < 9; $i++) {
                if (isset($jugadas[$i])){
                   $jugadas[$i] = $jugadas[$i];
                }else {
                    $jugadas[$i] = '';
                }
            }
            //var_dump($jugadas);
            include ('compruebaGanador.php');
         }
            
           if ($estado === 0){
               include ("introduceJugada.php");
           } else if ($estado === 2){
               include ("ganadormaquina.php");
           } else if ($estado === 1) {
               include ("ganadorJugador.php");
           } else {
               include ("empate.php");
           }
            
        
           ?>
        </div> 
    </body>
</html>
