<?
function url_check($link){
$result = 1;
    if (! ereg("^https?://",$link)) {
        //$status = "This demo requires a fully qualified http:// URL";
		return 2;
    } else {
        if (@fopen($link,"r")) {
            //$status = "This URL s readable";
			return 1;
        } else {
            //$status = "This URL is not readable";
			return 0;
        }
    }
}
?>