<?php
error_reporting(0);
session_start();
include 'conn.php';
if(!isset($_SESSION['email'])){
header("location:index.php");
}



if(isset($_REQUEST['invoice_no']))
{
	for($i=1;$i<=20;$i++) {
  if ($_REQUEST['product_description'.$i]!='')
   {
	 $product_description = substr($_REQUEST['product_description'.$i], 0, -1);   
        $sql="INSERT INTO `raw_material_sale`(`invoice_no`, `invoice_date`, `state`, `state_code`, `challan_no`, `vehicle_number`,
	   `date_of_supply`, `place_of_supply`, `bill_to_party_name`, 
	   `bill_to_party_address`, `bill_to_party_gstin`, `bill_to_party_state`,
	   `bill_to_party_state_code`, `ship_to_party_name`, `ship_to_party_address`,
	   `ship_to_party_gstin`, `ship_to_party_state`, `ship_to_party_state_code`,
	   `product_description`, `hsn_code`, `qty`, `rate`, `amount`, `discount`, 
	   `taxable_value`, `cgst_rate`, `cgst_amount`, `sgst_rate`, `sgst_amount`,
	   `total`, `qty_total`, `amount_total`, `discount_total`, `taxable_value_total`,
	   `cgst_total`, `sgst_total`, `grand_total`, `sale_by`) VALUES ('".$_REQUEST['invoice_no']."'
	   ,'".$_REQUEST['invoice_date']."','".$_REQUEST['state']."','".$_REQUEST['state_code']."'
	   ,'".$_REQUEST['challan_no']."','".$_REQUEST['vehicle_no']."','".$_REQUEST['date_of_supply']."'
	   ,'".$_REQUEST['place_of_supply']."','".$_REQUEST['bill_party_name']."','".$_REQUEST['bill_to_party_address']."'
	   ,'".$_REQUEST['bill_party_gstin']."','".$_REQUEST['bill_party_state']."','".$_REQUEST['bill_party_code']."',
	   '".$_REQUEST['shift_party_name']."','".$_REQUEST['ship_to_party_address']."','".$_REQUEST['shift_party_gstin']."','".$_REQUEST['shift_party_state']."'
	   ,'".$_REQUEST['shift_party_code']."','".$product_description."','".$_REQUEST['hsn_code'.$i]."','".$_REQUEST['qty'.$i]."','".$_REQUEST['rate'.$i]."
	   ','".$_REQUEST['amount'.$i]."','".$_REQUEST['discount'.$i]."','".$_REQUEST['taxable_value'.$i]."','".$_REQUEST['cgst_rate'.$i]."','
	   ".$_REQUEST['cgst_amount'.$i]."','".$_REQUEST['sgst_rate'.$i]."','".$_REQUEST['sgst_amount'.$i]."','".$_REQUEST['total'.$i]."','
	   ".$_REQUEST['total_qty']."','".$_REQUEST['total_amount']."','".$_REQUEST['total_discount']."','".$_REQUEST['total_taxable_amount']."
	   ','".$_REQUEST['total_cgst_amount']."','".$_REQUEST['total_sgst_amount']."','".$_REQUEST['grand_total']."','".$_REQUEST['sale_by']."')";
          $query=mysql_query($sql);
		  $id=mysql_insert_id();
		  $inv=$_REQUEST['invoice_no'];
          echo mysql_error();
       	   $s = "select * from `raw_material_stock` WHERE material_name='".$_REQUEST['material_name'.$i]."'";
            $q = mysql_query($s);
            if (mysql_num_rows($q) != 0) {
                $update = "UPDATE `raw_material_stock` SET `qty`=qty-" . $_REQUEST['qty' . $i] . "  WHERE material_name='".$_REQUEST['material_name'.$i]."'";
                $query = mysql_query($update);
        }
	}
		
    $msg = "Record Inserted Successfully.";
	header("Location:pdf/emp_report2.php?id=".$id."&invoice_no=".$inv);
}


}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ajoy Engineering | Admin</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        function sum() {

            var one = document.getElementById('total1').value;
            var two = document.getElementById('total2').value;
            var three = document.getElementById('total3').value;
            var four = document.getElementById('total4').value;
            var five = document.getElementById('total5').value;
            var six = document.getElementById('total6').value;
            var seven = document.getElementById('total7').value;
            var eight = document.getElementById('total8').value;
            var nine = document.getElementById('total9').value;
            var ten = document.getElementById('total10').value;

            var eleven = document.getElementById('total11').value;
            var twelve = document.getElementById('total12').value;
           



            var result = parseInt(one) + parseInt(two) + parseInt(three) + parseInt(four) + parseInt(five) + parseInt(six) + parseInt(seven) + parseInt(eight) + parseInt(nine) + parseInt(ten) + parseInt(eleven) + parseInt(twelve);

            document.getElementById('sale_price').value = result;

        }

        function clr(price) {


            document.getElementById(price).value = "";

        }
    </script>
    <script>
        function showUser1(str, no) {
        var newStr = str.substring(0, str.length-1);
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint" + no).innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getuser2.php?q=" + newStr + "&no=" + no, true);
                xmlhttp.send();
            }
        }
    </script>
    <script>
        function showUser(str) {
			var newStr = str.substring(0, str.length-1);
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getuser.php?q=" + newStr, true);
                xmlhttp.send();
            }
        }
    </script>
	<script>
