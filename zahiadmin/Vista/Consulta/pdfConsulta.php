<?php
include ('./fpdf.php');
/* tenemos que generar una instancia de la clase */
$pdf = new FPDF();
$pdf->AddPage();

/* seleccionamos el tipo, estilo y tama�o de la letra a utilizar */
$pdf->SetFont('ARIAL', 'B', 16);
$pdf->SetTextColor('0', '0', '0'); //para imprimir en rojo 
//		$pdf->Write (7,"HOLA ESTOY GENERANDO MI PRIMER PDF  ","#");
//	$pdf->Write (7,"Factura Generada el: ".$_GET['fecha']);
$pdf->Cell(50, 7, "Fecha y hora ", 1, 0, 'C');
$pdf->Cell(80, 7, "  " . $_GET['fecha'], 1, 0, 'C');
$pdf->Ln();
//      $pdf->Write(7,"A nombre de:    ".$_GET['nombre']);
//        $pdf->Multicell(190,7,"A nombre de ".$_GET['nombre'],1,'J');
$pdf->SetTextColor('0', '0', '0');
$pdf->Cell(50, 7, "Cedula ", 1, 0, 'C');
$pdf->SetTextColor('124', '126', '128');
$pdf->Cell(80, 7, $_GET['cedula'], 1, 0, 'C');
$pdf->Ln();
$pdf->SetTextColor('0', '0', '0');
$pdf->Cell(50, 7, "Eamil ", 1, 0, 'C');
$pdf->SetTextColor('124', '126', '128');
$pdf->Cell(80, 7, $_GET['email'], 1, 0, 'C');
$pdf->Ln();
$pdf->SetTextColor('0', '0', '0');
$pdf->Cell(50, 7, "Edad ", 1, 0, 'C');
$pdf->SetTextColor('124', '126', '128');
$pdf->Cell(80, 7, $_GET['edad'], 1, 0, 'C');
$pdf->Image('../../img/zahialogo.jpg', 147, 10, 50);
$pdf->Ln();
$pdf->SetTextColor('0', '0', '0');
$pdf->Cell(50, 7, "A nombre de ", 1, 0, 'C');
$pdf->SetTextColor('124', '126', '128');
$pdf->Cell(140, 7, $_GET['nombre'], 1, 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetTextColor('0', '0', '0');
$pdf->Cell(95, 7,"Tipo de consulta", 1, 0, 'C');
$pdf->SetTextColor('124', '126', '128');
$pdf->Cell(95, 7, $_GET['consulta'], 1, 0, 'C');
$pdf->Ln();
$pdf->Ln();
if ($_GET['consulta'] === "Corporal") {

    $pdf->SetTextColor('0', '0', '0');
    $pdf->Cell(63.3, 7, "Peso", 1, 0, 'C');
    $pdf->Cell(63.3, 7, "altura", 1, 0, 'C');
    $pdf->Cell(63.3, 7, "IMC", 1, 0, 'C');
    $pdf->Ln();
    $pdf->SetTextColor('124', '126', '128');
    $pdf->Cell(63.3, 7, $_GET['peso'], 1, 0, 'C');
    $pdf->Cell(63.3, 7, $_GET['altura'], 1, 0, 'C');
    $pdf->Cell(63.3, 7, $_GET['imc'], 1, 0, 'C');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetTextColor('0', '0', '0');
    $pdf->Cell(63.3, 7, "Cintura alta", 1, 0, 'C');
    $pdf->Cell(63.3, 7, "Cintura media", 1, 0, 'C');
    $pdf->Cell(63.3, 7, "Cintura baja", 1, 0, 'C');
    $pdf->Ln();
    $pdf->SetTextColor('124', '126', '128');
    $pdf->Cell(63.3, 7, $_GET['cintura_alta'], 1, 0, 'C');
    $pdf->Cell(63.3, 7, $_GET['cintura_media'], 1, 0, 'C');
    $pdf->Cell(63.3, 7, $_GET['cintura_baja'], 1, 0, 'C');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetTextColor('0', '0', '0');
    $pdf->Cell(47.5, 7, "Brazo 1", 1, 0, 'C');
    $pdf->Cell(47.5, 7, "Brazo 2", 1, 0, 'C');
    $pdf->Cell(47.5, 7, "Pierna 1", 1, 0, 'C');
    $pdf->Cell(47.5, 7, "Pierna 2", 1, 0, 'C');
    $pdf->Ln();
    $pdf->SetTextColor('124', '126', '128');
    $pdf->Cell(47.5, 7, $_GET['brazo_izquierdo'], 1, 0, 'C');
    $pdf->Cell(47.5, 7, $_GET['brazo_derecho'], 1, 0, 'C');
    $pdf->Cell(47.5, 7, $_GET['muslo_izquierdo'], 1, 0, 'C');
    $pdf->Cell(47.5, 7, $_GET['muslo_derecho'], 1, 0, 'C');
    $pdf->Ln();
}
$pdf->Ln();
$pdf->SetTextColor('0', '0', '0');
$pdf->Write(7, "Descripcion examen fisico");
$pdf->Ln();
$pdf->SetTextColor('124', '126', '128');
$pdf->SetFont('ARIAL', 'B', 12);
$pdf->Write(7, $_GET['examen_fisico']);
//$pdf->Ln();
//$pdf->Ln();
//$pdf->SetTextColor('0', '0', '0');
//$pdf->Write(7, "Factura");
//$pdf->Ln();
//$pdf->SetTextColor('124', '126', '128');
//$pdf->SetFont('ARIAL', 'B', 12);
//$pdf->Write(7, $_GET['factura']);
$pdf->Ln();
$pdf->Ln();
$pdf->SetTextColor('0', '0', '0');
$pdf->Cell(50, 7, "Total ", 1, 0, 'C');
$pdf->SetTextColor('124', '126', '128');
$pdf->SetFont('ARIAL', 'B', 20);
$pdf->Cell(140, 7, $_GET['total'], 1, 0, 'C');
$pdf->Ln();

//		$pdf->Line(0,160,300,160);//impresi�n de linea
$pdf->Output("Facturas/factura.pdf", 'F');
echo "<script language='javascript'>window.open('Facturas/factura.pdf','_self','');</script>"; //para ver el archivo pdf generado
exit;
