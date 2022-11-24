<?php
require 'vendor/autoload.php';

$producto = new savgym\Producto;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Registrar') {

        if (empty($_POST['nombre']))
            exit('Completar nombre');

        if (empty($_POST['precio_compra']))
            exit('Completar el precio de compra');

        if (empty($_POST['precio_venta']))
            exit('Completar el precio de venta');

        if (!is_numeric($_POST['stock']))
            exit('Selecciona una cantidad válida');


        $_params = array(
            'nombre' => $_POST['nombre'],
            'precio_compra' => $_POST['precio_compra'],
            'precio_venta' => $_POST['precio_venta'],
            'stock' => $_POST['stock'],
            'foto' => subirFoto()
            // 'fecha'=> date('Y-m-d')
        );

        $rpt = $producto->registrar($_params);

        if ($rpt)
            header('Location: producto_index.php');
        else
            print 'Error al registrar un producto';
    }

    if ($_POST['accion'] === 'Actualizar') {

        if (empty($_POST['nombre']))
            exit('Completar nombre');

        if (empty($_POST['precio_compra']))
            exit('Completar precio_compra');

        if (empty($_POST['precio_venta']))
            exit('Seleccionar una precio_venta');

        if (!is_numeric($_POST['stock']))
            exit('Selecciona una cantidad válida');


        $_params = array(
            'nombre' => $_POST['nombre'],
            'precio_compra' => $_POST['precio_compra'],
            'precio_venta' => $_POST['precio_venta'],
            'stock' => $_POST['stock'],
            'id_producto' => $_POST['id_producto'],
        );

        if (!empty($_POST['foto_temp']))
            $_params['foto'] = $_POST['foto_temp'];

        if (!empty($_FILES['foto']['name']))
            $_params['foto'] = subirFoto();

        $rpt = $producto->actualizar($_params);
        if ($rpt)
            header('Location: producto_index.php');
        else
            print 'Error al actualizar el producto';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = $_GET['id_producto'];

    $rpt = $pelicula->eliminar($id);

    if ($rpt)
        header('Location: productos_index.php');
    else
        print 'Error al eliminar el producto';
}


function subirFoto()
{

    $carpeta = __DIR__ . '/../upload/';

    $archivo = $carpeta . $_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'], $archivo);

    return $_FILES['foto']['name'];
}