function showUser2(str,no) {
   var newStr = str.substring(0, str.length-1);
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHin"+no).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser3.php?q="+newStr+"&no="+no,true);
        xmlhttp.send();
    }
}
</script>
    <script>
        function cal(no1) {
            var result = 0;
            var gst = 0;
            var no = no1;
            var n1 = document.getElementById('p' + no).value;
            var n2 = document.getElementById('qty' + no).value;
            var n3 = document.getElementById('gst' + no).value;

            result = parseFloat(n1) * parseFloat(n2);
            document.getElementById('price' + no).value = result;
            gst = parseFloat(result) + ((parseFloat(result) * parseInt(n3)) / 100);
            document.getElementById('total' + no).value = gst;
        }
    </script>
	<script>
/*function discount(no1)
{
var result=0 ;
var gst=0 ;
var no=no1;
var n1=0;
var n2=0;
var n3=0;
var n4=0;
 n1=document.getElementById('p'+no).value;
 n4=document.getElementById('qty'+no).value;
 n2=document.getElementById('discount'+no).value;
 n3=document.getElementById('gst'+no).value;

result = parseFloat(n1)* parseFloat(n4)- parseFloat(n2) ; 
document.getElementById('price'+no).value = result;
gst = parseFloat(result)+((parseFloat(result) * parseInt(n3))/100 );
document.getElementById('total'+no).value = gst;
} */
function tot(i)
{
	var qty = 0;
	var price = 0;
	var total = 0;
	
	qty = document.getElementById('qty'+i).value;
	price = document.getElementById('rate'+i).value;
	
	total = qty * price;
	document.getElementById('amount'+i).value = total;
	document.getElementById('taxable_value'+i).value = total;
	/*document.getElementById('total'+i).value = total;*/
	


}


function discount(i)
{
	var total = 0;
	var dis = 0;
	var net = 0; 
	
	total = document.getElementById('amount'+i).value;
	dis = document.getElementById('discount'+i).value;
	net = ((100 - dis) * total) / 100;
	document.getElementById('taxable_value'+i).value = net;
	/*document.getElementById('total'+i).value = net;*/
	
	
}

function cgst(i)
{
	var total = 0;
	var cgst = 0;
	var cgstAmount = 0;
	var sgst = 0;
	var sgstAmount = 0;
	var totalGst = 0;
	var gt = 0;
	
	
	/*var gt = 0;*/
	
	total = document.getElementById('taxable_value'+i).value;
	cgst = document.getElementById('cgst_rate'+i).value;
	cgstAmount = (cgst * total) / 100;
	document.getElementById('cgst_amount'+i).value =  Math.round(cgstAmount);
	document.getElementById('sgst_rate'+i).value =  cgst;
	document.getElementById('sgst_amount'+i).value = Math.round(cgstAmount);
	totalGst = 2 * cgstAmount;
	gt = parseInt(total) + parseInt(totalGst);
	/*document.getElementById('total'+i).value = 0;*/
	document.getElementById('total'+i).value = gt;
	
	/*cgstAmount = document.getElementById('cgst_amount'+i).value; 
	gt = ((100 + cgst) * total) / 100;
	document.getElementById('cgst_amount'+i).value = cgstAmount + gt;*/
	
	
}

