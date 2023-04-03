<?

if (!$_SESSION)

{

 session_start();

}

$name=$_REQUEST['name'];
$mail=$_REQUEST['mail'];
$phone=$_REQUEST['phone'];
$occupation=$_REQUEST['occupation'];
$des=$_REQUEST['com'];
$captcha = $_REQUEST['sco'];
$captcha_check_value = $_SESSION['captcha_a'];





//$pattern = "/[.]+(aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs

//|mobi|mil|museum|name|net|org|pro|root|tel|travel|ac

//|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az

//|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bw|by

//|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx

//|cy|cz|de|dj|dk|dm|do|dz|ec|ee|eg|er|es|et|eu|fi|fj

//|fk|fm|fo|fr|ga|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr

//|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|htm|html|php|il|im|in|io|iq

//|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kr|kw|ky|kz|la

//|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mk|ml|mm

//|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|asp|cgi

//|ne|nf|ng|ni|nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk

//|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd

//|se|sg|sh|si|sk|sl|sm|sn|sr|st|sv|sy|sz|tc|td|tf|tg|th

//|tj|tk|tl|tm|tn|to|tr|tt|tv|tw|tz|ua|ug|uk|us|uy|uz|va

//|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw|levitra|viagra|casino|sex|loan|finance|slots|debt|free|html)$/i";



//$http = substr_count($des, "http");

//$href = substr_count($des, "href");

//$url = substr_count($des, "[url");

//$www = substr_count($des, "www");

//$httphrefurl = $http + $href + $url + $www;



//$http_web = substr_count($web, "http://");





$a_name = count(explode(" ",$_REQUEST[name]));

$b_name = strlen($name);

$c_name = str_word_count($name);

include 'check_spl_char.php';

$ch_name = checkSplChar($name);



$a_des = str_word_count($des);

//$b_des = strlen($des);



include 'get_real_ip.php';

$ip = getIP();



//------------- Name Checking --------------

if(($name == '') || ($c_name == 0)){

$cont_error = "Error! Plz enter your name.";

}elseif($a_name > 2){

$cont_error = "Error! More than a space is not allowed on the name field.";

}elseif($b_name > 21){

$cont_error = "Error! Name consists of maximum 21 characters.";

}elseif($ch_name == 0){

$cont_error = "Error! Special characters are not allowed on the name field.";

}

//------------- Email ID Checking --------------

elseif($mail == ''){

$cont_error = "Error! Please enter an e-mail id.";



}elseif(!filter_var($_REQUEST[mail], FILTER_VALIDATE_EMAIL)){

$cont_error = "Error! The e-mail you entered was not in the proper format.";

}

//------------- Website URL checking -------------

//--------------- Comment checking---------------

elseif(($des == '') || ($a_des == 0)){

$cont_error = "Error! Comment cannot be blank.";

}

elseif($a_des > 250){

$cont_error = "Error! Comment consists of maximum 250 words.";

}

//------------- Spam comment checking ------------

//elseif (($des != '') && (preg_match($pattern, $des))){

//$cont_error = "Error! Comment looks a bit spammy. Rewrite it please.";

//}

//elseif (($des != '') && ($http > 0 OR $href > 0 OR $url > 0 OR $www > 0 OR $httphrefurl > 0)){

//$cont_error = "Error! Comment looks a bit spammy. Rewrite it please.";

//}

// Get the IP/ensure that what we have is a real IP

elseif(($ip == '') || ($ip == 'unknown'))

{ 

$cont_error = "Error! IP not found. Rewrite it please.";

}

//------------- Security Code Checking --------------

elseif(($captcha == '') || ($captcha == 'Enter the security code')){

unset($captcha_check_value);

$cont_error = "Error! Please enter the security code.";

}elseif($captcha != $captcha_check_value){

unset($captcha_check_value);

$cont_error = "Error! Please enter the security code correctly.";

}

else{



//-------------------------------------  Please change the matter  =----------------------------------



$headers .= "From:" . $name . "<" .$mail . ">" ."\r\n";

$headers .= "Holi Child School Burdwan - ".$name." Website Enquiry Form";

$to="holychildschool.burdwan@gmail.com";



$message ="Name = $name\nEmail = $mail\nPhone = $phone\nOccupation = $occupation\nComments = $des\n";



if(mail($to,"Holi Child School Burdwan - Feedback Form",$message,$headers)) {

$contact_msg =  "Message Sent. We will respond very soon. Thanks";
$name='';
$mail='';
$phone='';
$occupation='';
$des='';

} else {

$cont_error = "There was a problem sending the mail. Please contact to technofav@gmail.com";

}



}

?>

<?

if($contact_msg != ''){

	echo "<span style=\"color:#FF0000\">".$contact_msg."</span><br>";

}else{

?>

	<FORM name="ajax" method="POST" action="">

	<?

	if($cont_error != ''){

		echo "<span style=\"color:#FF0000; font-size:15px\">".$cont_error."</span><br>";

	}

	?>

	

	<input name="name" type="text" id="name" maxlength="30" class="formin1" value="<?=$name;?>" placeholder="Your Name">

	

	<input type="hidden" name="dyn" size="32" value="">

	

	<input name="mail" type="text" maxlength="255" class="formin1" id="mail" value="<?=$mail;?>"  placeholder="Email Address">

	<input name="phone" type="text" maxlength="255" class="formin1" id="phone" value="<?=$phone;?>"  placeholder="Mobile Number">
    
    <input name="occupation" type="text" maxlength="255" class="formin1" id="occupation" value="<?=$occupation;?>"  placeholder="Occupation">

	<textarea rows="2" name="com" cols="55" class="formin1" id="com" placeholder="Comments"><?=$des;?></textarea>

	
	

	<img src="/captcha.php" alt=""><br>	

	<input type="text" name="sco" id="sco" maxlength="30" class="formin1" placeholder="Security Code">

	

	<INPUT type="BUTTON" value="Submit"  ONCLICK="submitForm()" alt=""  class="contact-btn">



	</FORM>

<?

}

?>

