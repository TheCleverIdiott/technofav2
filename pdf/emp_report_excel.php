<?php
require_once "excelexport.php";
include'conn.php';
session_start();
$query="SELECT *
FROM `admin_attendance`
WHERE id =".$_SESSION['t1']."
AND date
BETWEEN '".$_SESSION['txtDob']."'
AND '".$_SESSION['txtDob1']."'";
$result=mysql_query($query,$con);


$xls = new ExcelExport();
$xls->addRow(Array("","","Date:-".date("Y-m-d")));
$xls->addRow(Array(""));
$xls->addRow(Array(""));
$query1="SELECT *
FROM `emp_add_all`
WHERE id =".$_SESSION['t1'];
$result1=mysql_query($query1,$con);
while($row=mysql_fetch_assoc($result1))
{
extract($row);

$xls->addRow(Array("Name :-".$name,"Designation :- ".$post,"Contact :-".$phone));
}
$xls->addRow(Array(""));
$xls->addRow(Array("SL.No","Entry Time","Exit","Date","Duration"));
$i=0;
while($row=mysql_fetch_assoc($result))
{
extract($row);
$i=$i+1;
$xls->addRow(Array($i,$entry,$exit,$date,$duration));
}
$xls->download("websites.xls");
?>