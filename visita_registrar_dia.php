<?php 
session_start();
$hoy = date("Y-m-d");

require 'vendor/autoload.php';
    $cliente = new savgym\Visita;
    $resultado = $cliente->registrarVisitaDia();

    if (!$resultado)
    {
        $_SESSION['message'] = array(
        'mensaje' => 'La visita se ha registrado exitosamente hoy '.$hoy. ' a la hora actual, no olvides cobrar la entrada de $40',
        'color' => 'warning'
        );
        header('Location: visita_index.php');
        
    } 
    else 
    {
    $_SESSION['message'] = array(
        'mensaje' => 'La visita no se pudo registrar',
        'color' => 'danger'
    );
    header('Location: visita_index.php');
    }
?>