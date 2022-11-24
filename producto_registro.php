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
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>Datos del Producto</legend>
                <form method="POST" action="producto_acciones.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Precio de Compra</label>
                                <input type="text" class="form-control" name="precio_compra" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Precio de Venta</label>
                                <input type="text" class="form-control" name="precio_venta" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" class="form-control" name="stock" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="accion" class="btn btn-primary" value="Registrar">
                    <a href="producto_index.php" class="btn btn-danger">Cancelar</a>
                </form>
            </fieldset>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>