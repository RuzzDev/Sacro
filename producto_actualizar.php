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

<?php
require 'vendor/autoload.php';

if (isset($_GET['id_producto']) && is_numeric($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];

    $producto = new savgym\Producto;
    $resultado = $producto->mostrarPorId($id_producto);

    if (!$resultado)
        header('Location: index.php');
} else {
    header('Location: index.php');
}
?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>Datos del Producto</legend>
                <form method="POST" action="producto_acciones.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_producto" value="<?php print $resultado['id_producto'] ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto">
                                <input type="hidden" name="foto_temp" value="<?php print $resultado['foto'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input value="<?php print $resultado['nombre'] ?>" type="text" class="form-control" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Precio de Compra</label>
                                <input value="<?php print $resultado['precio_compra'] ?>" type="text" class="form-control" name="precio_compra" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Precio de Venta</label>
                                <input value="<?php print $resultado['precio_venta'] ?>" type="text" class="form-control" name="precio_venta" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Stock</label>
                                <input value="<?php print $resultado['stock'] ?>" type="text" class="form-control" name="stock" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>
                    

                    <input type="submit" class="btn btn-primary" name="accion" value="Actualizar">
                    <a href="producto_index.php" class="btn btn-default">Cancelar</a>
                </form>
            </fieldset>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>


<!-- End of Main Content -->
<?php require_once("footer.php"); ?>