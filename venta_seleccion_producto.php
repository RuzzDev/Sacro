<?php require_once("header.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div style="margin-top:20px"></div>
        <div class="col-md-12">
            <div>
                <a href="venta_index.php" class="btn btn-primary float-right">Realizar Venta <i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
        <!-- tabla productos -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Accciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'vendor/autoload.php';
                        $venta = new savgym\Producto;
                        $info_producto = $venta->mostrar();
                        foreach ($info_producto as $fila) :

                            if ($fila['stock'] >= 1) { ?>


                                <tr>
                                    <td class="text-center">
                                        <?php
                                        $foto = 'upload/' . $fila['foto'];
                                        if (file_exists($foto)) {
                                        ?>
                                            <img src="<?php print $foto; ?>" width="100" height="100">
                                        <?php } else { ?>
                                            SIN FOTO
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $fila['nombre']; ?></td>
                                    <td><?php echo $fila['precio_venta']; ?></td>
                                    <td><?php echo $fila['stock']; ?></td>
                                    <td class="text-center">
                                        <a href="venta_index.php?id=<?php print $fila['id_producto'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Añadir</a>
                                    </td>
                                </tr>
                            <?php
                            }

                            if ($fila['stock'] == 0) { ?>
                                <tr class='bgcolor-red'>
                                    <td class="text-center">
                                        <?php
                                        $foto = 'upload/' . $fila['foto'];
                                        if (file_exists($foto)) {
                                        ?>
                                            <img src="<?php print $foto; ?>" width="100" height="100">
                                        <?php } else { ?>
                                            SIN FOTO
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <font color="white"><?php echo $fila['nombre']; ?></font>
                                    </td>
                                    <td>
                                        <font color="white"><?php echo $fila['precio_venta']; ?></font>
                                    </td>

                                    <td>
                                        <font color="white"><?php echo $fila['stock']; ?></font>
                                    </td>
                                    <td class="text-center">
                                        <font color="white">Sin Stock</font>
                                    </td>
                                </tr>
                        <?php
                            }
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
    <!-- end tabla productos -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>