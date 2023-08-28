<?php
session_start();
?>
<?php
require 'vendor/autoload.php';

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
                $this->Cell(40, 8, 'REPORTE DE VISITAS POR CLIENTE', 0, 1);
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
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 12, utf8_decode('N°'), 1, 0, 'C', 1);
        $pdf->Cell(25, 12, utf8_decode('Matricula'), 1, 0, 'C', 1);
        $pdf->Cell(105, 12, utf8_decode('Nomre del cliente'), 1, 0, 'C', 1);
        $pdf->Cell(40, 12, utf8_decode('Fecha de la visita'), 1, 1, 'C', 1);
        $pdf->SetFont('Arial', '', 10);
        require 'vendor/autoload.php';
        $visita = new savgym\Reporte;
        $cliente = new savgym\Cliente;
        $reporte_visita = $visita->mostrarVisitasPorCliente($id_usuario);
        $i = 0;
        $total = 0;
        foreach ($reporte_visita as $fila) :
            $nombre_cliente = $fila['id_cliente'];
            $reporte_cliente = $cliente->mostrarPorId($nombre_cliente);
            $i++;
            $pdf->SetX(15);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetDrawColor(65, 61, 61);
            $pdf->Cell(10, 8, utf8_decode($i), 'B', 0, 'C', 1);
            $pdf->Cell(25, 8, utf8_decode($reporte_cliente['matricula']), 'B', 0, 'C', 1);
            $pdf->Cell(105, 8, utf8_decode($reporte_cliente['nombre']), 'B', 0, 'C', 1);
            $pdf->Cell(40, 8, utf8_decode($fila['fecha']), 'B', 1, 'C', 1);
            $pdf->Ln(0.5);
        endforeach;

        $pdf->Cell(55, 12, utf8_decode('TOTAL DE ASISTENCIAS: ' . $i));
        $pdf->Output();
    }
}
?>
