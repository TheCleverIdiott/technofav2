<?php
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>

<?php
error_reporting(0);
 
	
	if($_POST['sub']=="Submit")
	{
		$a= $_POST['a'];
		$b = $_POST['b'];
		$c = $_POST['c'];
		$d = $_POST['d'];
		$e = $_POST['e'];
		$f = $_POST['f'];
		$g = $_POST['g'];
		$h = $_POST['h'];
		$i = $_POST['i'];
		$j = $_POST['j'];
		$k = $_POST['k'];
		$l= $_POST['l'];
		$m= $_POST['m'];
		$n=$_POST['n'];
		
		$o= $_POST['o'];
		$p= $_POST['p'];
		$q = $_POST['q'];
		$r = $_POST['r'];
		$s = $_POST['s'];
		$t = $_POST['t'];
		$u = $_POST['u'];
		$v= $_POST['v'];
		$w= $_POST['w'];
		$x = $_POST['x'];
		$y= $_POST['y'];
		$z= $_POST['z'];
		$aa= $_POST['aa'];
		
	 $path="File_Upload/".time()."_".$_FILES[pic][name];
    copy($_FILES[pic][tmp_name],$path);
	$qq="insert into `admission` values('','$path')";
	$query=mysqli_query($con,$qq);

	
		
		$to="holychildschool.burdwan@gmail.com";
		$subject = "Application for admission";
		 $msg="<table width='569' border='0' align='center' cellpadding='0' cellspacing='0' style='font-family:Arial, Helvetica, sans-serif; font-size:10pt; border:1px solid #ccc;'> ";
		    $msg.= "<tr>";
			$msg.="<td colspan='4'>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br> <center><b>-: Application for admission :-</b></center> <br>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br></td>";
			 $msg.="</tr>";
			 
			 $msg.="<tr>";
			 $msg.= "<td width='16' height='25'>&nbsp;</td>";
			$msg.= "<td width='150'>Photo</td>";
			$msg.= "<td width='50' height='25'><strong>:</strong></td>";
			$msg.= "<td height='25'><img src='https://bwnholychildschool.org/demo/$path' height='100' width='100'></td>";
			$msg.="</tr>";
		
			 $msg.="<tr>";
			 $msg.= "<td width='16' height='25'>&nbsp;</td>";
			$msg.= "<td width='150'>Class</td>";
			$msg.= "<td width='50' height='25'><strong>:</strong></td>";
			$msg.= "<td height='25'>$a</td>";
			$msg.="</tr>";
		
			$msg.= "<tr>";
			$msg.= "<td height='25'>&nbsp;</td>";
			$msg.= "<td height='25'>Student Name</td>";
			$msg.= "<td width='50' height='25'><strong>:</strong></td>";
	    	$msg.= "<td height='25'>$b</td>";
			$msg.= "</tr>";
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Date Of Birth</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$c</td>";
		$msg.= "</tr>";
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Blood Group</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$d</td>";
		$msg.= "</tr>";
		
		
		$msg.= "<tr>";
        $msg.= "<td height='25'>&nbsp;</td>";
        $msg.= "<td height='25'>Gender</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$e</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Religion</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$f</td>";
		$msg.= "</tr>";
		
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Caste</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$g</td>";
		$msg.= "</tr>";
		
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Father Name</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$h</td>";
		$msg.= "</tr>";
		
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Mobile</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$i</td>";
		$msg.= "</tr>";
		
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Occupation</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$j</td>";
		$msg.= "</tr>";
		
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Monthly Income</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$k</td>";
		$msg.= "</tr>";
		
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Service/Business</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$l</td>";
		$msg.= "</tr>";
		
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Name of the Company/Concern</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$m</td>";
		$msg.= "</tr>";
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Address with Contact No.</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$n</td>";
		$msg.= "</tr>";
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Mother's Name:</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$o</td>";
		$msg.= "</tr>";
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Mobile:</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$p</td>";
		$msg.= "</tr>";
		
		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Occupation</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$q</td>";
		$msg.= "</tr>";


		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Monthly Income</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$r</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Service/Business</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$s</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Name of the Company/Concern</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$t</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Address with Contact No.</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$u</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Full Present Address</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$v</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Full Permanent Address</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$w</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Emergency Contact Person with Phone No.</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$x</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Name of the childs House Physician and details</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$y</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Student suffering from any disability:</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$z</td>";
		$msg.= "</tr>";

		$msg.= "<tr>";
		$msg.= "<td height='25'>&nbsp;</td>";
		$msg.= "<td height='25'>Additional Information</td>";
		$msg.= "<td width='50' height='25'><strong>:</strong></td>";
		$msg.= "<td height='25'>$aa</td>";
		$msg.= "</tr>";
		
		
	
		$msg.= "</table>";
	
	    $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		if(mail($to,$subject,$msg,$headers)){
		header("location:admission.php?id=success");
		}
}


?>

</body>
</html>