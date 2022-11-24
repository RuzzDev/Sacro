<?php require_once("header.php"); ?>
<!-- validacion de inicio de sesion y usarios -->
<?php
if (!isset($_SESSION['usuario_info']) or empty($_SESSION['usuario_info'])) {
    echo '<script type="text/javascript"> window.location.href = "index.php"; </script>';
} else {
    $cargo_usuario = $_SESSION['usuario_info']['cargo'];
    if ($cargo_usuario == 'RECEPCIONISTA') {
        echo '<script type="text/javascript"> window.location.href = "error.php"; </script>';
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Productos</h1>
    <p class="mb-4">
        Como administrador puedes tener total control sobre tu inventario para que un trabajador pueda realizar operaciones a su
        nombre, desde aquí puedes modificar los datos de tus productos y actualizar el stock cuando lo necesites.
    </p>

    <!-- <?php
            // if($_SESSION['usuario_info']['cargo'] != 'administrador'){
            //     
            ?>

//     <h1>No puedes hacer eso puta</h1>
//     <?php
        // }
        // else {
        ?> 
-->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary float-left">Inventario de productos</h3>
            <a href="producto_registro.php" class="btn btn-primary float-right">Agregar un producto <i class="fas fa-plus-circle"></i></a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Foto</th>
                            <th>Nombre</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Stock</th>
                            <th>Accciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'vendor/autoload.php';
                        $producto = new savgym\Producto;
                        $info_producto = $producto->mostrar();
                        foreach ($info_producto as $fila) : ?>
                            <tr>
                                <td class="text-center">
                                    <?php
                                    $foto = 'upload/' . $fila['foto'];
                                    if (file_exists($foto)) {
                                    ?>
                                        <img src="<?php print $foto; ?>" width="80" height="100">
                                    <?php } else { ?>
                                        SIN FOTO
                                    <?php } ?>
                                </td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['precio_compra']; ?></td>
                                <td><?php echo $fila['precio_venta']; ?></td>
                                <td><?php echo $fila['stock']; ?></td>
                                <td class="text-center">
                                    <a href="producto_actualizar.php?id_producto=<?php print $fila['id_producto']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php
                        endforeach
                        ?>
                    </tbody>
                </table>
                <?php
                // }
                ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>