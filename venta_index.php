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
<?php
// Creacion del carrito y gestión de productos
require 'venta_funciones.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  require 'vendor/autoload.php';
  $pelicula = new savgym\Producto;
  $resultado = $pelicula->mostrarPorId($id);

  if (!$resultado)
    header('Location: index.php');

  if (isset($_SESSION['carrito'])) { //SI EL CARRITO EXISTE
    //SI EL PELICULA EXISTE EN EL CARRITO
    if (array_key_exists($id, $_SESSION['carrito'])) {
      actualizarProducto($id);
    } else {
      //  SI EL CARRITO NO EXISTE EN EL CARRITO
      agregarProducto($resultado, $id);
    }
  } else {
    //  SI EL CARRITO NO EXISTE
    agregarProducto($resultado, $id);
  }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="card shadow mb-4">

    <div style="margin-top:20px"></div>

    <div class="col-md-12">
      <div>
        <a href="venta_seleccion_producto.php" class="btn btn-primary float-right">Seleleccionar más Productos <i class="fas fa-shopping-cart"></i></a>
      </div>
    </div>

    <div style="margin-top:20px"></div>

  




  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="tabla">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <td>Stock</td>
            <th>Cantidad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            $c = 0;
            foreach ($_SESSION['carrito'] as $indice => $value) {
              $c++;
          ?>
              <tr>
                <form action="venta_funcion_actualizar.php" method="post">
                  <td><?php print $c ?></td>
                  <td><?php print $value['nombre']  ?></td>
                  <td><?php print $value['precio']  ?></td>
                  <td><?php print $value['stock']  ?></td>
                  <td>
                    <input type="hidden" name="id" value="<?php print $value['id'] ?>">
                    <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
                  </td>
                  <td>
                    <button type="submit" class="btn btn-success btn-xs">
                      <i class="fas fa-sync"></i>
                    </button>

                    <a href="venta_funcion_eliminar.php?id=<?php print $value['id']  ?>" class="btn btn-danger btn-xs">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </form>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td colspan="7">NO HAS ELEGIDO NINGÚN PRODUCTO PARA REALIZAR UNA VENTA</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

<form method="POST" action="venta_realizar_venta.php">
  <hr>
  <div class="col-md-12">
    <div class="input-group">


      <legend>Selecciona el Cliente: </legend>
      
      <select class="custom-select" name="id_cliente" required>
        <?php
        require 'vendor/autoload.php';
        $trabajador = new savgym\Cliente;
        $resultado_trabajador = $trabajador->mostrar();
        foreach ($resultado_trabajador as $fila) : ?>
          <option value="<?php print $fila['id_cliente'] ?>"><?php print $fila['nombre'] ?></option>
        <?php endforeach ?>
      </select>
     
      <select class="custom-select" name="tipo_venta" required>
        <option value="contado">Al contado</option>
        <option value="credito">A crédito</option>
      </select>
    </div>
    <hr>
    <?php
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    ?>
      <div class="pull-right">
        <input type="submit" name="accion_vender" class="btn btn-success float-right" value="Realizar Venta">
      </div>
  </div>
<?php } ?>

</form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>