<?php require_once("header.php"); ?>

<?php
require 'vendor/autoload.php';

if (isset($_GET['id_cliente']) && is_numeric($_GET['id_cliente'])) {
    $id_membresia = $_GET['id_cliente'];

    $producto = new savgym\Cliente;
    $resultado = $producto->mostrarPorId($id_membresia);

    if (!$resultado)
        header('Location: index.php');
} else {
    header('Location: index.php');
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Default Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <form method="POST" action="visita_membresia_acciones.php" enctype="multipart/form-data">
                            <input type="hidden" name="id_cliente" value="<?php print $resultado['id_cliente'] ?>">
                            <?php
                            $foto = 'upload/' . $resultado['foto'];
                            if (file_exists($foto)) {
                            ?>
                                <img src="<?php print $foto; ?>" width="100" height="120">
                            <?php } else { ?>
                                SIN FOTO
                            <?php } ?>
                            <div class="h5 mb-0 font-weight-bold text-primary"><?php print $resultado['nombre'] ?></div>
                            <div style="margin-top:20px"></div>
                            <label>Fecha de renovación:</label>
                            <input class="custom-select" type="date" id="start" name="fecha_renovacion" min="2020-01-01" max="2035-12-31" required>
                            <div style="margin-top:20px"></div>
                            <label>Selecciona el plan de suscripción: </label>
                            <select class="custom-select" name="plan" required>
                                <?php
                                $trabajador = new savgym\Producto;
                                $resultado_trabajador = $trabajador->mostrarMembresia();
                                foreach ($resultado_trabajador as $fila) : ?>
                                    <option value="<?php print $fila['id_producto'] ?>"><?php print $fila['precio_venta'] ?> --- <?php print $fila['nombre'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <div style="margin-top:35px"></div>
                            <input type="submit" name="accion" class="btn btn-primary" value="Actualizar Membresia">
                            <a href="visita_index.php" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>