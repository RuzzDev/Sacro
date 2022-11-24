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
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="cliente_index.php" class="btn btn-secondary float-right">Regresar <i class="fas fa-delete-left"></i></a>
                        <input type="hidden" name="id_cliente" value="<?php print $resultado['id_cliente'] ?>">
                        <?php
                        $foto = 'upload/' . $resultado['foto'];
                        if (file_exists($foto)) {
                        ?>
                            <img src="<?php print $foto; ?>" width="100" height="120">
                        <?php } else { ?>
                            SIN FOTO
                        <?php } ?>
                        <div class="h4 mb-0 font-weight-bold text-success"><?php print $resultado['nombre'] ?></div>
                        <div style="margin-top:20px"></div>
                        <label>Matrícula:</label>
                        <h5><?php print $resultado['matricula'] ?></h5>
                        <div style="margin-top:20px"></div>
                        <label>Fecha de renovación: </label>
                        <h5><?php print $resultado['fecha_renovacion'] ?></h5>
                        <div style="margin-top:20px"></div>
                        <label>Membresía contratada:</label>
                        <h5><?php print $resultado['plan_contratado'] ?></h5>
                        <div style="margin-top:20px"></div>
                        <label>Teléfono: </label>
                        <h5><?php print $resultado['telefono'] ?></h5>
                        <div style="margin-top:20px"></div>
                        <label>Edad: </label>
                        <h5><?php print $resultado['edad'] ?></h5>
                        
                        <div style="margin-top:45px"></div>
                        <!-- <label>Deudas</label> -->

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>