<?php require_once("header.php"); ?>
<!-- Begin Page Content -->

<?php
require 'vendor/autoload.php';

if (isset($_GET['id_cliente']) && is_numeric($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];

    $cliente = new savgym\Cliente;
    $resultado = $cliente->mostrarPorId($id_cliente);

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
                <legend>Datos del Cliente</legend>
                <form method="POST" action="cliente_acciones.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_cliente" value="<?php print $resultado['id_cliente'] ?>">
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
                                <label>Matrícula</label>
                                <input value="<?php print $resultado['matricula'] ?>" type="text" class="form-control" name="matricula" required>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input value="<?php print $resultado['telefono'] ?>" type="text" class="form-control" name="telefono" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Edad</label>
                                <input value="<?php print $resultado['edad'] ?>" type="text" class="form-control" name="edad" >
                            </div>
                        </div>
                    </div>                    

                    <input type="submit" class="btn btn-primary" name="accion" value="Actualizar">
                    <a href="cliente_index.php" class="btn btn-danger">Cancelar</a>
                </form>
            </fieldset>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>


<!-- End of Main Content -->
<?php require_once("footer.php"); ?>