function totalQty(i)
{
	/* var qtyy = 0;
	var total = 0;
	var tot = 0;
	
	total = document.getElementById('total_qty').value;
	qtyy =  document.getElementById('qty'+i).value;
	tot = parseInt(total) + parseInt(qtyy);
	document.getElementById('total_qty').value = tot;*/
	
	var amnto = 0;
	var amnt01=document.getElementById('qty1').value;
	var amnt02=document.getElementById('qty2').value;
	var amnt03=document.getElementById('qty3').value;
	var amnt04=document.getElementById('qty4').value;
	var amnt05=document.getElementById('qty5').value;
	var amnt06=document.getElementById('qty6').value;
	var amnt07=document.getElementById('qty7').value;
	var amnt08=document.getElementById('qty8').value;
	var amnt09=document.getElementById('qty9').value;
	var amnt010=document.getElementById('qty10').value;
	var amnt011=document.getElementById('qty11').value;
	var amnt012=document.getElementById('qty12').value;
	amnto=parseInt(amnt01)+parseInt(amnt02)+parseInt(amnt03)+parseInt(amnt04)+parseInt(amnt05)+parseInt(amnt06)+parseInt(amnt07)+parseInt(amnt08)+parseInt(amnt09)+parseInt(amnt010)+parseInt(amnt011)+parseInt(amnt012);
	document.getElementById('total_qty').value = amnto;
}

function totalAmnt(i)
{
	/*var amnt = 0;
	var total = 0;
	var tot = 0;
	
	total = document.getElementById('total_amount').value;
	amnt =  document.getElementById('amount'+i).value;
	tot = parseInt(total) + parseInt(amnt);
	document.getElementById('total_amount').value = tot;*/
	
	var amnto = 0;
	var amnt01=document.getElementById('amount1').value;
	var amnt02=document.getElementById('amount2').value;
	var amnt03=document.getElementById('amount3').value;
	var amnt04=document.getElementById('amount4').value;
	var amnt05=document.getElementById('amount5').value;
	var amnt06=document.getElementById('amount6').value;
	var amnt07=document.getElementById('amount7').value;
	var amnt08=document.getElementById('amount8').value;
	var amnt09=document.getElementById('amount9').value;
	var amnt010=document.getElementById('amount10').value;
	var amnt011=document.getElementById('amount11').value;
	var amnt012=document.getElementById('amount12').value;
	amnto=parseInt(amnt01)+parseInt(amnt02)+parseInt(amnt03)+parseInt(amnt04)+parseInt(amnt05)+parseInt(amnt06)+parseInt(amnt07)+parseInt(amnt08)+parseInt(amnt09)+parseInt(amnt010)+parseInt(amnt011)+parseInt(amnt012);
	document.getElementById('total_amount').value = amnto;
}

function totalDiscount(i)
{
	/*var amnt = 0;
	var total = 0;
	var tot = 0;
	
	total = document.getElementById('total_discount').value;
	amnt =  document.getElementById('discount'+i).value;
	tot = parseInt(total) + parseInt(amnt);
	document.getElementById('total_discount').value = tot;*/
	
	var amnto = 0;
	var amnt01=document.getElementById('discount1').value;
	var amnt02=document.getElementById('discount2').value;
	var amnt03=document.getElementById('discount3').value;
	var amnt04=document.getElementById('discount4').value;
	var amnt05=document.getElementById('discount5').value;
	var amnt06=document.getElementById('discount6').value;
	var amnt07=document.getElementById('discount7').value;
	var amnt08=document.getElementById('discount8').value;
	var amnt09=document.getElementById('discount9').value;
	var amnt010=document.getElementById('discount10').value;
	var amnt011=document.getElementById('discount11').value;
	var amnt012=document.getElementById('discount12').value;
	amnto=parseInt(amnt01)+parseInt(amnt02)+parseInt(amnt03)+parseInt(amnt04)+parseInt(amnt05)+parseInt(amnt06)+parseInt(amnt07)+parseInt(amnt08)+parseInt(amnt09)+parseInt(amnt010)+parseInt(amnt011)+parseInt(amnt012);
	document.getElementById('total_discount').value = amnto;
}

