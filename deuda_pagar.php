<?php
require 'vendor/autoload.php';
session_start();
if (isset($_GET['id_venta']) && is_numeric($_GET['id_venta'])) {
    $id_venta = $_GET['id_venta'];

    $pago = new savgym\Deuda;
    $resultado = $pago->pagar($id_venta);

    if ($resultado) {
        // el estado de la deuda cambia de credito a liquidado
        $_SESSION['message'] = array(
            'mensaje' => 'El pago ha sido acreditado exitosamente',
            'color' => 'success'
        );
        header('Location: deuda_index.php');
    } else {
        $_SESSION['message'] = array(
            'mensaje' => 'Ocurrio un error al procesar el pago, contacta con el administrador',
            'color' => 'danger'
        );
        header('Location: deuda_index.php');
    }
}
