<?php require_once("header.php"); ?>
<?php if (!empty($_SESSION['message'])) { ?>
  <div class="alert alert-<?= $_SESSION['message']['color'] ?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']['mensaje'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php 
$_SESSION['message'] = array(
  );
} 
?>
<!-- Begin Page Content -->
<?php
$fechaHoy = date("Y-m-d");

// DIFERENCIA DE DIAS ENTRE DOS FECHAS
// $fechaHoy = "2022-11-08";
// $diferenciaSegundos = strtotime($fecha) - strtotime($fechaHoy);
// $diferenciaDias = $diferenciaSegundos / 86400;
// echo ($fechaHoy);
// echo ($diferenciaDias);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Visitas</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="visita_registrar_dia.php" class="btn btn-primary float-center">Registrar una visita de un cliente no registrado <i class="fas fa-plus-circle"></i></a>
            <!-- <a href=".php" class="btn btn-success float-right">Registrar un nuevo plan <i class="fas fa-plus-circle"></i></a> -->
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Foto</th>
                            <th>Matrícula</th>
                            <th>Nombre</th>
                            <th>Fecha de renovación</th>
                            <th>Plan contratado</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'vendor/autoload.php';
                        $producto = new savgym\Cliente;
                        $info_producto = $producto->mostrar();
                        foreach ($info_producto as $fila) :

                            if ($fila['plan_contratado'] == 'SIN ASIGNAR') { ?>
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
                                    <td class="text-center"><?php echo $fila['matricula']; ?></td>
                                    <td class="text-center"><?php echo $fila['nombre']; ?></td>
                                    <td class="text-center"><?php echo $fila['fecha_renovacion']; ?></td>
                                    <td class="text-center"><?php echo $fila['plan_contratado']; ?></td>
                                    <td class="text-center"><font color="white">SIN MEMBRESÍA</font></td>
                                    <td class="text-center">
                                        <a href="visita_membresia_asignar.php?id_cliente=<?php print $fila['id_cliente'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-user"></i> Asignar membresía</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                            if ($fila['plan_contratado'] != 'SIN ASIGNAR' && $fila['fecha_renovacion'] >= $fechaHoy) { ?>
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
                                    <td class="text-center"><?php echo $fila['matricula']; ?></td>
                                    <td class="text-center"><?php echo $fila['nombre']; ?></td>
                                    <td class="text-center"><?php echo $fila['fecha_renovacion']; ?></td>
                                    <td class="text-center"><?php echo $fila['plan_contratado']; ?></td>
                                    <td class="text-center"><font color="green"> MEMBRESÍA ACTIVA</font></td>
                                    <td class="text-center">
                                        <a href="visita_registrar.php?id_cliente=<?php print $fila['id_cliente'] ?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Registrar visita</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                            if ($fila['plan_contratado'] != 'SIN ASIGNAR' && $fila['fecha_renovacion'] < $fechaHoy) { ?>
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
                                    <td class="text-center"><?php echo $fila['matricula']; ?></td>
                                    <td class="text-center"><?php echo $fila['nombre']; ?></td>
                                    <td class="text-center"><?php echo $fila['fecha_renovacion']; ?></td>
                                    <td class="text-center"><?php echo $fila['plan_contratado']; ?></td>

                                    <td class="text-center"><font color="red"> MEMBRESÍA EXPIRADA</font></td>
                                    <td class="text-center">
                                        <a href="visita_membresia_asignar.php?id_cliente=<?php print $fila['id_cliente'] ?>" class="btn btn-secondary btn-sm"><i class="fas fa-sync"></i> Renovar membresía</a>
                                    </td>
                                </tr>
                            <?php } ?>
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