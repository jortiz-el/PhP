
    <?php
    
    require_once 'clases/Usuario.php';
    require_once 'clases/partida.php';
    require_once 'clases/Jugada.php';

    
    session_start();
    
    
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        
            if (isset($_POST['desconectar'])) {
                session_unset();
                session_destroy();
                $view = 'login';
                include ('vista/inicio.php');
            } else if (isset ($_POST['n_partida'])) {
                $partida = new partida();
                $_SESSION['partida'] = $partida;
                $partida->setId_user($usuario->getID());
                $partida->persit();
                $view = 'partida';
                include ('vista/partida.php');
            }  else if (isset ($_POST['alta'])) {
                $view = 'registro';
                include ('vista/registro.php');
            }  else if (isset ($_POST['registroform'])) {
                $conectado = $usuario->validar_usuario($_POST['usuario'], $_POST['clave'], $_POST['cod']);
                if(!$conectado){
                    $usuario->persist($_POST['usuario'], $_POST['clave'], $_POST['cod']);
                    $registrado_msg = "Registrado correctamente";
                    $view = 'conectado';
                    include ('vista/conectado.php');
                }else {
                    $registroerrmsg = "Error, Usuario ya registrado";
                    $view = 'registro';
                    include ('vista/registro.php');
                }
                
            } else if (isset ($_POST['enviar'])) {
                $partida = $_SESSION['partida'];
                $partida->setId_user($usuario->getID());
                $partida->descubrePalabra($_POST['letra']);
                $jugada = new Jugada($partida->getId(), $partida->getId_user(), $_POST['letra'], $partida->getEstado_palabra());
                $jugada->persist();
                $view = 'partida';
                include ('vista/partida.php');
            } else if (isset ($_POST['stop'])) {
                $partida = $_SESSION['partida'];
                $persit = $partida->persit();
                unset($_SESSION['partida']);
                $view = 'conectado';
                include ('vista/conectado.php');
            } else if (isset ($_POST['recuperar'])) {
                $partida = partida::getPartida($_POST['partida_ini']);
                $_SESSION['partida'] = $partida;
                $view = 'partida';
                include ('vista/partida.php');
            } else if (isset ($_POST["resumenxml"])) {
                $partidas = $_POST['partida_fin'];
                $partidaxml = [];
                foreach ($partidas as $k => $id_partida) {
                    $partidaxml[$k] = Jugada::getJugadas($id_partida);
                }
                $view = 'resumen';
                include ('vista/resumen.php');
            } else {
                if (isset($_SESSION['partida'])){
                $partida = $_SESSION['partida'];   
                $view = 'partida';
                include ('vista/partida.php');
                } else {
                $view = 'conectado';
                include ('vista/conectado.php');
                }
            }
        
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
    } else {
        $view = 'login';
        include ('vista/inicio.php');
    }
    
?>
