<?php
require 'vendor/autoload.php';
session_start();

if (isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];

    $usuario = new savgym\Usuario;
    $resultado = $usuario->mostrarPorIdUsuario($id_usuario);

    if (!$resultado || ($_SESSION['usuario_info']['id_usuario'] == $id_usuario)) {
        $_SESSION['message_user_crud'] = array(
            'mensaje' => 'El usuario no existe o estás tratando de modificar la sesión actual',
            'color' => 'warning'
        );
        header('Location: usuario_index.php');
    }
} else {
    header('Locationario_index.php');
}
?>

<?php require_once("header.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>Modificar Datos del Usuario</legend>
                <form method="POST" action="usuario_acciones.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_usuario" value="<?php print $resultado['id_usuario'] ?>">
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
                                <label>Matrícula</label>
                                <input value="<?php print $resultado['matricula'] ?>" type="text" class="form-control" name="matricula" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Clave</label>
                                <input value="<?php print $resultado['clave'] ?>" type="text" class="form-control" name="clave" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cargo</label>
                                <select class="form-control" name="cargo" required>
                                    <option value="<?php print $resultado['cargo'] ?>"><?php print $resultado['cargo'] ?></option>
                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                    <option value="RECEPCIONISTA">RECEPCIONISTA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="accion" value="Actualizar">
                    <a href="usuario_index.php" class="btn btn-danger">Cancelar</a>
                </form>
            </fieldset>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>