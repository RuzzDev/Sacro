<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = $_POST['nombre'];
    $clave = $_POST['clave'];

    require 'vendor/autoload.php';
    $usuario = new savgym\Usuario;
    $resultado = $usuario->mostrarPorId($matricula, $clave);

    if ($resultado) {

        session_start();

        $_SESSION['usuario_info'] = array(
            'id_usuario' => $resultado['id_usuario'],
            'matricula' => $resultado['matricula'],
            'nombre_usuario' => $resultado['nombre'],
            'cargo' => $resultado['cargo'],
            'estado' => $resultado['estado'],

        );
        if ($_SESSION['usuario_info']['estado'] != 'ALTA') {
            
            $_SESSION['usuario_info'] = array();
            session_destroy();
            
            exit(json_encode(array('estado' => FALSE, 'mensaje' => 'Tu usuario ha sido dado de baja por un administrador')));
            
        } else {
            header('Location: dashboard.php');
        }
    } else {
        exit(json_encode(array('estado' => FALSE, 'mensaje' => 'Error al iniciar sesion')));
    }
}
