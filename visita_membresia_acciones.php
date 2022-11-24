<?php
require 'vendor/autoload.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Actualizar Membresia') {

        $plan = new savgym\Producto;
        $resultado_plan = $plan->mostrarMembresiaPorId($_POST['plan']);

        $_params = array(
            "id_cliente" => $_POST['id_cliente'],
            "fecha_renovacion" => $_POST['fecha_renovacion'],
            "plan_contratado" => $resultado_plan['nombre']
        );
        $_params1 = array(
            "id_usuario" => $_SESSION['usuario_info']['id_usuario'],
            "id_cliente" => $_POST['id_cliente'],
            "id_producto" => $resultado_plan['id_producto'],
            "cantidad" => 1,
            "total" => $resultado_plan['precio_venta'],
            "estado" => "contado"
        );
        $rpt = $plan->asignarMembresia($_params, $_params1);
        // MEMBRESÍA ASIGNADA 
        $_SESSION['message'] = array(
            'mensaje' => 'La membresía ha sido asignada exitosamente',
            'color' => 'success'
        );
        header('Location: visita_index.php');
    }
}

