
    <?php
    
    session_start();
    
    if (!isset($_SESSION['vista'])) {
       $_SESSION['vista'] = ''; 
    }
    
    if (isset($_POST['submit'])) {
        
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['clave'] = $_POST['contrasenia'];
   
    
    $dsn = "mysql:host=localhost;dbname=login";
    $username = 'admin';
    $passwd = 'admin';
    
    try {
        $conexion = new PDO($dsn, $username, $passwd);
            } catch (PDOException $e) {
        echo "error: ".$e->getMessage();
    }
        $consulta = $conexion->prepare("select * from login");
        $consulta->execute(); 
        $salida = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach ($salida as $row) {
            if($row['usuario'] == $_SESSION['usuario'] && $row['clave'] == $_SESSION['clave']) {
                $_SESSION['vista'] = 'conectado';
            } 
            if ($_SESSION['vista'] != 'conectado') {
                $_SESSION['vista'] = 'error'; 
            }
        }
    }
    if (isset($_POST['submit2'])) {
        session_unset();
        session_destroy();
    }
    
    if (isset($_SESSION['vista'])) {
        if ($_SESSION['vista'] == 'conectado') {
            include 'vista/conectado.php';
        } else if ($_SESSION['vista'] == 'error') {
           echo "<h1>error autenticacion</h1>";
            include 'vista/inicio.php';
        } else {
           include 'vista/inicio.php'; 
        }
    } else {
        include 'vista/inicio.php';
    }
       
    ?>
