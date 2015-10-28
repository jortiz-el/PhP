<?php

if (isset($_POST['submit'])){
            
            $jugadas = $_POST['casilla'];
            $tabla = $_POST['tabla'];
            
            //descodificar el array tabla enviado por formulario
            function array_recibe($cod_array){
                $tmp = stripslashes($cod_array);
                $tmp = urldecode($tmp);
                $tmp = unserialize($tmp);
                
                return $tmp;
            }
            
            $tabla = array_recibe($tabla);
            
            
            //mostrar resultados
            include ('vistas/resultado.php');
            
            
            
            
            
        }