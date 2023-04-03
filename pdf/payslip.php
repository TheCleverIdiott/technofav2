<?php

require('rotation.php');
include'conn.php';
$query='SELECT * FROM invoice where id='.$_GET['id'];
$result=mysql_query($query,$con);
while($row=mysql_fetch_assoc($result))
{
extract($row);
$name=$c_name;
$email=$email;
$phone =$phone;
$reg=$reg;
$address=$address;
$p_name=$p_name;
$price=$price;
$p_details=$p_details;
$validity=$validity;
$pmnt_mode=$pmnt_mode;
$remarks=$remarks;
$addon=$addon;
$c_date=$c_date;
$security=$security;
}
class PDF extends PDF_Rotate
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.jpg',10,6,70);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(40,10,'Detail Invoice',1,0,'C');
	//line break
	$this->Ln(1);
	//string website
	$this->SetFont('Arial','B',10);
	$this->Cell(13,10,'');
	$this->Cell(150,25,'www.wtcare.com');
	$this->Cell(100,25,'Date :'.date("Y-m-d"));
	//$this->Cell(10,10,'www.wtcare.com');
	//draw line
	$this->Line(10, 30, 200, 30);
    // Line break
    $this->Ln(20);
	//watermark
	//Put the watermark
	$this->SetFont('Arial','B',150);
	$this->SetTextColor(232,232,232);
	$this->RotatedText(50,180,'PAID',45);
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

$this->cell(20,5,"SL.No",1,0,"C");
$this->cell(100,5," Description ",1,0,"C");
$this->cell(30,5," Quantity ",1,0,"C");
$this->cell(30,5," Amount ",1,1,"C"); 


$this->cell(20,5,"01",1,0,"C");
$this->cell(100,5," Software Security,Virus/Trojan/Spyware Security ",1,0,"C");
$this->cell(30,5,"01",1,0,"C");
$this->cell(30,5," Amount ",1,1,"C"); 

$this->Cell(20,20," ",1,0,"C");
$this->Cell(100,20,"",1,0,"C");
$this->Cell(30,20,"  ",1,0,"C");
$this->Cell(30,20,"  ",1,1,"C"); 

$this->cell(20,5,"",1,0,"C");
$this->cell(100,5," ",1,0,"C");
$this->cell(30,5,"  ",1,0,"C");
$this->cell(30,5," ",1,1,"C"); 

$this->cell(20,25," ",1,0,"C");
$this->cell(100,25,"  ",1,0,"C");
$this->cell(30,25,"  ",1,0,"C");
$this->cell(30,25,"  ",1,1,"C"); 

$this->cell(20,25,"",1,0,"C");
$this->cell(100,25," ",1,0,"C");
$this->cell(30,25,"  ",1,0,"C");
$this->cell(30,25,"  ",1,1,"C"); 

$this->cell(20,5,"",1,0,"C");
$this->cell(100,5,"  ",1,0,"C");
$this->cell(30,5,"  ",1,0,"C");
$this->cell(30,5," ",1,1,"C"); 

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
$pdf->SetFont('Times','u',12);
/*for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);*/
	 $pdf->SetFont('Times','U',10);

 $pdf->Cell(0,10,'Invoice To: ',10,0,1);	
 $pdf->Ln(3);
 $pdf->SetFont('Times','',10);
 $pdf->Cell(80,15,'Name : '.$name,10,0,1);	
 $pdf->Cell(0,15,'Phone No : '.$phone,10,0,1);
   $pdf->Ln(6);
  $pdf->Cell(80,15,'email-ID : '.$email,10,0,1);
   $pdf->Cell(0,15,'Invoice No : '.$invoice,10,0,1);
   $pdf->Ln(6);
  $pdf->Cell(80,15,'Security : '.$security,10,0,1);
   $pdf->Cell(0,15,'Registration No : '.$reg,10,0,1);
   $pdf->Ln(6);
  $pdf->Cell(0,15,'Address : '.$address,10,0,1);
   $pdf->Ln(25);
//$pdf->generateTable(5);
$pdf->SetFont('Arial','B',7);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(10,125,25,20));
srand(microtime()*1000000);
$pdf->Row(array("SL.No","Description","Quantity","Amount"));
$pdf->SetFont('Arial','',7);
//for($i=0;$i<2;$i++)
	$pdf->Row(array("1.",$p_name,"01",$price));
	$pdf->Row(array("","Product Details :\n".$p_details,"",""));
	$pdf->Row(array("","Addon Application :\n".$addon,"",""));
	$pdf->Row(array("","Subscription Plan : Senior Citizen Pack Plan \n You Get Absolute Free Service And Security For The Upcomming 1 year (24X7)","",""));
$pdf->Ln(5);
$pdf->cell(135,5,"  ",0,0,"C");$pdf->SetFont('Arial','B',7);
$pdf->cell(25,5," Total ",1,0,"C");
$pdf->cell(20,5,"$".$price. "(USD)" ,1,0,"C");
  $pdf->Ln(12);
  $pdf->cell(90,25,"Declaration:We declare that this Invoice shows the actual price and Service described and that all particulars are True and 
correct  ");
$pdf->Output();
?>