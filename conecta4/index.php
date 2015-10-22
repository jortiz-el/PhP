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
         <?php
         
            echo "<h1>Juego de conecta 4</h1>";
            echo "<form action='#' method='post'>";
                
                include('tabla.php');
               
            echo "<input type='submit' name='submit' class='submit' value='jugar'/>";
            echo "</form> ";
        
           ?>
        </div> 
    </body>
</html>