function totalTaxvalue(i)
{
	/*var amnt = 0;
	var total = 0;
	var tot = 0;
	
	total = document.getElementById('total_taxable_amount').value;
	amnt =  document.getElementById('taxable_value'+i).value;
	tot = parseInt(total) + parseInt(amnt);
	document.getElementById('total_taxable_amount').value = tot;*/
	var amnto = 0;
	var amnt01=document.getElementById('taxable_value1').value;
	var amnt02=document.getElementById('taxable_value2').value;
	var amnt03=document.getElementById('taxable_value3').value;
	var amnt04=document.getElementById('taxable_value4').value;
	var amnt05=document.getElementById('taxable_value5').value;
	var amnt06=document.getElementById('taxable_value6').value;
	var amnt07=document.getElementById('taxable_value7').value;
	var amnt08=document.getElementById('taxable_value8').value;
	var amnt09=document.getElementById('taxable_value9').value;
	var amnt010=document.getElementById('taxable_value10').value;
	var amnt011=document.getElementById('taxable_value11').value;
	var amnt012=document.getElementById('taxable_value12').value;
	amnto=parseInt(amnt01)+parseInt(amnt02)+parseInt(amnt03)+parseInt(amnt04)+parseInt(amnt05)+parseInt(amnt06)+parseInt(amnt07)+parseInt(amnt08)+parseInt(amnt09)+parseInt(amnt010)+parseInt(amnt011)+parseInt(amnt012);
	document.getElementById('total_taxable_amount').value = amnto;
}

function totalCgst(i)
{
	var amnt =0;
	/*var total = 0;
	var tot = 0;
	var sgst = 0;
	var sgstTot = 0;
	var tot2 = 0;
	total = document.getElementById('total_cgst_amount').value;
	sgstTot = document.getElementById('total_sgst_amount').value;
	amnt =  document.getElementById('cgst_amount'+i).value;
	sgst =  document.getElementById('sgst_amount'+i).value;
	tot = parseInt(total) + parseInt(amnt);
	document.getElementById('total_cgst_amount').value = tot;
	tot2 = parseInt(sgstTot) + parseInt(sgst);
	document.getElementById('total_sgst_amount').value = tot2;*/
	var amnt1=document.getElementById('cgst_amount1').value;
	var amnt2=document.getElementById('cgst_amount2').value;
	var amnt3=document.getElementById('cgst_amount3').value;
	var amnt4=document.getElementById('cgst_amount4').value;
	var amnt5=document.getElementById('cgst_amount5').value;
	var amnt6=document.getElementById('cgst_amount6').value;
	var amnt7=document.getElementById('cgst_amount7').value;
	var amnt8=document.getElementById('cgst_amount8').value;
	var amnt9=document.getElementById('cgst_amount9').value;
	var amnt10=document.getElementById('cgst_amount10').value;
	var amnt11=document.getElementById('cgst_amount11').value;
	var amnt12=document.getElementById('cgst_amount12').value;
	amnt=parseInt(amnt1)+parseInt(amnt2)+parseInt(amnt3)+parseInt(amnt4)+parseInt(amnt5)+parseInt(amnt6)+parseInt(amnt7)+parseInt(amnt8)+parseInt(amnt9)+parseInt(amnt10)+parseInt(amnt11)+parseInt(amnt12);
	document.getElementById('total_cgst_amount').value = amnt;
	document.getElementById('total_sgst_amount').value = amnt;
	
}

