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
    <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
    <p class="mb-4">
        Como administrador puedes crear nuevas cuentas de usuario para que un trabajador pueda realizar operaciones a su
        nombre, desde aquí puedes modificar sus datos y dar de baja un usuario cuando quieras que deje de tener acceso a las
        funciones del software
    </p>

    <!-- message alert -->
    <?php if (!empty($_SESSION['message_user_crud'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_user_crud']['color'] ?> alert-dismissible fade show" role="alert">
            <p>
                <?= $_SESSION['message_user_crud']['mensaje'] ?>
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        $_SESSION['message_user_crud'] = array();
    }
    ?>
    <!-- end message alert -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary float-left">Lista de usuarios</h3>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalRegistroUsuario" data-whatever="@mdo">Agregar un nuevo usuario <i class="fas fa-plus-circle"></i></button>
        </div>

        <!-- modal registro -->
        <div class="modal fade" id="modalRegistroUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Datos del nuevo usuario</h5>
                    </div>
                    <form method="POST" action="usuario_acciones.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre Completo</label>
                                        <input type="text" class="form-control" name="nombre" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Matrícula</label>
                                        <input type="text" class="form-control" name="matricula" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="text" class="form-control" name="clave" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <select class="form-control" name="cargo" required>
                                            <option value="RECEPCIONISTA">RECEPCIONISTA</option>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="accion" class="btn btn-primary" value="Registrar">
                            <a href="usuario_index.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal registro -->

        <!-- tabla usuarios -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Matrícula</th>
                            <th>Clave</th>
                            <th>Cargo</th>
                            <th>Accciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'vendor/autoload.php';
                        $usuario = new savgym\Usuario;
                        $info_usuario = $usuario->mostrar();
                        foreach ($info_usuario as $fila) :

                            if ($_SESSION['usuario_info']['nombre_usuario'] == $fila['nombre']) { ?>
                                <tr class='bgcolor-yellow'>
                                    <td><?php echo $fila['nombre']; ?></td>
                                    <td><?php echo $fila['matricula']; ?></td>
                                    <td>*********</td>
                                    <td><?php echo $fila['cargo']; ?></td>
                                    <td class="text-center">Estás usando esta cuenta, ¡No puedes modificarla desde aquí!</td>
                                </tr>
                            <?php
                            }

                            if ($fila['estado'] == 'ALTA' && $_SESSION['usuario_info']['nombre_usuario'] != $fila['nombre']) { ?>
                                <tr>
                                    <td><?php echo $fila['nombre']; ?></td>
                                    <td><?php echo $fila['matricula']; ?></td>
                                    <td>*********</td>
                                    <td><?php echo $fila['cargo']; ?></td>
                                    <td class="text-center">
                                        <a href="usuario_acciones.php?id_usuario=<?php print $fila['id_usuario'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-user-lock"></i> Dar de baja</a>
                                        <a href="usuario_actualizar.php?id_usuario=<?php print $fila['id_usuario']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Modificar</a>
                                    </td>
                                </tr>
                            <?php
                            }

                            if ($fila['estado'] == 'BAJA' && $_SESSION['usuario_info']['nombre_usuario'] != $fila['nombre']) { ?>
                                <tr class='bgcolor-red'>
                                    <td>
                                        <font color="white"><?php echo $fila['nombre']; ?></font>
                                    </td>
                                    <td>
                                        <font color="white"><?php echo $fila['matricula']; ?></font>
                                    </td>
                                    <td>
                                        <font color="white">*********</font>
                                    </td>
                                    <td>
                                        <font color="white"><?php echo $fila['cargo']; ?></font>
                                    </td>
                                    <td class="text-center">
                                        <a href="usuario_acciones.php?id_usuario=<?php print $fila['id_usuario'] ?>" class="btn btn-success btn-sm"><i class="fas fa-user-check"></i> Reactivar usuario</a>
                                    </td>
                                </tr>
                        <?php }
                        endforeach
                        ?>
                    </tbody>
                </table>
                <?php
                // }
                ?>
            </div>
        </div>
        <!-- end tabla usuarios -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>