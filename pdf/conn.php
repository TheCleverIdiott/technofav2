<?php
error_reporting(0);
$dbname = 'softwar9_riya';
$dbuser = 'softwar9_riya';
$dbpass = 'Mainak@9';
$dbhost = 'localhost';
$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysql_select_db($dbname) or die("Could not open the db '$dbname'");

?>