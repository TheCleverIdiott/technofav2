<?php

require('rotation.php');
session_start();



class PDF extends PDF_Rotate
{
// Page header
function Header()
{

  // Logo
    $this->Image('logo.jpg',10,6,70);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Move to the right
    $this->Cell(70);
    // Title
  //$this->Cell(40,5,'Attendence Report',1,0,'C');
	//line break
		$this->Ln(4);
		$this->Cell(80,5,'',0,0,'C');
    	$this->Cell(40,5,'Attendence Report',1,0,'C');
		$this->Ln(1);
	//string website
	$this->SetFont('Arial','B',10);
	$this->Cell(13,10,'');
	$this->Cell(150,25,'www.wtcare.com');
	$this->Cell(100,25,'Date : 28.12.2014');
	  
	 $this->Ln(5);
	 
	$this->Cell(65,35,'Employee Name:- Mainak Dey');
	$this->Cell(80,35,'Employee Designation:- Developer');
	$this->Cell(10,35,'Contact No:- 9641998838');
	
	//$this->Cell(10,10,'www.wtcare.com');
	//draw line
	$this->Line(10, 30, 200, 30);
	$this->Line(10, 31, 200, 32);
	$this->Cell(80,5,'',0,0,'C');
	$this->Ln(10);
	
    // Line break
    $this->Ln(20);
	//watermark
	//Put the watermark
	$this->SetFont('Arial','B',80);
	$this->SetTextColor(232,232,232);
	$this->RotatedText(50,180,'NIS Pvt.Ltd',45);
}
/*function Header()
{
	//Put the watermark
	$this->SetFont('Arial','B',50);
	$this->SetTextColor(255,192,203);
	$this->RotatedText(35,190,'W a t e r m a r k   d e m o',45);
}*/
//watermark
function RotatedText($x, $y, $txt, $angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}
function generateTable($no)
{

$this->cell(30,5,"SL.No",1,0,"C");
$this->cell(45,5," Entry Time ",1,0,"C");
$this->cell(45,5," Exit Time ",1,0,"C");
$this->cell(35,5," Duration ",1,0,"C"); 
$this->cell(35,5," Date ",1,1,"C");
$i=0;


$this->cell(30,5,'1',1,0,"C");
$this->cell(45,5,'10.10',1,0,"C");
$this->cell(45,5,'11.11',1,0,"C");
$this->cell(35,5,'5 Hrs',1,0,"C"); 
$this->cell(35,5,'28.13.1234',1,1,"C");



}

// Page footer
function Footer()
{
     $this->Ln(20);
    //Draw Line
	$this->Line(10, 280, 200, 280);
	// Position at 1.5 cm from bottom
	 $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
	//String FooterDetails
	 $this->cell(170,10,"Contact us:  +44-131-208-2872(UK)// +1-209-227-6966(USA)  Email:support.wtcare@live.in  Website:www.wtcare.com  ");
    $this->Cell(20,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
/*for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);*/
	/* $pdf->SetFont('Times','U',10);

 $pdf->Cell(0,10,'Employee Details: ',10,0,1);	
 $pdf->Ln(3);
 $pdf->SetFont('Times','',10);
 $pdf->Cell(80,15,'Id : '.$id,10,0,1);	
 $pdf->Cell(0,15,'Email : '.$email,10,0,1);
   $pdf->Ln(6);
  $pdf->Cell(80,15,'Entry : '.$entry,10,0,1);
   $pdf->Cell(0,15,'Exit : '.$exit,10,0,1);
   $pdf->Ln(6);
  $pdf->Cell(80,15,'Duration : '.$duration,10,0,1);
   $pdf->Cell(0,15,'Registration No : '.$date,10,0,1);
   $pdf->Ln(6);
  $pdf->Cell(0,15,'Address : '.$dates,10,0,1);
   $pdf->Ln(25);*/
$pdf->generateTable(5);
$pdf->SetFont('Arial','B',7);
//Table with 20 rows and 4 columns
/*$pdf->SetWidths(array(10,50,50,50));
srand(microtime()*1000000);
$pdf->Row(array("SL.No","Entry","Duration","Date"));
$pdf->SetFont('Arial','',7);
$i=0;
while($row=mysql_fetch_assoc($result))
{
extract($row);
$i=$i+1;
$id=$id;
$name=$name;
$entry =$entry;
$exit=$exit;
$duration=$duration;
$date=$date;
$pdf->Row(array($i,$entry,$duration,$date));
}
	*/
	
$pdf->Ln(5);
$pdf->cell(135,5,"  ",0,0,"C");$pdf->SetFont('Arial','B',7);
//$pdf->cell(25,5," Total ",1,0,"C");
//$pdf->cell(20,5,"$".$price. "(USD)" ,1,0,"C");
  $pdf->Ln(12);
  $pdf->cell(90,25,"Declaration: We declare that this computer generated printsheet are true and correct .No authorized signature is needed ");
$pdf->Output();
?>