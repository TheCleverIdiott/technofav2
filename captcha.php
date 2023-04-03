<?php 
$stringa = rand ( 0000,9999 ) ; 
$stringa = str_replace ( 'B', 'M', $stringa ) ; 
$stringa = str_replace ( 'C', 'A', $stringa ) ; 
$stringa = str_replace ( 'N', 'L', $stringa ) ; 
$stringa = str_replace ( 'T', 'Z', $stringa ) ;

/*$stringb = rand ( 000000,999999 ) ; 
$stringb = str_replace ( '2', 'S', $stringb ) ; 
$stringb = str_replace ( '6', 'a', $stringb ) ; 
$stringb = str_replace ( '7', 'N', $stringb ) ; 
$stringb = str_replace ( '4', 'R', $stringb ) ;*/

//$string = $stringa;
if(!$_SESSION)
{
session_start();
}
$_SESSION['captcha_a'] = $stringa;

//echo '<img src=captcha.php?code='.$string.' />';


header ( "Content-type: captcha/jpeg" ) ; 
$string = htmlspecialchars ( strip_tags ( stripslashes ( $stringa ) ) , ENT_QUOTES ) ; 
$image = @imagecreate ( 150, 30 ) ; 
$black = imagecolorallocate ( $image, 0, 0, 0 ) ; 
$white = imagecolorallocate ( $image, 146, 235, 124 ) ; 

		$rand 	= mt_rand(1,6);
		$image 	= '0'.$rand.'.jpg';
		
$NewImage =imagecreatefromjpeg("captcha/".$image);//image create by existing image and as back ground 

$LineColor = imagecolorallocate($NewImage,233,239,239);//line color 
$TextColor = imagecolorallocate($NewImage, 0, 0, 0);//text color-white



imagestring ( $NewImage, 15, 5, 1, $string, $TextColor ) ; 
imagegif ( $NewImage ) ; 
imagedestroy ( $NewImage ) ; 






?>




