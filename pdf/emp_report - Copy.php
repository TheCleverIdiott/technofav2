<?php
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

 /*
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise .;
}*/

function money_convert($number)
{
	
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    ". " . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
 return ($result . "Rupees  " . $points . " Paise");
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
	$target_file="";
if(isset($_REQUEST['submit']))
{
  
if($_FILES['download_for'])

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["download_for"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["download_for"]["tmp_name"]);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
  //  echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["download_for"]["size"] > 500000) {
  //  echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["download_for"]["tmp_name"], $target_file)) {
      //  echo "The file ". basename( $_FILES["download_for"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
}
	//$this->Rect(5, 5, 200, 287, 'D'); //For A4
	$this->SetLeftMargin(5);



    // Logo
    //$this->image('lg.jpg',20,10,30);
	
     //Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
   
    // Title
  //$this->Cell(40,5,'Attendence Report',1,0,'C');
	//line break
		$this->Ln(1);
		$this->SetFont('Arial','B',25);
		//$this->image('lg.jpg',90,6,-210);
	    $this->Cell(202,5,'Burdwan Holy Child School',0,0,'C');
		$this->Ln(10);
		$this->SetFont('Arial','B',10);
		$this->Cell(200,6,'Based an Indian Culture Values. Affiliated to CISCE Council. New Delhi (WB308)',0,0,'C');
		$this->Ln(4);
		//$this->Cell(200,5,'P.O:- PARULIA. P.S:- PURBASTHALI',0,0,'C');
		$this->Ln(4);
		
		//$this->Cell(200,5,'PH. :  7363044390/91  (M) :  6296366293',0,0,'C');
		$this->Ln(4);
		//$this->Cell(200,5,'Cell : 9933513919, 8967287666',0,0,'C');
		$this->Ln(4);
		//$this->Cell(200,5,'GSTIN : 19AFHPP7920E1Z9 State : 19, West Bengal',0,0,'C');
		$this->Ln(4);
		//$this->Cell(200,5,'Company GSTIN No. : 19AWKPP3293N1ZM ',0,0,'C');
		
	//string website
	$this->SetFont('Arial','B',20);
	$this->Ln(8);
		$this->Cell(202,5,'Admission Form',0,0,'C');
		
		$this->SetFont('Arial','',25);
				$this->Ln(1);
		
		$this->Cell(20,5,'',0,0,'R');
		$this->SetFont('Arial','U',12);
		if($_POST['fname']=="ICSE")
		{
			$count_my_page = ("studentid.txt");
			$hits = file($count_my_page);
			$hits[0] ++;
			$fp = fopen($count_my_page , "w");
			fputs($fp , "$hits[0]");
			fclose($fp); 
			$StudentId= $hits[0];
		}
		else
		{
			$count_my_page = ("studentid1.txt");
			$hits = file($count_my_page);
			$hits[0] ++;
			$fp = fopen($count_my_page , "w");
			fputs($fp , "$hits[0]");
			fclose($fp); 
			$StudentId= $hits[0];
		}
		
		$this->Cell(20,5,'Form No.:-'.$_POST['fname'].$StudentId,0,0,'L');		
		
	  $this->Ln(8);
	  $this->SetFont('Arial','',10);
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
	
	  
	  //$query1="SELECT * FROM `sale` WHERE id =".$_REQUEST['id'];
//$result1=mysql_query($query1);

//while($row=mysql_fetch_array($result1))
{
//extract($row);
     // $INVOICE_NO=$row['invoice_no'];
	 // $INVOICE_DATE=$row['invoice_date'];
	  /*$REVICE_CHARGE=$row['reverse_cherge'];*/
	  //$STATE=$row['state'];
	  //$TRANSPORT_MODE=$row['challan_no'];
	  //$VEHICLE_NO=$row['vehicle_number'];
	  //$DATE_OF_SUPPLY=$row['date_of_supply'];
	 // $PLACE_OF_SUPPLY=$row['place_of_supply'];
	  
	 // $bill_to_party_name=$row['bill_to_party_name'];
	  //$bill_to_party_address=$row['bill_to_party_address'];
	  //$bill_to_party_gstin=$row['bill_to_party_gstin'];
	  //$bill_to_party_state=$row['bill_to_party_state'];
	  //$ship_to_party_name=$row['ship_to_party_name'];
	  //$ship_to_party_address=$row['ship_to_party_address'];
	  //$ship_to_party_gstin=$row['ship_to_party_gstin'];
	  //$ship_to_party_state=$row['ship_to_party_state'];
}

	$this->SetFont('Arial','B',8);
	

		
		$this->image($target_file,165,30,20);
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Select Class: '.$_REQUEST['a'],0,0,'L');
			$this->Cell(80,5,'Student Name : '.$_REQUEST['b'],0,0,'L');
		
		
	 $this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Date Of Birth: '.$_REQUEST['c'],0,0,'L');
			$this->Cell(80,5,'Blood Group : '.$_REQUEST['d'],0,0,'L');
	 $this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		/*$this->Cell(90,5,'REVICE CHARGE (Y/N):'.$REVICE_CHARGE,0,0,'L');*/
		$this->Cell(90,5,'Gender: '.$_REQUEST['e'],0,0,'L');
		$this->Cell(80,5,'Religion: '.$_REQUEST['f'],0,0,'L');
		
	 $this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Caste: '.$_REQUEST['g'],0,0,'L');
		$this->Cell(80,5,'Father Name: '.$_REQUEST['h'],0,0,'L');
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Mobile: '.$_REQUEST['i'],0,0,'L');
		$this->Cell(80,5,'Occupation: '.$_REQUEST['j'],0,0,'L');
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Monthly Income: '.$_REQUEST['k'],0,0,'L');
		$this->Cell(80,5,'Service/Business: '.$_REQUEST['l'],0,0,'L');
		
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Name Of The Company/Concern: '.$_REQUEST['m'],0,0,'L');
		$this->Cell(80,5,'Address with Contact No.: '.$_REQUEST['n'],0,0,'L');
		
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Mother Name: '.$_REQUEST['o'],0,0,'L');
		$this->Cell(80,5,'Mobile: '.$_REQUEST['p'],0,0,'L');
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Occupation: '.$_REQUEST['q'],0,0,'L');
		$this->Cell(80,5,'Monthly Income: '.$_REQUEST['r'],0,0,'L');
		
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Service/Business: '.$_REQUEST['s'],0,0,'L');
		$this->Cell(80,5,'Name Of The Company/Concern: '.$_REQUEST['t'],0,0,'L');
		
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Address With Contact No.: '.$_REQUEST['u'],0,0,'L');
		
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Full Present Address: '.$_REQUEST['v'],0,0,'L');
		$this->Cell(80,5,'Full Permanent Address: '.$_REQUEST['w'],0,0,'L');
	
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Emergency Contact Person With Phone No.:  '.$_REQUEST['x'],0,0,'L');
		$this->Cell(80,5,'Name Of The Childs House Physician: '.$_REQUEST['y'],0,0,'L');
		
		$this->Ln(5);
	  $this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Student Suffering From Any Disability: '.$_REQUEST['z'],0,0,'L');
		$this->Cell(80,5,'Additioal Information(If Any): '.$_REQUEST['aa'],0,0,'L');
		
		
		
	
	
	$this->Ln(11);
	  //$this->Cell(10,7,'',0,0,'L');
	   //$this->SetFont('Arial','U',12);
		//$this->Cell(90,7,'Bill to Party:',0,0,'C');
		//$this->Cell(90,7,'Ship to Party:',0,0,'C');
		//$this->SetFont('Arial','',10);
		//$this->Ln(6);
		//$this->Cell(10,5,'',0,0,'L');
		//$this->Cell(90,5,'PAN: '.$bill_to_party_name,0,0,'L');
		//$this->Cell(80,5,'L.R.Dt: '.$ship_to_party_name,0,0,'L');
		$this->Ln(5);
	 $this->Cell(10,5,'',0,0,'L');
	/*$this->MultiCell(90,5,'Address:'.$bill_to_party_address,0,'L');
	$this->MultiCell(90,5,'Address:'.$ship_to_party_address,0,'L');*/
		//$this->Cell(90,5,'GSTIN/UIN : 19AALFK1531H2ZB '.$bill_to_party_address,0,0,'L');
		//$this->Cell(90,5,''.$ship_to_party_address,0,0,'L');
		//$this->Cell(80,5,'',0,0,'L');
		/*$this->Ln(5);
		$this->Cell(10,5,'',0,0,'L');
		$this->Cell(90,5,'Address'.$ship_to_party_address,0,0,'L');
		$this->Cell(80,5,'',0,0,'L');*/
		$this->Ln(5);
		//$this->Cell(10,5,'',0,0,'L');
		//$this->Cell(90,5,'STATE        : 19 West Bengal '. $bill_to_party_gstin,0,0,'L');
		//$this->Cell(80,5,''. $ship_to_party_gstin,0,0,'L');
		$this->Ln(5);
		//$this->Cell(10,5,'',0,0,'L');
		//$this->Cell(90,5,'Tax is payable on Reverse Charge Basis (Yes/No) : No '. $bill_to_party_state,0,0,'L');
		//$this->Cell(80,5,''. $ship_to_party_gstin,0,0,'L');
	 
	$this->Rect(15,58, 180, 80 ,'D');
	//$this->Rect(105,58, 90, 40 ,'D');
	
	//$this->Rect(15,86, 90, 30 ,'D');
	//$this->Rect(105,86, 90, 30 ,'D');
	
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

//$query="SELECT * FROM `sale` WHERE invoice_no='".$_REQUEST['invoice_no']."'";
//$result=mysql_query($query);
//$this->cell(10,5,"Sr No",1,0,"C");
//$this->cell(20,5," HSN SAC ",1,0,"C");
//$this->cell(70,5,"Product Description",1,0,"C");
//$this->cell(20,5," Qty ",1,0,"C");
//$this->cell(10,5," Unit ",1,0,"C");
//$this->cell(20,5," Rate ",1,0,"C");
//$this->cell(15,5," SGST % ",1,0,"C");
//$this->cell(15,5," CGST % ",1,0,"C");
//$this->cell(20,5," Amount ",1,1,"C");

//$i=1;
//$qty=0;
//$amount=0;
//$taxable=0;
//$cgst=0;
//$sgst=0;
//$igst=0;
//$total=0;
//while($row=mysql_fetch_array($result))
{


//$qty=$qty+$row['qty'];
//$amount=$amount+$row['amount'];
//$taxable=$taxable+$row['taxable_value'];
//$cgst=$cgst+$row['cgst_amount'];
//$sgst=$sgst+$row['sgst_amount'];
//$igst=$igst+$row['igst_amount'];
//$total=$total+$row['total'];
//$this->cell(10,5,$i,"LR",0,"C");
//$this->CellFitScale(20,5,$row['product_description'],"LR",0,"C");
//$this->cell(70,5,$row['hsn_code'],"LR",0,"C");
//$this->cell(20,5,$row['purchase_unit'],"LR",0,"C");
//$this->cell(10,5,$row['qty'],"LR",0,"C");
//$this->cell(20,5,$row['rate'],"LR",0,"C");
//$this->cell(15,5,$row['amount'],"LR",0,"C");
//$this->cell(15,5,$row['discount'],"LR",0,"C");
//$this->cell(20,5,$row['taxable_value'],"LR",1,"C");


//$i=$i+1;
}
//if($i<12)
{
   //while($i<=12)
   {
    // $this->cell(10,5,'',"LR",0,"C");
//$this->cell(20,5,'',"LR",0,"C");
//$this->cell(70,5,'',"LR",0,"C");
//$this->cell(20,5,'',"LR",0,"C"); 
//$this->cell(10,5,'',"LR",0,"C");
//$this->cell(20,5,'',"LR",0,"C");
//$this->cell(15,5,'',"LR",0,"C");
//$this->cell(15,5,'',"LR",0,"C");
//$this->cell(20,5,'',"LR",1,"C");

//$i++;

   }	   
}
//$this->SetFont('Arial','B',12);
//$this->cell(100,10,'',1,0,"C");
//$this->SetFont('Arial','',10);
//$this->cell(20,10,$qty,1,0,"C");
//$this->cell(10,10,'',1,0,"C");
//$this->cell(20,10,$amount,1,0,"C");


//$this->cell(15,10,$cgst,1,0,"C");
//$this->cell(15,10,$sgst,1,0,"C");

//$this->cell(20,10,"1000",1,1,"C");



//$this->cell(130,5,"GST%               TAXABLE AMT              SGST           CGST ",0,0,"L");
//$this->cell(55,5,'CGST  @  9.00%',1,0,"C");
//$this->cell(15,5,5563.80,1,1,"C");

//$this->cell(130,5,'18%                       of 618.20              5563.80           5563.80',0,0,"L");
//$this->cell(55,5,'SGST  @  9.00%',1,0,"C");
//$this->cell(15,5,5563.80,1,1,"C");



//$this->cell(130,5,'',0,0,"C");
//$this->cell(55,5,'Round Off',1,0,"C");
//$this->cell(15,5,0.40,1,1,"C");





//$this->cell(130,5,'',0,0,"L");
//$this->cell(55,5,'NET AMOUNT',1,0,"C");
//$this->cell(15,5,72948.00,1,1,"C");
//$this->Line(5, 231, 205, 231);

//$this->cell(130,5,'Total:                     61820.00             5563.80                 5563.80 ',1,0,"L");
//$this->cell(55,5,'',0,0,"C");
//$this->cell(15,5,'',0,1,"C");
//$this->Line(5, 231, 205, 231);



//$this->cell(130,5,' [In Words] :  Seventy Two Thousand Nine Hundred Forty Eight Only. : ',1,0,"L");
//$this->cell(70,5,'','LRB',1,"C");

//$this->cell(130,5,'(1) We are not responsible for any Breakage/Damage/Shortage/Leakage in transit.','LR',0,"L");
//$this->cell(70,5,'','LR',1,"L");
//$this->cell(130,5,'(2) Our responsibility ceases when the goods are delivered to the carrier.','LR',0,"L");
//$this->cell(70,5,'','LR',1,"L");

//$this->cell(130,5,'(3) Goods once sold will not be accepted back. ','LR',0,"L");

//$this->cell(70,5,'','LR',1,"C");
//$this->cell(130,5,'(4) Interest @12% p.a. will be charged,if invoice is not paid on or before due date.','LR',0,"L");

//$this->cell(70,5,'E.&.O.E','LR',1,"C");
//$this->cell(130,5,'(5) Subject to Burdwan Jurisdiction.','LRB',0,"L");
//$this->cell(70,5,'(For VENUS PRINTING)','LRB',1,"C");

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
	 //$this->cell(170,10,"Declaration: We declare that this computer generated printsheet are true and correct .",0,0,'C');
    //$this->Cell(20,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
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