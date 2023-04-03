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
    $this->image('lg.jpg',20,10,30);
	
     //Arial bold 15
    $this->SetFont('Arial','B',10);
    // Move to the right
   
    // Title
  //$this->Cell(40,5,'Attendence Report',1,0,'C');
	//line break
		$this->Ln(1);
		$this->SetFont('Arial','B',18);
		//$this->image('lg.jpg',90,6,-210);
	    $this->Cell(202,5,'RIYA ENTERPRISE',0,0,'C');
		$this->Ln(10);
		$this->SetFont('Arial','',10);
		$this->Cell(200,6,'KUMIR PARA, PARULIA BAZAR',0,0,'C');
		$this->Ln(4);
		$this->Cell(200,5,'P.O:- PARULIA. P.S:- PURBASTHALI',0,0,'C');
		$this->Ln(4);
		
		$this->Cell(200,5,'Dist - BURDWAN  713513',0,0,'C');
		$this->Ln(4);
		$this->Cell(200,5,'Cell : 9933513919, 8967287666',0,0,'C');
		$this->Ln(4);
		$this->Cell(200,5,'E-Mail. : riyaenterprise25@gmail.com',0,0,'C');
		$this->Ln(4);
		$this->Cell(200,5,'Company GSTIN No. :  ',0,0,'C');
		
	//string website
	$this->SetFont('Arial','B',18);
	$this->Ln(8);
		$this->Cell(202,5,'TAX INVOICE',0,0,'C');
	  $this->Ln(10);
	  $this->SetFont('Arial','',12);
	  $this->Cell(10,5,'',0,0,'L');
	  $INVOICE_NO="";
	  $INVOICE_DATE="";
	  $REVICE_CHARGE="";
	  $STATE="";
	  $TRANSPORT_MODE="";
	  $VEHICLE_NO="";
	  $DATE_OF_SUPPLY="";
	  $PLACE_OF_SUPPLY="";
	  $bill_to_party_name="";
	  $bill_to_party_address="";
	  $bill_to_party_gstin="";
	  $bill_to_party_state="";
	  
	  $ship_to_party_name="";
	  $ship_to_party_gstin="";
	  $ship_to_party_state="";
	
	  
	$query1="SELECT * FROM `raw_material_sale` WHERE id =".$_REQUEST['id'];
$result1=mysql_query($query1);

