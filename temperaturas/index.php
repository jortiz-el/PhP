<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Resumen de temperaturas.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />   
</head>
<body>
<h1>Resumen de temperaturas</h1>


    
    <?php   
                    //ordena por valor el array
//                    function ordenaPorValor($array,$valor){
//                            foreach ($array as $k1 => $v2){                                
//                                foreach ($v2 as $k => $v){ 
//                                    $b[$k1] = $v2[$valor];                                     
//                                }                                 
//                            }
//                            asort($b);
//                            
//                            foreach ($b as $k => $v){
//                                $c[] = $array[$k];
//                            }                            
//                            
//                            return $c;
//                        }
        
        $ciudades = ['madrid','barcelona','sevilla','bilbao'];
        $meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
        $temps = ['tmin','tmax'];
        
        sort($ciudades);
                
        
        echo "<div>";
        echo "<table class='tabla' border='2'>";
        echo "<form action='index.php' method='GET'>";
        echo "<tr>";
        echo "<td rowspan='2'>"."</td>";
        
       foreach($meses as $mes) {
             echo "<th colspan='2'>".$mes."</th>";
        }
        echo "</tr>";
        echo "<tr>";        
        foreach($meses as $mes){
             echo "<td >".$temps[0]."</td>"."<td >".$temps[1]."</td>";
        }
        echo "</tr>";                
        foreach($ciudades as $ciudad){
             echo "<tr>"; 
             echo "<th>".$ciudad."</th>";
            foreach($meses as $mes){
                echo "<td><input type='text' name='temp[$ciudad][$mes][tmin]' maxlength='' size='2' value='4'/></td>"
                 . "<td><input type='text' name='temp[$ciudad][$mes][tmax]' maxlength='' size='2' value='25'/></td>"; 
             }
             echo "</tr>";
        }         
        echo " <input type='submit' class='submit' name='submit' value='sacar el resumen' /> ";        
        echo "</form>";
        echo "</table>";
        echo "</div>";
  
        
        if(isset($_GET['submit'])){
            
            $resumen = $_GET['temp']; 
            $temperaturas = array() ;             
                             
            
            foreach ($resumen as $ciudad => $meses){
                $min = array();
                $max = array();
                foreach ($meses as $mes){
                   $min[] = $mes['tmin'];
                   $max[] = $mes['tmax'];
                }
                $minimo = min($min);
                $maximo = max($max);
                $med = round((array_sum($min) + array_sum($max) / 24),2);
                $temperaturas[$ciudad] = ['tmin' => $minimo,'tmax' => $maximo, 'tmed' => $med]; 
            }
            foreach ($temperaturas as $city){
                $ordenaMin = array_column($temperaturas, 'tmin');
                $ordenaMax = array_column($temperaturas, 'tmax');
                $ordenaMed = array_column($temperaturas, 'tmed');
            }
            
            array_multisort($ordenaMax,SORT_NUMERIC,SORT_ASC,$ordenaMed,SORT_ASC,$ordenaMin,SORT_DESC,$temperaturas);
            
            

           // resumen con las minimas y maximas anuales
           echo "<table class='tabla' border='2'>";
           echo "<tr>";
           echo "<td></td>";
           echo "<th>Tminima</th><th>Tmaxima</th><th>Tmedia</th>";
           echo "</tr>";
           foreach ($temperaturas as $citys => $city ){               
               echo "<tr>";               
               echo "<th>$citys</th>";                 
               echo "<td>{$temperaturas[$citys]['tmin']}</td><td>{$temperaturas[$citys]['tmax']}</td><td>{$temperaturas[$citys]['tmed']}</td>";
               echo "</tr>";
            }
            echo "</table>"; 
                       
            
                      
            
            //resumen para todos los meses con su valor medio para cada mes
//                foreach ($resumen as $citys => $city){
//                echo "<table class='tabla' border='2'>";
//                echo "<tr>";
//                echo "<td rowspan='2'></td>";
//                echo "<th colspan='3'>$citys</th>";
//                echo "</tr>";
//                echo "<tr>";
//                echo "<td>Tminima</td><td>Tmaxima</td><td>Tmedia</td>";
//                echo "</tr>";                
//                  foreach ($city as $months => $month){
//                        echo "<tr>";                       
//                        echo "<th>".$months."</th>" ;
//                        foreach ($month as $temp){
//                            $media = array_sum($month)/2;                            
//                            echo "<td>".$temp."</td>";                            
//                        } 
//                        echo "<td>".$media."</td>";
//                        echo "</tr>";                        
//                    } 
//                echo "</table>"; 
//                }                  
                              
    }
        
    ?>
    </body>
</html>
