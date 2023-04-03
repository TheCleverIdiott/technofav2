<?php
include '../conn.php';
require('rotation.php');
session_start();

function no_to_words($no)
{   
 $words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
    if($no == 0)
        return ' ';
    else {
	$novalue='';
	$highno=$no;
	$remainno=0;
	$value=100;
	$value1=1000;       
            while($no>=100)    {
                if(($value <= $no) &&($no  < $value1))    {
                $novalue=$words["$value"];
                $highno = (int)($no/$value);
                $remainno = $no % $value;
                break;
                }
                $value= $value1;
                $value1 = $value * 100;
            }       
          if(array_key_exists("$highno",$words))
              return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
          else {
             $unit=$highno%10;
             $ten =(int)($highno/10)*10;            
             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
           }
    }
}
class PDF extends PDF_Rotate
{
	//Cell with horizontal scaling if text is too wide
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);

        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;

        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }

        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }

    //Cell with horizontal scaling only if necessary
    function CellFitScale($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,false);
    }

    //Cell with horizontal scaling always
    function CellFitScaleForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,true);
    }

    //Cell with character spacing only if necessary
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }

    //Cell with character spacing always
    function CellFitSpaceForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        //Same as calling CellFit directly
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,true);
    }

    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }	
	
// Page header
function Header()
{
	$this->Rect(5, 5, 200, 287, 'D'); //For A4
	$this->SetLeftMargin(5);



    // Logo
    //$this->Image('logo.jpg',10,6,70);
    // Arial bold 15
	$this->SetTextColor(0,0,0);
    $this->SetFont('Arial','B',16);
    // Move to the right
   
    // Title
  //$this->Cell(40,5,'Attendence Report',1,0,'C');
	//line break
		$this->Ln(1);
		//$this->SetFont('Arial','',14);
		//$this->Image('makali-1.jpg',10,10,-900);
	$this->Cell(190,5,'RIYA ENTERPRISE',0,0,'C');
		$this->Ln(8);
		$this->SetFont('Arial','',12);
		$this->Cell(190,5,'KUMIR PARA, PARULIA BAZAR',0,0,'C');
		$this->Ln(6);
		$this->Cell(190,5,'P.O:- PURBASTHALI',0,0,'C');
		$this->Ln(6);
		
		$this->Cell(190,5,'Dist - BURDWAN  713103',0,0,'C');
		
		
		
		$this->Ln(6);
		$this->Cell(190,5,'Cell : 9933513919, 8967287666 ',0,0,'C');
		
		$this->Ln(6);
		$this->Cell(190,5,'e-Mail. : riyaenterprise25@gmail.com',0,0,'C');
		$this->Ln(5);
	//string website
	$this->SetFont('Arial','BU',18);
	$this->Ln(4);
		$this->Cell(190,5,'Creditor List',0,0,'C');
	  $this->Ln(2);
	  $this->SetFont('Arial','',12);
	  $this->Cell(10,5,'',0,0,'L');
	
	
	//$this->Cell(10,10,'www.wtcare.com');
	//draw line
	//$this->Line(10, 52, 200, 52);
	//$this->Line(10, 53, 200, 53);
	//$this->Line(10, 60, 200, 60);
	//$this->Cell(80,5,'',0,0,'C');
	$this->Ln(1);
	
    // Line break
    $this->Ln(4);
	//watermark
	//Put the watermark
	/*$this->SetFont('Arial','B',80);
	$this->SetTextColor(232,232,232);
	$this->RotatedText(50,180,'NIS Pvt.Ltd',45);*/
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

$query="SELECT * FROM `creditors`";
$result=mysql_query($query);
$this->SetFillColor(135,206,250);
$this->SetTextColor(255,0,0);
$this->SetFont('Arial','',13);
$this->CellFitScale(5,10,"SL",1,0,"C",true);
$this->CellFitScale(65,10,"Name",1,0,"C",true);
$this->CellFitScale(30,10,"Proprietor Name",1,0,"C",true);
$this->cell(30,10,"Phone",1,0,"C",true); 
$this->cell(40,10,"Amount",1,0,"C",true);
$this->cell(30,10,"Advance",1,1,"C",true);
$i=1;
$amount=0;
$total=0;
$adv=0;
$advance=0;
while($row=mysql_fetch_array($result))
{
	$sql69="select * from `creditors` where name='".$row['name']."' ";  
	$query69=mysql_query($sql69);
	while($row69=mysql_fetch_array($query69))
	{
		$amount=$amount+$row69['amount'];
	}
	 $sql23="select distinct date,bill,total from `raw_material_purchase` where `purchase_by` ='".$row['name']."'";  
	 $query23=mysql_query($sql23);
	while($row23=mysql_fetch_array($query23))
	{
		$amount=$amount+$row23['total'];
	}
	$sql27="select * from creditors_payment where name='".$row['name']."'";   
   	$query27=mysql_query($sql27);
	while($row27=mysql_fetch_array($query27))
	{
		$amount=$amount-$row27['amount'];
	}
	$sql23="select * from creditors_payment where name='".$row['name']."' and `cat`='Advance'";   
   	$query23=mysql_query($sql23);
	while($row23=mysql_fetch_array($query23))
	{
		$adv=$adv+$row23['amount'];
	}

$this->SetTextColor(0,0,255);
$this->SetFont('Arial','',10);
$this->CellFitScale(5,10,$i,'TLRB',0,"C");
$this->CellFitScale(65,10,' '.$row['name'],'TLRB',"C");
$this->CellFitScale(30,10,' '.$row['creditors_id'],'TLRB',0,"C");
$this->CellFitScale(30,10,' '.$row['phone'],'TLRB',0,"C"); 
$this->CellFitScale(40,10,' '.$amount,'TLRB',0,"C");
$this->CellFitScale(30,10,' '.$adv,'TLRB',1,"C");
//$this->CellFitScale(25,10,$row['gst'],'LRB',1,"C");

$total=$total+$amount;
$advance=$advance+$adv;
$amount=0;
$adv=0;
$i++;

}
/*if($i<20)
{
   while($i<20)
   {
    

$this->cell(10,10,"",'LRB',0,"C");
$this->cell(100,10,'','LRB',0,"C");
$this->cell(30,10,'','LRB',0,"C");
$this->cell(30,10,'','LRB',0,"C"); 
$this->cell(30,10,'','LRB',1,"C");


$i++;

   }	   
}*/
$this->SetTextColor(255,0,0);
$this->SetFont('Arial','B',14);
$this->cell(130,10,"Total",'TLRB',0,"R");
$this->SetFont('Arial','B',12);
$this->CellFitScale(40,10,' '.$total,'TLRB',0,"C");
$this->CellFitScale(30,10,' '.$advance,'TLRB',1,"C");
}

// Page footer
function Footer()
{
     $this->Ln(1);
    //Draw Line
	$this->Line(10, 280, 200, 280);
	// Position at 1.5 cm from bottom
	 $this->SetY(-15);
    // Arial italic 8
	$this->SetTextColor(0,0,0);
    $this->SetFont('Arial','I',8);
    // Page number
	//String FooterDetails
	 $this->cell(170,10,"Declaration: We declare that this computer generated printsheet are true and correct .",0,0,'C');
    $this->Cell(20,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->generateTable(1);
$pdf->SetFont('Arial','B',7);

$pdf->SetFont('Arial','B',7);

$pdf->Output();
?>