<?php
require 'vendor/autoload.php';

$cliente = new savgym\Cliente;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Registrar') {

        // if (empty($_POST['precio_compra']))
        //     exit('Completar el precio de compra');

        // if (empty($_POST['precio_venta']))
        //     exit('Completar el precio de venta');

        // if (!is_numeric($_POST['stock']))
        //     exit('Selecciona una cantidad válida');


        $_params = array(
            'matricula' => $_POST['matricula'],
            'nombre' => $_POST['nombre'],
            'telefono' => $_POST['telefono'],
            'edad' => $_POST['edad'],
            'foto' => subirFoto()
            // 'fecha'=> date('Y-m-d')
        );

        $rpt = $cliente->registrar($_params);

        if ($rpt)
            header('Location: cliente_index.php');
        else
            print 'Error al registrar el nuevo cliente';
    }

    if ($_POST['accion'] === 'Actualizar') {

        // if (empty($_POST['nombre']))
        //     exit('Completar nombre');

        // if (empty($_POST['precio_compra']))
        //     exit('Completar precio_compra');

        // if (empty($_POST['precio_venta']))
        //     exit('Seleccionar una precio_venta');

        // if (!is_numeric($_POST['stock']))
        //     exit('Selecciona una cantidad válida');


        $_params = array(
            'matricula' => $_POST['matricula'],
            'nombre' => $_POST['nombre'],
            'telefono' => $_POST['telefono'],
            'edad' => $_POST['edad'],
            'id_cliente' => $_POST['id_cliente'],
        );

        if (!empty($_POST['foto_temp']))
            $_params['foto'] = $_POST['foto_temp'];

        if (!empty($_FILES['foto']['name']))
            $_params['foto'] = subirFoto();

        $rpt = $cliente->actualizar($_params);
        if ($rpt)
            header('Location: cliente_index.php');
        else
            print 'Error al actualizar el cliente';
    }
}

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {

//     $id = $_GET['id_producto'];

//     $rpt = $cliente->eliminar($id);

//     if ($rpt)
//         header('Location: cliente_index.php');
//     else
//         print 'Error al eliminar el cliente';
// }


function subirFoto()
{

    $carpeta = __DIR__ . '/../upload/';

    $archivo = $carpeta . $_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'], $archivo);

    return $_FILES['foto']['name'];
}
