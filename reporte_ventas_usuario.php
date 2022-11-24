<?php
session_start();
?>
<?php
require 'vendor/autoload.php';

$producto = new savgym\Producto;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if ($_POST['accion'] === 'Aceptar') {

    $id_usuario = $_POST['usuario'];
    require('fpdf/fpdf.php');
    date_default_timezone_set('America/El_Salvador');
    class PDF extends FPDF
    {

      function Header()
      {
        $this->Image('img/fondo.png', -1, -1, 85);
        $this->Image('img/logo.png', 150, 10, 35);

        $this->SetY(40);
        $this->SetX(120);
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(28, 27, 23);
        $this->Cell(50, 8, 'SACRO GYM', 0, 1);

        $this->SetY(45);
        $this->SetX(120);
        $this->SetFont('Arial', '', 8);
        $this->SetTextColor(30, 10, 32);
        $this->Cell(40, 8, utf8_decode('Alfredo del mazo, Deportistas, Tequixquiac, Estado de México'));

        $this->SetY(70);
        $this->SetX(20);
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(30, 10, 32);
        $this->Cell(40, 8, 'REPORTE DE VENTAS POR USUARIO', 0, 1);

        $this->Ln(1);
      }

      function Footer()
      {
        $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95, 5, utf8_decode('Página ') . $this->PageNo() . ' / {nb}', 0, 0, 'L');
        $this->Cell(95, 5, date('d/m/Y | g:i:a'), 00, 1, 'R');
        $this->Line(10, 287, 200, 287);
        $this->Cell(0, 5, utf8_decode("RuzDev © Todos los derechos reservados."), 0, 0, "C");
      }
    }



    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetTopMargin(500);
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);
    $pdf->SetX(15);
    $pdf->SetFillColor(252, 158, 0);
    $pdf->SetDrawColor(255, 255, 255);
    // Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 12, utf8_decode('N°'), 1, 0, 'C', 1);
    $pdf->Cell(25, 12, utf8_decode('Vendedor'), 1, 0, 'C', 1);
    $pdf->Cell(25, 12, utf8_decode('Cliente'), 1, 0, 'C', 1);
    $pdf->Cell(50, 12, utf8_decode('Producto'), 1, 0, 'C', 1);
    $pdf->Cell(20, 12, utf8_decode('Cantidad'), 1, 0, 'C', 1);
    $pdf->Cell(15, 12, utf8_decode('Total'), 1, 0, 'C', 1);
    $pdf->Cell(35, 12, utf8_decode('Fecha'), 1, 1, 'C', 1);

    $pdf->SetFont('Arial', '', 10);

    require 'vendor/autoload.php';
    $venta = new savgym\Reporte;
    $vendedor = new savgym\Usuario;
    $cliente = new savgym\Cliente;
    $producto = new savgym\Producto;
    // $id_usuario = $_SESSION['usuario_info']['id_usuario'];
    $reporte_venta = $venta->mostrarVentasPorUsuario($id_usuario);
    $i = 0;
    $total=0;
    foreach ($reporte_venta as $fila) :

      $nombre_vendedor = $fila['id_usuario'];
      $reporte_vendedor = $vendedor->mostrarPorIdUsuario($nombre_vendedor);

      $nombre_cliente = $fila['id_cliente'];
      $reporte_cliente = $cliente->mostrarPorId($nombre_cliente);

      $nombre_producto = $fila['id_producto'];
      $reporte_producto = $producto->mostrarPorId($nombre_producto);

      $i++;
      $pdf->SetX(15);
      $pdf->SetFillColor(255, 255, 255);
      $pdf->SetDrawColor(65, 61, 61);
      $pdf->Cell(10, 8, utf8_decode($i), 'B', 0, 'C', 1);
      $pdf->Cell(25, 8, utf8_decode($reporte_vendedor['matricula']), 'B', 0, 'C', 1);
      $pdf->Cell(25, 8, utf8_decode($reporte_cliente['matricula']), 'B', 0, 'C', 1);
      $pdf->Cell(50, 8, utf8_decode($reporte_producto['nombre']), 'B', 0, 'C', 1);
      $pdf->Cell(20, 8, utf8_decode($fila['cantidad']), 'B', 0, 'C', 1);
      $total = $total+$fila['total'];
      $pdf->Cell(15, 8, utf8_decode($fila['total']), 'B', 0, 'C', 1);
      $pdf->Cell(35, 8, utf8_decode($fila['fecha_venta']), 'B', 1, 'C', 1);
      $pdf->Ln(0.5);
    endforeach;
    
    $pdf->Cell(55, 8, utf8_decode('TOTAL VENDIDO $' .$total));
    $pdf->Output();
  }
  // else
  // print 'Error al registrar un producto';
}
?>
