<?php
session_start();
?>
<?php
require('./fpdf/fpdf.php');
require './php/conexionPrincipal.php';
$nombrePDF = $_SESSION['user'].date('Y-m-d-H-m').'.pdf';
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 18);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(60, 10, 'Factura de pedido BDTECNOLOGY', 0, 1, 'C');
        //Imagen
        $this->Image('img/Logo.png' , 160 ,10, 20 , 20,'PNG', './img/');

        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

$Total =  0;

$datos = json_decode(file_get_contents("php://input"), true);

    $pdf->SetFont('Arial', 'I', 16);
    $pdf->SetTextColor(211 , 49, 221);
    $pdf->Cell(60,5,'Productos adquiridos de '.$_SESSION['user'].'',0,0,'c') ;
    $pdf->SetTextColor(0 , 0, 0);
    $pdf->SetFont('Arial', 'I', 11);
    $pdf->SetY(60);
    $pdf->Cell(40, 5, 'Imagen', 1, 0);
    $pdf->Cell(85, 5, 'Producto', 1, 0);
    $pdf->Cell(20, 5, 'Cantidad', 1, 0);
    $pdf->Cell(20, 5, 'Precio/u', 1, 0);
    $pdf->Cell(20, 5, 'Total', 1, 1);

    $precioTotal=0;
    foreach ($datos['datos'] as $producto) {
        $idProducto = $producto['id'];
        $nombreProducto = $producto['Nombre'];
        $cantidad = $producto['Cantidad'];
        $precio =$producto['Precio'];
        $img = $producto['img'];
        $extencion = pathinfo($img, PATHINFO_EXTENSION);
        $imgModificada = str_replace(' ', '%20', $img);
        $precioTotalProducto = intval($cantidad)*floatval($precio);
        $pdf->Cell(40, 10,$pdf->Image($imgModificada, $pdf->GetX() + 15, $pdf->GetY(), 10 , 10,$extencion, './img/'), 1, 0, 'c');
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(85, 10, $nombreProducto, 1, 0);
        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(20, 10, $cantidad, 1, 0, 'c');
        $pdf->Cell(20, 10, $precio, 1, 0, 'c');
        $pdf->Cell(20, 10, $precioTotalProducto, 1, 1, 'c');
        
        $precioTotal += $precioTotalProducto;
    }
    $pdf->SetX(115);
    $pdf->Cell(40, 5, 'Total a pagar', 1, 0, 'c');
    $pdf->Cell(40, 5, $precioTotal, 1, 1, 'c');

$pdf->Output('F', 'pdf/'.$nombrePDF);
$_SESSION['pdf'] = $nombrePDF;