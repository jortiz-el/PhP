<html>
    <head></head>
    <body>
        <?php

        $array = ['azul' => [5,7,6],'verde' => [3,5],'amarillo' => [8,4,7,3,2,1],'rojo' => [1,2]];

        foreach ($array as $key => $valor){

            echo "La latquilla de color $key tiene el valor ";
            foreach ($valor as $num){

                echo "$num ";        
            }
            echo "<br>";

        }

        ?>
    </body>
</html>


