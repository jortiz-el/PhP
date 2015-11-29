<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
       <title>Juego de conecta 4.</title> 
       <meta charset="UTF-8" />
       <link rel="stylesheet" type="text/css" href="css/CascadeStyleSheet.css" media="screen" /> 
       <script type="text/javascript" src="js/js.js"></script>
    </head>
    <body>
        <div>
          <h1>Juego de conecta 4</h1>
          <h3>Sigue jugando</h3>
          <form action='compruebaGanador.php' method='post'>
             <?php
             
                include('vistas/tabla.php');
          
             ?>
            <input type='submit' name='submit' class='submit' value='jugar'/>
           </form>  
        </div> 
    </body>
</html>