function totalGrant(i)
{
	var amnt = 0;
	
	
	var amnt1=document.getElementById('total1').value;
	var amnt2=document.getElementById('total2').value;
	var amnt3=document.getElementById('total3').value;
	var amnt4=document.getElementById('total4').value;
	var amnt5=document.getElementById('total5').value;
	var amnt6=document.getElementById('total6').value;
	var amnt7=document.getElementById('total7').value;
	var amnt8=document.getElementById('total8').value;
	var amnt9=document.getElementById('total9').value;
	var amnt10=document.getElementById('total10').value;
	var amnt11=document.getElementById('total11').value;
	var amnt12=document.getElementById('total12').value;
	amnt=parseInt(amnt1)+parseInt(amnt2)+parseInt(amnt3)+parseInt(amnt4)+parseInt(amnt5)+parseInt(amnt6)+parseInt(amnt7)+parseInt(amnt8)+parseInt(amnt9)+parseInt(amnt10)+parseInt(amnt11)+parseInt(amnt12);
	
	/*total = document.getElementById('grand_total').value;
	amnt =  document.getElementById('total'+i).value;
	tot = parseInt(total) + parseInt(amnt);*/
	document.getElementById('grand_total').value = amnt;
}

function stock(no,str)
{
	document.getElementById('stock'+no).value=str.slice(-1);

} 
</script>
<style>
hr{ 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
	border-color: #0000ff;
    border-width: 2px;
} 
</style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'header.php'; ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
           Sale
            <small>Insert</small>
          </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active">Sale Insert</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- right column -->
                    <div class="col-md-12">
                        <!-- general form elements disabled -->
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Sale Insert</h3>
                                <?php if(isset($msg)) { echo " <h3>".$msg. "</h3>"; } ?>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <form role="form">
								<hr>
								<div class="clearfix"></div>
                                    <br>
								<div class="col-md-12 ">
								  <div class="form-group">
                                        <label class="col-md-2 control-label">Invoice No</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control" placeholder="invoice no" name="invoice_no">
                                        </div>
                                        
                                        <label class="col-md-2 control-label">Invoice Date</label>
                                        <div class="col-md-4 ">
                                            <input type="date" class="form-control demo3" placeholder="date" name="invoice_date">
                                        </div>


                                    </div>
								</div>
								 <div class="clearfix"></div>
                                    <br>
								
								<div class="col-md-12 ">
								<div class="form-group">
                                        <!--<label class="col-md-2 control-label">Reverse Charge(Y/N)</label>
                                        <div class="col-md-2 ">
                                            <input type="text" class="form-control" placeholder="Y/N" name="reverse_charge">
                                        </div>-->
                                        
                                        <label class="col-md-2 control-label">State</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control demo3" placeholder="State Name" name="state">
                                        </div>
										<label class="col-md-2 control-label">Code</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control demo3" placeholder="Code" name="state_code">
                                        </div>

                                    </div>
								</div>
								<div class="clearfix"></div>
                                    <br>
									
								<div class="col-md-12 ">
								  <div class="form-group">
                                        <label class="col-md-2 control-label">Challan No</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control" placeholder="Challan No." name="challan_no">
                                        </div>
                                        
                                        <label class="col-md-2 control-label">Vehicle Number</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control demo3" placeholder="Vehicle No" name="vehicle_no">
                                        </div>


                                    </div>
								</div>
								<div class="clearfix"></div>
                                    <br>
								<div class="col-md-12 ">
								  <div class="form-group">
                                        <label class="col-md-2 control-label">Date Of Supply</label>
                                        <div class="col-md-4 ">
                                            <input type="date" class="form-control" placeholder="Transport Name" name="date_of_supply">
                                        </div>
                                        
                                        <label class="col-md-2 control-label">Place Of Supply</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control demo3" placeholder="Place Name" name="place_of_supply">
                                        </div>


                                    </div>
								</div>
								<div class="clearfix"></div>
                                    <br>
									<hr>
								<div class="col-md-12 ">
									<div class="col-md-6 ">
										<h3>Bill to Party</h3>
									</div>
									
									<div class="col-md-6 ">
										<h3>Shift to Party</h3>
									</div>
								</div>
								<div class="clearfix"></div>
                                    <br>
								<div class="col-md-12 ">
									
										<label class="col-md-1 control-label">Name</label>
                                        <div class="col-md-5 ">
                                            <input type="text" class="form-control demo4" placeholder=" Name" name="bill_party_name">
                                        </div>
									
									
										<label class="col-md-1 control-label">Name</label>
                                        <div class="col-md-5 ">
                                            <input type="text" class="form-control demo4" placeholder=" Name" name="shift_party_name">
                                        </div>
									
								</div>
								<div class="clearfix"></div>
                                    <br>
								<div class="col-md-12 ">
									
										<label class="col-md-1 control-label">Address</label>
                                        <div class="col-md-5 ">
                                            <textarea rows="4" cols="50" class="form-control demo4" placeholder="Address" name="bill_to_party_address"></textarea>
                                        </div>
										<label class="col-md-1 control-label">Address</label>
                                        <div class="col-md-5 ">
                                            <textarea rows="4" cols="50" class="form-control demo4" placeholder="Address" name="ship_to_party_address"></textarea>
                                        </div>
									
									
									
								</div>
								<div class="clearfix"></div>
                                    <br>
								<div class="col-md-12 ">
									
										<label class="col-md-1 control-label">GSTIN</label>
                                        <div class="col-md-5 ">
                                            <input type="text" class="form-control demo4" placeholder=" Enter GSTIN" name="bill_party_gstin">
                                        </div>
									
									
										<label class="col-md-1 control-label">GSTIN</label>
                                        <div class="col-md-5 ">
                                            <input type="text" class="form-control demo4" placeholder=" Enter GSTIN" name="shift_party_gstin">
                                        </div>
									
								</div>
								<div class="clearfix"></div>
                                    <br>
								<div class="col-md-12 ">
									
										<label class="col-md-1 control-label">State</label>
                                        <div class="col-md-3 ">
                                            <input type="text" class="form-control demo4" placeholder=" State" name="bill_party_state">
                                        </div>
									
									
										<label class="col-md-1 control-label">Code</label>
                                        <div class="col-md-1 ">
                                            <input type="text" class="form-control demo4" placeholder=" Code" name="bill_party_code">
                                        </div>
									
									<label class="col-md-1 control-label">State</label>
                                        <div class="col-md-3 ">
                                            <input type="text" class="form-control demo4" placeholder=" state" name="shift_party_state">
                                        </div>
									
									
										<label class="col-md-1 control-label">Code</label>
                                        <div class="col-md-1 ">
                                            <input type="text" class="form-control demo4" placeholder=" Code" name="shift_party_code">
                                        </div>
									
								</div>
								<div class="clearfix"></div>
                                    <br>
									<hr>
					<div class="box-body" style="overflow: auto;">
						<div class="row">
							<div class="col-md-12">
							 
                              <h3>Product Details</h3>
                             
							<table id="example2" border="0" width="150%" style="  border-spacing: 10px;
    border-collapse: separate;" >
								 <thead>
											<tr>
												<th style="width: 4%;">Sl</th>
												<th style="width: 18%;">Product Description</th>
												<th style="width: 6%;">HSN Code</th>
												
												
												<th style="width: 6%;">Qty</th>
												<th style="width: 6%;">Rate</th>
												<th style="width: 8%;">Amount</th>
												<th style="width: 4%;">Discount%</th>
												<th style="width: 8%;">Total</th>
												<th style="width: 4%;">CGST Rate</th>
												<th style="width: 6%;">CGST Amount</th>
												<th style="width: 4%;">SGST Rate</th>
												<th style="width: 6%;">SGST Amount</th>
												<th style="width: 4%;">IGST Rate</th>
												<th style="width: 6%;">IGST Amount</th>
												<th style="width: 8%;">Total</th>

											</tr>
								</thead>
											 
											     
													<?php
													$sl=1;
													
													while($sl<=6)
													{
														?>
													<tr>	
														<td ><input type="text" readonly="true" name="<?php echo 'sl'.$sl?>" class="form-control form-round " placeholder=" " value="<?php echo $sl ;  ?>" /></td>	
														
<td ><select class="form-control select2" name="<?php echo 'product_description'.$sl?>" onchange="showUser1(this.value,<?php echo $sl; ?>);showUser2(this.value,<?php echo $sl; ?>);stock(<?php echo $sl; ?>,this.value)" >
													<?php
                                                    $sql="select * from  rawmaterialcategory";
                                                    $q= mysql_query($sql);
                                                      echo '<option></option>';
                                                    while ($row = mysql_fetch_array($q)) 
                                                    {
                                                        echo '<optgroup label="'.$row['category'].'">';
                                                        
                                                         $s="select * from  rawmaterial where cat='".$row['category']."'";
                                                         $q1= mysql_query($s);
                                                         while ($row2 = mysql_fetch_array($q1)) 
                                                          {
                                                              echo '<option>'.$row2['name'].'</option>';
                                                          }
                                                        
                                                        
                                                        echo '</optgroup>';
                                                       
                                                    }

                                                  ?></td>	
														
		<td >
		<input type="text"  name="<?php echo 'hsn_code'.$sl?>" id="hsn<?php echo $sl; ?>" class="form-control form-round " placeholder=" " /></div></td>
						
														
														
														 
														 														 
														 <td ><input type="text"  name="<?php echo 'qty'.$sl?>" id="<?php echo 'qty'.$sl?>" class="form-control form-round " value=0 onclick="clr('<?php echo 'qty'.$sl?>')" onblur="totalQty('<?php echo $sl; ?>')"  placeholder=" "  /></td>
														 
														 <td ><input type="text"  name="<?php echo 'rate'.$sl?>" id="<?php echo 'rate'.$sl?>"  class="form-control form-round " placeholder=" "  onkeyup="tot('<?php echo $sl; ?>')" onblur="totalAmnt('<?php echo $sl; ?>');totalTaxvalue('<?php echo $sl; ?>')"  /></td>
														 
														 
														 <td ><input type="text"  name="<?php echo 'amount'.$sl?>" id="<?php echo 'amount'.$sl?>"  value=0 class="form-control form-round " placeholder=" "   /></td>

														 
														 <td ><input type="text"  name="<?php echo 'discount'.$sl?>" id="<?php echo 'discount'.$sl?>" class="form-control form-round " value=0 onclick="clr('<?php echo 'discount'.$sl?>')" placeholder=" " onblur="totalDiscount('<?php echo $sl; ?>')" onkeyup="discount('<?php echo $sl; ?>')"  /></td>
														 
														 <td ><input type="text"  name="<?php echo 'taxable_value'.$sl?>" id="<?php echo 'taxable_value'.$sl?>" class="form-control form-round " placeholder=" " value=0 /></td>
										 
														<td ><input type="text"  name="<?php echo 'cgst_rate'.$sl?>" id="<?php echo 'cgst_rate'.$sl?>" class="form-control form-round " placeholder=" " value=0 onclick="clr('<?php echo 'cgst_rate'.$sl?>')" onkeyup="cgst('<?php echo $sl; ?>')" onblur="totalCgst('<?php echo $sl; ?>');totalGrant('<?php echo $sl; ?>')"  /></td>
														
														<td ><input type="text"  name="<?php echo 'cgst_amount'.$sl?>" id="<?php echo 'cgst_amount'.$sl?>" class="form-control form-round " placeholder=" "  value=0 /></td>
														
														<td ><input type="text"  name="<?php echo 'sgst_rate'.$sl?>" id="<?php echo 'sgst_rate'.$sl?>" class="form-control form-round " placeholder=" " value=0 /></td>
													
														<td ><input type="text"  name="<?php echo 'sgst_amount'.$sl?>" id="<?php echo 'sgst_amount'.$sl?>" class="form-control form-round " placeholder=" " value=0  /></td>
														
														
														<td ><input type="text"  name="<?php echo 'Igst_rate'.$sl?>" id="<?php echo 'Igst_rate'.$sl?>" class="form-control form-round " placeholder=" " value=0 /></td>
													
														<td ><input type="text"  name="<?php echo 'Igst_amount'.$sl?>" id="<?php echo 'Igst_amount'.$sl?>" class="form-control form-round " placeholder=" " value=0  /></td>
														
														
														<td ><input type="text"  name="<?php echo 'total'.$sl?>" id="<?php echo 'total'.$sl?>" class="form-control form-round " placeholder=" " value=0 /></td>
													 <?php
													 $sl++;
													}
													
													?>
												</tr>
														
                                     
	
							</table>
							
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
                                    <br>
					<div class="col-md-12 ">
								<div class="form-group">
                                        <label class="col-md-2 control-label">Total Qty</label>
                                        <div class="col-md-4 ">
                                 <input type="text" class="form-control"  name="total_qty" id="total_qty" value=0 >
                                        </div>
                                        
                                 <label class="col-md-2 control-label">Total Amount</label>
                                        <div class="col-md-4 ">
                                 <input type="text" class="form-control demo3"  name="total_amount" id="total_amount" value=0 >
                                        </div>


                                    </div>
					</div>
					
					<div class="clearfix"></div>
                                    <br>
					
					<div class="col-md-12 ">
								  <div class="form-group">
                                        <label class="col-md-2 control-label">Total Discount%</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control"  name="total_discount" id="total_discount" value=0 >
                                        </div>
                                        
                                        <label class="col-md-2 control-label">Total Taxable Amount</label>
                                        <div class="col-md-4 ">
                 <input type="text" class="form-control demo3"  name="total_taxable_amount" id="total_taxable_amount" value=0 >
                                        </div>


                                    </div>
					</div>
					<div class="clearfix"></div>
                                    <br>
					
					<div class="col-md-12 ">
								  <div class="form-group">
                                        <label class="col-md-2 control-label">Total CGST</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control"  name="total_cgst_amount" id="total_cgst_amount" value=0 >
                                        </div>
                                        
                                        <label class="col-md-2 control-label">Total SGST</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control demo3"  name="total_sgst_amount" id="total_sgst_amount" value=0 >
                                        </div>


                                    </div>
					</div>
					
					
					
					<div class="clearfix"></div>
                               <br>
					<div class="col-md-12 ">
								  <div class="form-group">
                                        <label class="col-md-2 control-label">Grand Total</label>
                                        <div class="col-md-4 ">
                                            <input type="text" class="form-control"  name="grand_total" id="grand_total" value=0 >
                                        </div>
                                        
                                      <label class="col-md-2 control-label">Sale By</label>
                                        <div class="col-md-4 ">
                                            <select class="form-control" name="sale_by">
                                                <option selected="" value="cash">Cash</option>
                                                <optgroup label="Bank">
                                                    <?php 
													$sql="select * from bank" ; 
													$res=mysql_query($sql); 
													while ($row=mysql_fetch_array($res)) 
													{ echo '<option value="'.$row[ 'name']. '-'.$row[ 'accountno']. '">' . $row[ 'name'] . '-'.$row[ 'accountno']. '</option>'; } 
												?>
                                                </optgroup>
                                                <optgroup label="Debtors">
                                                    <?php $sql="select * from debtors" ; 
													$res=mysql_query($sql); 
													while ($row=mysql_fetch_array($res)) 
													{ 
												echo '<option value="' . $row[ 'name'] . '">' . $row[ 'name'] . '</option>'; 
												} 
												?>
                                                </optgroup>
                                            </select>
                                        </div>
   
                                    </div>
					</div>
					<div class="clearfix"></div>
                               <br>
					<div class="col-md-12 ">
								<center><button type="submit" class="btn btn-primary btn-round">Submit</button></center>
							   
					</div>
					<div class="clearfix"></div>
                              <br>
							   <hr>
							   
					

                              </form>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'footer.php'; ?>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
                //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    format: 'MM/DD/YYYY h:mm A'
                })
                //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                })
                //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                })
                //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
                //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })
        })
    </script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $(function() {
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>

</body>

</html>