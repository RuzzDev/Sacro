<?php require_once("header.php"); ?>
<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cliente</h1>
    <p class="mb-4">Desde aquí puedes registrar a tus clientes para poder realizar operaciones a su
        nombre, desde aquí puedes modificar sus datos y darlos de baja cuando lo 
        requieras.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary float-left">Lista de Clientes</h3>
            <a href="cliente_registro.php" class="btn btn-primary float-right">Agregar un registro <i class="fas fa-plus-circle"></i></a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Foto</th>
                            <th>Matrícula</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Edad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'vendor/autoload.php';
                        $producto = new savgym\Cliente;
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
                                <td><?php echo $fila['matricula']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>
                                <td><?php echo $fila['edad']; ?></td>
                                <td class="text-center">
                                    <!-- <a href="cliente_acciones.php?id_cliente=<?php print $fila['id_cliente'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Baja</a> -->
                                    <a href="cliente_actualizar.php?id_cliente=<?php print $fila['id_cliente']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="cliente_visualizar.php?id_cliente=<?php print $fila['id_cliente']  ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
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