<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Tablas de multiplicar.</title> 
   <meta charset="UTF-8" />
   <link rel="stylesheet" type="text/css" href="CascadeStyleSheet.css" media="screen" />
   
</head>
<body>
<h1>Tablas de multiplicar</h1>
<h3>Escribe una secuencia de numeros deparado por "," o "-" y te diré la tabla de multiplicar.</h3>
<form action="#" method="post">
   <p>Escribe aquí los números: <input type="text" name="num" maxlength="10" size="10" /></p>
   <p><input type="submit" class="submit" name="submit" value="Ver tablas de multiplicar." /></p>
</form>
<form action="index.php" method="post">      
    <p><input type="submit" class="submit" name="submit2" value="volver a tablas simples " /></p>
</form>
<?php  

if (isset($_POST['submit'])){
$secPaginasOriginal = $_POST['num'];
$secPaginas;
$items = explode(",", $secPaginasOriginal);
$valores = array();//array vacio para comprobar numeros repetidos

for ($i=0;$i<count($items);$i++){
    //si se trata de un rango
    if (strpos($items[$i], "-")){//si encuentro la primera ocurrencia -
        $rango = explode("-", $items[$i]);
        $rangoCompleto = range($rango[0], $rango[1]);//crea un aray que contiene un rango de elementos        
        //uno los elementos del array en un string separado por comas
        $items[$i] = implode(",", $rangoCompleto);        
    }    
}

$secPagina = implode(",", $items);
$ordenado = explode(",", $secPagina);//ordenamiento de array
sort($ordenado);
$secPaginas = implode(",", $ordenado);
//saco un token cada vez que encuentro una coma
 
$pagina = strtok($secPaginas, ",");

while ($pagina !== false){
    
    if ($pagina<1 || $pagina>9){
        $pagina = strtok(",");
    }else{
        //comprobar si el numero esta repetido en el array
        if (!in_array($pagina, $valores)){
            array_push($valores, $pagina);
            
            tablaMultiplicar($pagina);
            $pagina = strtok(",");
        }else{
            //accedo al siguiente elemento de la secuencia  
            $pagina = strtok(",");
        }
    }             
  }
}
?>
</body>
</html>



<?php
    //funcion para generar la tabla de multiplicar
    function tablaMultiplicar($n){
        echo "<h2>Tabla del $n:</h2>";
     $i = 1;
     echo "<table class='tabla' border='2'>";
     while ($i <= 10) {
           echo "<tr>";
           echo "<td class='fila_".$i%2 ."'>$n x $i</td><td class='fila_".$i%2 ."'> = </td><td class='fila_".$i%2 ."'>".$n*$i."</td>";           
           $i++;
           }
      echo "</table>";
    } 
    
?>

