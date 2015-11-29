
    <?php
    
    require_once 'clases/Usuario.php';
    require_once 'clases/Pintor.php';
    
    session_start();
    
    
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        if (isset($_POST['desconectar'])) {
            session_unset();
            session_destroy();
            $view = 'login';
            include ('vista/inicio.php');
        } else if (isset ($_POST['modificar'])) {
            $view = 'update';
            include ('vista/update.php');
        } else if (isset ($_POST['update'])) {
            $usuario_mod = new Usuario($_POST['usuario'], $_POST['contrasenia'], $_POST['email'], $_POST['pintor'], $usuario->getId());
            $usuario = $usuario_mod->persist();
            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                $view = 'conectado';
                include ('vista/conectado.php');
            } else {
                $updateerrmsg = "Update invalido";
                $view = 'update';
                include ('vista/update.php');;
            }
        } else if (isset ($_POST['baja'])) {
            $usuario->delete();
            $eliminadomsg = "Usuario eliminado";
            $view = 'login';
            include ('vista/inicio.php');
        } else {
            $view = 'conectado';
            include ('vista/conectado.php');
        }
        
    } else if (empty ($_POST)) {
        $view = 'login';
        include ('vista/inicio.php');
        
    } else if (isset($_POST['conectar'])) {
        $usuario = Usuario::validar_usuario($_POST['usuario'], $_POST['contrasenia']);
        if ($usuario) {
            
            $_SESSION['usuario'] = $usuario;
            $view = 'conectado';
            include ('vista/conectado.php');
        } else {
            $_SESSION['error'] = TRUE;
            $view = 'login';
            include ('vista/inicio.php');
        }
    } else if (isset($_POST['registro'])) {
        $view = 'registro';
        include ('vista/registro.php');
           
    } else if (isset($_POST['registroform'])) {
        $usuario = new Usuario($_POST['usuario'], $_POST['contrasenia'], $_POST['email'], $_POST['pintor']);
        $obj = $usuario->persist();
        if ($obj) {
            $_SESSION['usuario'] = $obj;
            $usuario = $_SESSION['usuario'];
            $view = 'conectado';
            include ('vista/conectado.php');
        } else {
            $registroerrmsg = "Registro invalido";
            $view = 'registro';
            include ('vista/registro.php');
        }
           
    } else {
        include ('vista/inicio.php');
    }
    
?>
