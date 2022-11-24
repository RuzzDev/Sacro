<?php 
session_start();
$hoy = date("Y-m-d");
require 'vendor/autoload.php';
if (isset($_GET['id_cliente']) && is_numeric($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];

    $cliente = new savgym\Producto;
    $resultado = $cliente->registrarVisita($id_cliente);

    if (!$resultado)
        $_SESSION['message'] = array(
            'mensaje' => 'La visita se ha registrado exitosamente hoy '.$hoy,
            'color' => 'primary'
        );
        header('Location: visita_index.php');
        
} else {
    $_SESSION['message'] = array(
        'mensaje' => 'La visita no se pudo registrar',
        'color' => 'danger'
    );
    header('Location: visita_index.php');
    
}
?>
