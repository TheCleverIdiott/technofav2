<?
function checkSplChar($data){
	 $forbid = array('--', '-', '&quot;','_','!','@','#','$','%','^','&','*','(',')','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','=');
     $i = 0;
     while ($i < 36) {
         $var = strpos($data, $forbid[$i]);
         if (!empty($var)) {
             $var++;
			 return 0;
             exit();
         }
  
         $i++;
	}
	return 1;
}
?>