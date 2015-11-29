
    <?php
    
    session_start();
    include ('clases/Db.php');
    include ('clases/Usuario.php');
    
    if (!isset($_SESSION['vista'])) {
       $_SESSION['vista'] = ''; 
    }
   


    /*boton conectar con usuario valido*/
    if (isset($_POST['submit'])) {
        
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['clave'] = $_POST['contrasenia'];
   
        $cliente = new Usuario($_SESSION['usuario'], $_SESSION['clave']);
        $valido = $cliente->validar_usuario($_SESSION['usuario'], $_SESSION['clave']);
        
        if ($valido) {
            $_SESSION['pintor'] = $valido->getPintor();
            $_SESSION['email'] = $valido->getEmail();
            $_SESSION['vista'] = 'conectado';
        } else {
            $_SESSION['vista'] = 'error';
        }
    }
    /*boton desconectar */
    if (isset($_POST['submit2'])) {
        session_unset();
        session_destroy();
    }
    /*boton para cambio de vista entre inicio y registro*/
    if (isset($_POST['submit3'])) {
        if ($_SESSION['vista'] == '') {
            $_SESSION['vista'] = 'registro';
        } else {
            $_SESSION['vista'] = '';
        }
    }
    /*boton de registro nuevo usuario*/
    if (isset($_POST['submit4'])) {
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['contrasenia'];
        $email = $_POST['email'];
        $pintor = $_POST['pintor'];

        $cliente = new Usuario($usuario, $clave, $email, $pintor);
        /*si no hay una sesion usuario hara registro si no update*/
        if (!isset($_SESSION['usuario'])){
            
            if (!$cliente->validar_usuario($usuario, $clave)) {
                $cliente->registrar_usuario($usuario, $clave, $email, $pintor);
                $_SESSION['vista'] = '';
            } else {
                $_SESSION['vista'] = 'registro';
            } 
        } else {
            $valido = $cliente->validar_usuario($_SESSION['usuario'], $_SESSION['clave']);
            $valido->update($usuario, $clave, $email, $pintor);
            $_SESSION['pintor'] = $pintor;
            $_SESSION['email'] = $email;
            $_SESSION['vista'] = 'conectado';
        }
        
    }
    /*boton dar de baja usuario*/
    if (isset($_POST['submit5'])) {
        $cliente = new Usuario($_SESSION['usuario'], $_SESSION['clave']);
        $valido = $cliente->validar_usuario($_SESSION['usuario'], $_SESSION['clave']);
        $valido->delete();
        session_unset();
        $_SESSION['vista'] = 'borrado';
    }
    /*boton update usuario*/
    if (isset($_POST['submit6'])) {
        if ($_SESSION['vista'] == 'conectado') {
            $_SESSION['vista'] = 'update';
        } else {
            $_SESSION['vista'] = 'conectado';
        }
    }
    
    if (isset($_SESSION['vista'])) {
        if ($_SESSION['vista'] == 'conectado') {
            include 'vista/conectado.php';
        } else if ($_SESSION['vista'] == 'error') {
            include 'vista/inicio.php';
            echo "<h1 class='rojo'>error autenticacion</h1>";
        } else if ($_SESSION['vista'] == 'registro') {
            include 'vista/registro.php';
        } else if ($_SESSION['vista'] == 'update') {
            include 'vista/update.php';
        } else if ($_SESSION['vista'] == 'borrado') {
            include 'vista/inicio.php';
            echo "<h1 class='rojo'>Usuario eliminado</h1>";
        } else {
           include 'vista/inicio.php'; 
        }
    } else {
        include 'vista/inicio.php';
    }
       
    ?>