while($row=mysql_fetch_array($result1))
{
extract($row);
      $INVOICE_NO=$row['invoice_no'];
	  $INVOICE_DATE=$row['invoice_date'];
	  /*$REVICE_CHARGE=$row['reverse_cherge'];*/
	  $STATE=$row['state'];
	  $TRANSPORT_MODE=$row['challan_no'];
	  $VEHICLE_NO=$row['vehicle_number'];
	  $DATE_OF_SUPPLY=$row['date_of_supply'];
	  $PLACE_OF_SUPPLY=$row['place_of_supply'];
	  
	  $bill_to_party_name=$row['bill_to_party_name'];
	  $bill_to_party_address=$row['bill_to_party_address'];
	  $bill_to_party_gstin=$row['bill_to_party_gstin'];
	  $bill_to_party_state=$row['bill_to_party_state'];
	  $ship_to_party_name=$row['ship_to_party_name'];
	  $ship_to_party_address=$row['ship_to_party_address'];
	  $ship_to_party_gstin=$row['ship_to_party_gstin'];
	  $ship_to_party_state=$row['ship_to_party_state'];
}
		$this->Cell(90,5,'INVOICE NO: '.$_REQUEST['invoice_no'],0,0,'L');
		$this->Cell(80,5,'CHALLAN NO.:'.$TRANSPORT_MODE,0,0,'L');
	 $this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'INVOICE DATE:'.$INVOICE_DATE,0,0,'L');
			$this->Cell(80,5,'VEHICLE NO:'.$VEHICLE_NO,0,0,'L');
	 $this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		/*$this->Cell(90,5,'REVICE CHARGE (Y/N):'.$REVICE_CHARGE,0,0,'L');*/
		$this->Cell(80,5,'DATE OF SUPPLY:'.$DATE_OF_SUPPLY,0,0,'L');

	 $this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'STATE:'. $STATE,0,0,'L');
		$this->Cell(80,5,'PLACE OF SUPPLY:'.$PLACE_OF_SUPPLY,0,0,'L');
	
	$this->Ln(11);
	  $this->Cell(10,7,'',0,0,'L');
	   $this->SetFont('Arial','U',12);
		$this->Cell(90,7,'Bill to Party:',0,0,'C');
		$this->Cell(90,7,'Ship to Party:',0,0,'C');
		$this->SetFont('Arial','',10);
		$this->Ln(6);
		$this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'NAME: '.$bill_to_party_name,0,0,'L');
		$this->Cell(80,5,'NAME: '.$ship_to_party_name,0,0,'L');
		$this->Ln(5);
	 $this->Cell(10,5,'',0,0,'L');
	/*$this->MultiCell(90,5,'Address:'.$bill_to_party_address,0,'L');
	$this->MultiCell(90,5,'Address:'.$ship_to_party_address,0,'L');*/
		$this->Cell(90,5,'Address: '.$bill_to_party_address,0,0,'L');
		$this->Cell(90,5,'Address: '.$ship_to_party_address,0,0,'L');
		$this->Cell(80,5,'',0,0,'L');
		/*$this->Ln(5);
		$this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Address'.$ship_to_party_address,0,0,'L');
		$this->Cell(80,5,'',0,0,'L');*/
		$this->Ln(5);
		$this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'GSTIN: '. $bill_to_party_gstin,0,0,'L');
		$this->Cell(80,5,'GSTIN: '. $ship_to_party_gstin,0,0,'L');
		$this->Ln(5);
		$this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'STATE: '. $bill_to_party_state,0,0,'L');
		$this->Cell(80,5,'STATE: '. $ship_to_party_gstin,0,0,'L');
	 
	$this->Rect(15,58, 90, 25 ,'D');
	$this->Rect(105,58, 90, 25 ,'D');
	
	$this->Rect(15,86, 90, 30 ,'D');
	$this->Rect(105,86, 90, 30 ,'D');
	
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

$query="SELECT * FROM `raw_material_sale` WHERE invoice_no='".$_REQUEST['invoice_no']."'";
$result=mysql_query($query);
$this->cell(10,5,"SL",1,0,"C");
$this->cell(40,5," Particulars ",1,0,"C");
$this->cell(15,5," HSN ",1,0,"C");
$this->cell(10,5," Unit ",1,0,"C");
$this->cell(10,5," Qty ",1,0,"C");
$this->cell(15,5," Rate ",1,0,"C");
$this->cell(15,5," Amount ",1,0,"C");
$this->cell(10,5," Dis ",1,0,"C");
$this->cell(15,5," Taxable ",1,0,"C");
$this->cell(15,5," CGST| % ",1,0,"C");
$this->cell(15,5," SGST| % ",1,0,"C");
$this->cell(15,5," IGST| % ",1,0,"C");
$this->cell(15,5," Total ",1,1,"C");
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
$this->CellFitScale(40,5,$row['product_description'],"LR",0,"C");
$this->cell(15,5,$row['hsn_code'],"LR",0,"C");
$this->cell(10,5,$row['purchase_unit'],"LR",0,"C");
$this->cell(10,5,$row['qty'],"LR",0,"C");
$this->cell(15,5,$row['rate'],"LR",0,"C");
$this->cell(15,5,$row['amount'],"LR",0,"C");
$this->cell(10,5,$row['discount'],"LR",0,"C");
$this->cell(15,5,$row['taxable_value'],"LR",0,"C");
$this->cell(15,5,$row['cgst_amount'].'|'.$row['cgst_rate'].'%',"LR",0,"C");
$this->cell(15,5,$row['sgst_amount'].'|'.$row['sgst_rate'].'%',"LR",0,"C");
$this->Cell(15,5,$row['igst_amount'].'|'.$row['igst_rate'].'%',"LR",0,"C");
$this->cell(15,5,$row['total'],"LR",1,"C");

