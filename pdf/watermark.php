<?php
require('rotation.php');

class PDF extends PDF_Rotate
{
function Header()
{
	//Put the watermark
	$this->SetFont('Arial','B',50);
	$this->SetTextColor(255,192,203);
	$this->RotatedText(35,190,'W a t e r m a r k   d e m o',45);
}

function RotatedText($x, $y, $txt, $angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}
}

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$txt="FPDF is a PHP class which allows to generate PDF files with pure PHP, that is to say ".
	"without using the PDFlib library. F from FPDF stands for Free: you may use it for any ".
	"kind of usage and modify it to suit your needs.\n\n";
for($i=0;$i<25;$i++) 
	$pdf->MultiCell(0,5,$txt,0,'J');
$pdf->Output();
?>