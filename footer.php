 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; Your Website 2020</span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres salir?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Selecciona "Aceptar" para salir de tu sesión actual.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                 <a class="btn btn-primary" href="logout.php">Aceptar</a>
             </div>
         </div>
     </div>
 </div>


 <!-- Baja de usuarios Modal-->
 <div class="modal fade" id="logoutModalBajaUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres dar de baja este usuario?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Selecciona "Aceptar" para evitar que este usuario pueda seguir accediendo al software.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                 <a href="usuario_acciones.php?id_usuario=<?php print $id_usuario_baja ?>" class="btn btn-primary">Aceptar</a>
             </div>
         </div>
     </div>
 </div>

 <!-- reporte de ventas por usuario Modal -->
 <div class="modal fade" id="logoutModalReporteVentasPorUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">¿De que usuario deseas saber las ventas?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <form method="POST" action="reporte_ventas_usuario.php" enctype="multipart/form-data">
                 <div class="modal-body">Selecciona un usuario de la lista y presiona "Aceptar" para generar un reporte de ventas.</div>
                 <div class="col-md-12">
                     <div class="form-group">
                         <select class="form-control" name="usuario" required>
                             <?php
                                require 'vendor/autoload.php';
                                $usuario = new savgym\Usuario;
                                $info_usuario = $usuario->mostrar();
                                foreach ($info_usuario as $fila) : ?>
                                 <option value="<?php echo $fila['id_usuario'] ?>"><?php echo $fila['nombre'] ?></option>
                             <?php
                                endforeach
                                ?>
                         </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                     <input type="submit" name="accion" class="btn btn-primary" value="Aceptar">
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- reporte de ventas por fecha Modal -->
 <div class="modal fade" id="logoutModalReporteVentasPorFecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">¿De que periodo deseas consultar las ventas?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <form method="POST" action="reporte_ventas_fecha.php" enctype="multipart/form-data">
                 <div class="modal-body">Selecciona un rango de fechas y presiona "Aceptar" para generar un reporte de ventas.</div>
                 <div class="col-md-12">
                     <label>De:</label>
                     <input class="custom-select" type="date" id="start" name="inicio" min="2020-01-01" max="2035-12-31" required>
                 </div>
                 <div class="col-md-12">
                     <label>A:</label>
                     <input class="custom-select" type="date" id="start" name="fin" min="2020-01-01" max="2035-12-31" required>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                     <input type="submit" name="accion" class="btn btn-primary" value="Aceptar">
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- reporte de visitas por cliente Modal -->
 <div class="modal fade" id="logoutModalReporteVisitasPorCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">¿De que cliente deseas saber las visitas?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <form method="POST" action="reporte_visitas_cliente.php" enctype="multipart/form-data">
                 <div class="modal-body">Selecciona un cliente de la lista y presiona "Aceptar" para generar un reporte de visitas.</div>
                 <div class="col-md-12">
                     <div class="form-group">
                         <select class="form-control" name="usuario" required>
                             <?php
                                require 'vendor/autoload.php';
                                $cliente = new savgym\Cliente;
                                $info_cliente = $cliente->mostrar();
                                foreach ($info_cliente as $fila) : ?>
                                 <option value="<?php echo $fila['id_cliente'] ?>"><?php echo $fila['nombre'] ?></option>
                             <?php
                                endforeach
                                ?>
                         </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                     <input type="submit" name="accion" class="btn btn-primary" value="Aceptar">
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- reporte de visitas por fecha Modal -->
 <div class="modal fade" id="logoutModalReporteVisitasPorFecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">¿De que periodo deseas consultar las visitas?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <form method="POST" action="reporte_visitas_fecha.php" enctype="multipart/form-data">
                 <div class="modal-body">Selecciona un rango de fechas y presiona "Aceptar" para generar un reporte de visitas.</div>
                 <div class="col-md-12">
                     <label>De:</label>
                     <input class="custom-select" type="date" id="start" name="inicio" min="2020-01-01" max="2035-12-31" required>
                 </div>
                 <div class="col-md-12">
                     <label>A:</label>
                     <input class="custom-select" type="date" id="start" name="fin" min="2020-01-01" max="2035-12-31" required>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                     <input type="submit" name="accion" class="btn btn-primary" value="Aceptar">
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="js/demo/datatables-demo.js"></script>
 </body>

 </html>