<?php
require('rotation.php');
session_start();
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
// WHERE DO YOU WANT TO SAVE THE FILE
/*$dest = '/home/bwnholy/public_html/sample.pdf';*/
$dest = '../sample.pdf';
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
		
		$this->Ln(4);
		
		$this->Ln(4);
	
		$this->Ln(4);
		
		$this->Ln(4);
		
		
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
		$this->Cell(80,5,'Email Address: '.$_REQUEST['uv'],0,0,'L');
		
		
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
	  
		$this->Ln(5);
	 $this->Cell(10,5,'',0,0,'L');
	
		$this->Ln(5);
		
		$this->Ln(5);
		
	 
	$this->Rect(15,58, 180, 80 ,'D');

	$this->Ln(1);
	
    // Line break
    $this->Ln(10);
	
}

//watermark
function RotatedText($x, $y, $txt, $angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
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
   
}
}
$to = 'holychildschool.burdwan@gmail.com';
$from = 'webmail@bwnholychildschool.org';
$username = 'webmail@bwnholychildschool.org';
$password = 'Mainak.1988';
$host = 'mail.bwnholychildschool.org';
$fromname = 'bwnholychildschool.org';
$toname = $fromname;
$subject = 'ONLINE APPLICATION FORM';
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);

$pdf->SetFont('Arial','B',7);
$pdf->SetFont('Arial','B',7);
$pdf->Output($dest,'F');
// CREATE THE MAIL
$mail = new PHPMailer(true);
try {
  // SETUP FOR SMTP
  $mail->SMTPDebug = 0;               // Enable verbose debug output
  $mail->isSMTP();                    // Set mailer to use SMTP
  $mail->Host = $host;                // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;             // Enable SMTP authentication
  $mail->Username = $username;        // SMTP username
  $mail->Password = $password;        // SMTP password
  $mail->SMTPSecure = 'tls';          // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                  // TCP port to connect to

  //Recipients
  $mail->setFrom($from, $fromname);
  $mail->addAddress($to, $toname);    // Add a recipient
  $mail->addAddress($_REQUEST['uv'], "holychildschool");
  $mail->addReplyTo($from, $fromname);

  //Attachments
  $mail->addAttachment($dest);

  //Content
  $mail->isHTML(true);                 // Set email format to HTML
  $mail->Subject = $subject;
  $mail->Body    = 'PDF Attached';
  $mail->AltBody = 'PDF Attached';

  $mail->send();
  echo '<h1><center>Message has been sent</center></h1><p align="center">Chek your Email Address find your submitted form and take a print. <a href="/admission.php">Back to main page</a></p>';
} catch (Exception $e) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>