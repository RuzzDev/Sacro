<?php require_once("header.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>Datos del Cliente</legend>
                <form method="POST" action="cliente_acciones.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Matrícula</label>
                                <input type="text" class="form-control" name="matricula" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" name="telefono" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Edad</label>
                                <input type="text" class="form-control" name="edad" >
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="accion" class="btn btn-primary" value="Registrar">
                    <a href="cliente_index.php" class="btn btn-danger">Cancelar</a>
                </form>
            </fieldset>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>