$i=$i+1;
}
if($i<12)
{
   while($i<=12)
   {
     $this->cell(10,5,'',"LR",0,"C");
$this->cell(40,5,'',"LR",0,"C");
$this->cell(15,5,'',"LR",0,"C");
$this->cell(10,5,'',"LR",0,"C"); 
$this->cell(10,5,'',"LR",0,"C");
$this->cell(15,5,'',"LR",0,"C");
$this->cell(15,5,'',"LR",0,"C");
$this->cell(10,5,'',"LR",0,"C");
$this->cell(15,5,'',"LR",0,"C");
$this->cell(15,5,'',"LR",0,"C");
$this->cell(15,5,'',"LR",0,"C");
$this->cell(15,5,'',"LR",0,"C");
$this->cell(15,5,'',"LR",1,"C");

$i++;

   }	   
}
$this->SetFont('Arial','B',18);
$this->cell(75,10,'TOTAL',1,0,"C");
$this->SetFont('Arial','',10);
$this->cell(10,10,$qty,1,0,"C");
$this->cell(15,10,'',1,0,"C");
$this->cell(15,10,$amount,1,0,"C");
$this->cell(10,10,'',1,0,"C");
$this->cell(15,10,$taxable,1,0,"C");
$this->cell(15,10,$cgst,1,0,"C");
$this->cell(15,10,$sgst,1,0,"C");
$this->cell(15,10,$igst,1,0,"C");
$this->cell(15,10,$total,1,1,"C");

$this->cell(130,5,'Total Invoice Amount In Word',1,0,"C");
$this->cell(55,5,'Total Amount Before Tax',1,0,"C");
$this->cell(15,5,$taxable,1,1,"C");

$this->cell(130,5,ucwords(no_to_words($total)),0,0,"C");
$this->cell(55,5,'Add : CGST',1,0,"C");
$this->cell(15,5,$cgst,1,1,"C");

$this->cell(130,5,'',0,0,"C");
$this->cell(55,5,'Add : SGST',1,0,"C");
$this->cell(15,5,$sgst,1,1,"C");

$this->cell(130,5,'',0,0,"C");
$this->cell(55,5,'Add : IGST',1,0,"C");
$this->cell(15,5,$igst,1,1,"C");

$this->cell(130,5,'',0,0,"C");
$this->cell(55,5,'Total Tax Amount',1,0,"C");
$this->cell(15,5,$cgst+$sgst,1,1,"C");

$this->cell(130,5,'A/C Name : ',1,0,"L");
$this->cell(55,5,'Total Amount After Tax',1,0,"C");
$this->cell(15,5,$total,1,1,"C");

$this->cell(130,5,'Bank A/C: ',1,0,"L");
$this->cell(55,5,'',0,0,"C");
$this->cell(15,5,'',0,1,"C");
//$this->Line(5, 231, 205, 231);

$this->cell(130,5,'Bank IFSC: ',1,0,"L");
$this->cell(55,5,'',0,0,"C");
$this->cell(15,5,'',0,1,"C");
//$this->Line(5, 231, 205, 231);

//$this->cell(130,5,'Bank IFSC: ',1,0,"L");
//$this->cell(55,5,'',0,0,"C");
//$this->cell(15,5,'',0,1,"C");
//$this->Line(5, 231, 205, 231);

$this->cell(130,5,'Special Note : ',1,0,"L");
$this->cell(70,5,'(Customer`s Signature)','LRB',1,"C");

$this->cell(130,5,'Note:1) No Warranty / No Guarantee/ No Return.','LR',0,"L");
$this->cell(70,5,'Authorized Signatory','LR',1,"C");
$this->cell(130,5,'2) I register dealer(S) under the bengal Finance Sales Tax Act. 1941.','LR',0,"L");
$this->cell(70,5,'','LR',1,"L");
$this->SetFont('Arial','',9);
$this->cell(130,5,'Holding registration certificate do hereby declare that I am liable to pay under the ','LR',0,"L");
$this->SetFont('Arial','',9);
$this->cell(70,5,'','LR',1,"C");
$this->cell(130,5,'act. On sale of goods noted in the bill. I hereby certify that the goods mentioned ','LR',0,"L");
$this->SetFont('Arial','',9);
$this->cell(70,5,'.......................................................','LR',1,"C");
$this->cell(130,5,'in this bill are wanted to the same nature & quality as that demanded by the vender.','LRB',0,"L");
$this->cell(70,5,'(For Riya Enterprise.)','LRB',1,"C");

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