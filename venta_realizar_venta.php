<?php
session_start();
require 'venta_funciones.php';
require 'vendor/autoload.php';

if (isset($_POST['accion_vender'])) {

    $id_cliente = $_POST['id_cliente'];
    $estado = $_POST["tipo_venta"];
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        $c = 0;
        $totalProductos = cantidadProductos();
        $producto = 0;
        foreach ($_SESSION['carrito'] as $indice => $value) {
            $c++;
            if ($value['stock'] >= ($value['cantidad'])) {
                $producto++;
            }
        }

        if ($producto == $totalProductos) {
            $k = 0;
            foreach ($_SESSION['carrito'] as $indice => $value) {
                $k++;
                $prestamo = new savgym\Producto;
                $nueva_existencia = ($value['stock']) - ($value['cantidad']);

                $_params = array(
                    "id_producto" => $value['id'],
                    "nueva_existencia" => $nueva_existencia
                );
                $_params1 = array(
                    "id_usuario" => $_SESSION['usuario_info']['id_usuario'],
                    "id_cliente" => $id_cliente,
                    "id_producto" => $value['id'],
                    "cantidad" => $value['cantidad'],
                    "total" => $value['precio'] * $value['cantidad'],
                    "estado" => $estado,
                );
                $rpt = $prestamo->realizarVenta($_params, $_params1);
            }
         
            // VENTA APROVADA 
            // echo (" Esta venta está aprovado");
            $_SESSION['message'] = array(
                'mensaje' => 'La venta ha sido efectuada exitosamente',
                'color' => 'success'
            );
            $_SESSION['carrito'] = array();
            header('Location: venta_index.php');
        } else {
            // PRESTAMO NO APROVADO POR LA CANTIDAD DE EXISTENCIAS
            // echo ("Al chile no te alcanza el stock");
            $_SESSION['message'] = array(
                'mensaje' => 'La cantidad de existencias de uno o más productos no es suficiente, por favor verifica las cantidades e intenta de nuevo. En caso de que el problema persista contacta con el administrador',
                'color' => 'danger'
            );
            header('Location: venta_index.php');
        }
    }
}
