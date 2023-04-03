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
    //$this->image('lg.jpg',20,10,30);
	
     //Arial bold 15
    $this->SetFont('Arial','B',10);
    // Move to the right
   
    // Title
  //$this->Cell(40,5,'Attendence Report',1,0,'C');
	//line break
		$this->Ln(1);
		$this->SetFont('Arial','U',18);
		//$this->image('lg.jpg',90,6,-210);
	    $this->Cell(202,5,'ESTIMATE',0,0,'C');
	
	$this->SetFont('Arial','',12);
				$this->Ln(6);
		
		$this->Cell(50,5,'',0,0,'R');
		$this->SetFont('Arial','U',12);
		$this->Cell(50,5,'193/OCT',0,0,'L');

						

		$this->Cell(30,5,'',0,0,'R');
		$this->SetFont('Arial','U',12);
		$this->Cell(50,5,'19/10/2018',0,0,'L');

	
		
	//string website
	$this->SetFont('Arial','B',18);
	$this->Ln(8);
		//$this->Cell(202,5,'TAX INVOICE',0,0,'C');
	 
	
	//$this->Cell(10,10,'www.wtcare.com');
	//draw line
	//$this->Line(10, 52, 200, 52);
	//$this->Line(10, 53, 200, 53);
	//$this->Line(10, 60, 200, 60);
	//$this->Cell(80,5,'',0,0,'C');
	$this->Ln(1);
	
    // Line break
    $this->Ln(10);
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

$query="SELECT * FROM `sale` WHERE invoice_no='".$_REQUEST['invoice_no']."'";
$result=mysql_query($query);
$this->cell(10,5,"SL",1,0,"C");
$this->cell(70,5," PRODUCT ",1,0,"C");
$this->cell(25,5," GR.WT ",1,0,"C");
$this->cell(25,5," B.WT ",1,0,"C");
$this->cell(25,5," NET.WT ",1,0,"C");
$this->cell(25,5," Rate ",1,0,"C");
$this->cell(20,5," Amount ",1,1,"C");

$i=1;
$qty=0;
$amount=0;
$taxable=0;
$cgst=0;
$sgst=0;
$igst=0;
$total=0;
while($row=mysql_fetch_array($result))
{


$qty=$qty+$row['qty'];
$amount=$amount+$row['amount'];
$taxable=$taxable+$row['taxable_value'];
$cgst=$cgst+$row['cgst_amount'];
$sgst=$sgst+$row['sgst_amount'];
$igst=$igst+$row['igst_amount'];
$total=$total+$row['total'];
$this->cell(10,5,$i,"LR",0,"C");
$this->CellFitScale(70,5,$row['product_description'],"LR",0,"C");
$this->cell(25,5,$row['hsn_code'],"LR",0,"C");
$this->cell(25,5,$row['purchase_unit'],"LR",0,"C");
$this->cell(25,5,$row['qty'],"LR",0,"C");
$this->cell(25,5,$row['rate'],"LR",0,"C");
$this->cell(20,5,$row['amount'],"LR",1,"C");



$i=$i+1;
}
if($i<12)
{
   while($i<=12)
   {
     $this->cell(10,5,'',"LR",0,"C");
$this->cell(70,5,'',"LR",0,"C");
$this->cell(25,5,'',"LR",0,"C");
$this->cell(25,5,'',"LR",0,"C"); 
$this->cell(25,5,'',"LR",0,"C");
$this->cell(25,5,'',"LR",0,"C");
$this->cell(20,5,'',"LR",1,"C");

$i++;

   }	   
}
$this->SetFont('Arial','B',18);
$this->cell(130,10,'',1,0,"C");
$this->SetFont('Arial','',10);

$this->cell(25,10,"204.790",1,0,"C");


$this->cell(25,10,$sgst,1,0,"C");

$this->cell(20,10,"45907.92",1,1,"C");

$this->cell(130,5,'Less : Discount Allowed',1,0,"C");
$this->cell(50,5,'',1,0,"C");
$this->cell(20,5,4416.00,1,1,"C");

$this->cell(130,5,'Add : BAG',1,0,"C");
$this->cell(50,5,'',1,0,"C");
$this->cell(20,5,400,1,1,"C");

$this->cell(130,5,'Round Off',1,0,"C");
$this->cell(50,5,'',1,0,"C");
$this->cell(20,5,0,1,1,"C");

$this->cell(130,5,'Invoice Value',1,0,"C");
$this->cell(50,5,'',1,0,"C");
$this->cell(20,5,41892.00,1,1,"C");



$this->cell(130,5,'                Rs. Forty One Thousad Eight Hundred Ninety Two Only. ',1,0,"L");
$this->cell(70,5,'','LRB',1,"C");

//$this->cell(130,5,'Bank A/C: ',1,0,"L");
//$this->cell(55,5,'',0,0,"C");
//$this->cell(15,5,'',0,1,"C");
//$this->Line(5, 231, 205, 231);

//$this->cell(130,5,'Bank IFSC: ',1,0,"L");
//$this->cell(55,5,'',0,0,"C");
//$this->cell(15,5,'',0,1,"C");
//$this->Line(5, 231, 205, 231);

//$this->cell(130,5,'Bank IFSC: ',1,0,"L");
//$this->cell(55,5,'',0,0,"C");
//$this->cell(15,5,'',0,1,"C");
//$this->Line(5, 231, 205, 231);





/*$this->MultiCell(130,5,'1) No Warranty / No Guarantee/ No Return. 2) I register dealer(S) under the bengal Finance Sales Tax Act. 1941. Holding registration certificate do hereby declare that I am liable to pay under the act. On sale of goods noted in the bill. I hereby certify that the goods mentioned in this bill are wanted to the same nature & quality as that demanded by the vender. ',1,"L");*/
//$this->cell(130,5,'2) I resister dealer(S) under the bengal Finance Sales Tax Act. 1941. Holding ',1,0,"L");


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
//$pdf->cell(25,5," Total ",1,0,"C");
//$pdf->cell(20,5,"$".$price. "(USD)" ,1,0,"C");
 
 // $pdf->cell(90,25,"Declaration: We declare that this computer generated printsheet are true and correct .No authorized signature is needed ");
$pdf->Output();
?>