<?php
require 'vendor/autoload.php';
session_start();
$usuario = new savgym\Usuario;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Registrar') {

        $_params = array(
            'nombre' => $_POST['nombre'],
            'matricula' => $_POST['matricula'],
            'clave' => $_POST['clave'],
            'cargo' => $_POST['cargo'],
        );

        $rpt = $usuario->registrar($_params);

        if ($rpt) {
            $_SESSION['message_user_crud'] = array(
                'mensaje' => '¡Usuario Registrado Exitosamente!',
                'color' => 'success'
            );
            header('Location: usuario_index.php');
        } else {
            $_SESSION['message_user_crud'] = array(
                'mensaje' => '¡Error al actualizar el usuario! <br> Recuerda que no puedes usar una matrícula que ya exista',
                'color' => 'danger'
            );
            header('Location: usuario_index.php');
        }
    }

    if ($_POST['accion'] === 'Actualizar') {

        $_params = array(
            'nombre' => $_POST['nombre'],
            'matricula' => $_POST['matricula'],
            'clave' => $_POST['clave'],
            'cargo' => $_POST['cargo'],
            'id_usuario' => $_POST['id_usuario'],
        );

        if (!empty($_POST['foto_temp']))
            $_params['foto'] = $_POST['foto_temp'];

        if (!empty($_FILES['foto']['name']))
            $_params['foto'] = subirFoto();

        $rpt = $usuario->actualizar($_params);
        if ($rpt) {

            $_SESSION['message_user_crud'] = array(
                'mensaje' => '¡Actualización exitosa!',
                'color' => 'success'
            );
            header('Location: usuario_index.php');
        } else {
            $_SESSION['message_user_crud'] = array(
                'mensaje' => '¡Error al actualizar el usuario! <br> Recuerda que no puedes usar una matrícula  que ya exista',
                'color' => 'danger'
            );
            header('Location: usuario_index.php');
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id_usuario = $_GET['id_usuario'];
    $info_usuario = $usuario->mostrarPorIdUsuario($id_usuario);

    if ($info_usuario['estado'] == 'ALTA') {
        $rpt = $usuario->darDeBaja($id_usuario);
        if ($rpt){
            $_SESSION['message_user_crud'] = array(
                'mensaje' => '¡Haz dado de baja este usuario! <br> Ahora no podrá acceder al sistema',
                'color' => 'danger'
            );
            header('Location: usuario_index.php');
        }
        else {
            $_SESSION['message_user_crud'] = array(
                'mensaje' => '¡Error al dar de baja este usuario, contacta al administrador para dar de alta el error',
                'color' => 'danger'
            );
            header('Location: usuario_index.php');
        }
    }

    if ($info_usuario['estado'] == 'BAJA') {
        $rpt = $usuario->darDeAlta($id_usuario);
        if ($rpt){
            $_SESSION['message_user_crud'] = array(
                'mensaje' => '¡Haz dado de alta este usuario! <br> Ahora podrá acceder al sistema e interactuar con todas las funciones del cargo que tenga asignado',
                'color' => 'success'
            );
            header('Location: usuario_index.php');
        }
        else {
            $_SESSION['message_user_crud'] = array(
                'mensaje' => '¡Error al dar de alta este usuario, contacta al administrador para comunicar el error',
                'color' => 'danger'
            );
            header('Location: usuario_index.php');
        }
    }
}