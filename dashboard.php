<?php require_once("header.php"); ?>
<!-- validacion de inicio de sesion y usarios -->
<?php
if (!isset($_SESSION['usuario_info']) or empty($_SESSION['usuario_info']))
    echo '<script type="text/javascript"> window.location.href = "index.php"; </script>';
// header('Location: index.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Bienvenido!!</h1>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once("footer.php"); ?>