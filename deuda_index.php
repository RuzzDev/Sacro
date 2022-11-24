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

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Deudas</h1>
    <p class="mb-4">Desde aquí puedes observar todos los pagos pendientes de tus clientes.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary float-left">Lista de Adeudos</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>VENDIDO POR</th>
                            <th>VENDIDO A</th>
                            <th>PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>TOTAL</th>
                            <th>PAGAR</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        require 'vendor/autoload.php';
                        $deuda = new savgym\Deuda;
                        $info_deuda = $deuda->mostrar();
                        foreach ($info_deuda as $fila) : ?>
                            <tr>
                                <?php
                                $cliente = new savgym\Usuario;
                                $info_cliente = $cliente->mostrarPorIdUsuario($fila['id_usuario']);
                                ?>
                                <td><?php echo $info_cliente['nombre']; ?></td>
                                <?php
                                $cliente = new savgym\Cliente;
                                $info_cliente = $cliente->mostrarPorId($fila['id_cliente']);
                                ?>
                                <td><?php echo $info_cliente['nombre']; ?></td>
                                <?php
                                $cliente = new savgym\Producto;
                                $info_cliente = $cliente->mostrarPorId($fila['id_producto']);
                                ?>
                                <td><?php echo $info_cliente['nombre']; ?></td>

                                <td><?php echo $fila['cantidad']; ?></td>
                                <td><?php echo $fila['total']; ?></td>
                                <td class="text-center">
                                    <a href="deuda_pagar.php?id_venta=<?php print $fila['id_venta']  ?>" class="btn btn-success btn-sm"><i class="fas fa-dollar-sign"></i></a>
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