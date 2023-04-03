<?php
ob_start();
error_reporting(0);
$page="";
include"conn.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Burdwan Holychild School</title>
        <meta charset="UTF-8">
        <meta name="description" content="Unica University Template">
        <meta name="keywords" content="event, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->   
        <link href="img/favicon.png" rel="shortcut icon"/>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/themify-icons.css"/>
        <link rel="stylesheet" href="css/owl.carousel.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <link href="css/lightbox.css" rel="stylesheet" type="text/css">

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
 
}

</script>


<style>
#output_image
{
 height:100px;
 width:100px;
}
</style>
    </head>
    <body>
        <?php
        if($_GET[id]=='success'){
        
        ?>
    <script type="text/javascript">
	swal("Thank You!", ", Your admission form submited successfully", "success");
    </script>
     
     <?php
        }
        ?>
        <!-- Page Preloder -->

        <?php include "header.php"; ?>


        <?php include "scroll-notice.php"; ?>


        <!-- Services section -->
        <section class="service-section spad">
        
        
        
        
        
        <div class="container services">
            
			
			<div class="row">
			  <form action="pdf/emp_report.php" method="post" class="wpcf7-form" enctype="multipart/form-data">	
                <!--LeftSide-->
                <div class="col-lg-9 col-sm-6 service-item">
					<div class="box-white">
                    
                    <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt="">Admission Form </h3>
                        
                                           
					</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3"></div>
                <div class="col-md-6">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 half_col">
                        <p><span class="first_name"><span class="wpcf7-form-control-wrap fname">
						<select class="form-control_2" name="fname" id="fname" placeholder="Class" required>
                        <option value="">Select</option>
                        <option value="ICSE">ICSE</option>
                        <option value="ISC">ISC</option>
                        <option value="ICSE">Pre-School</option>
                        <option value="ICSE">I to VIII</option>
                        
                        </select>
                        
                        
                        </span></span></p>
                        </div>
                    
                </div>
                        <div class="col-md-3"></div>
                
            </div>
                    
                    
                    <div class="margin-bot">
                  
                    
                    
                    
                    <div class="form-group">
                        <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                        <p>Upload Student's Recent image</p>
                        
                        <input type="file" name="download_for" id="download_for" accept="image/*" onchange="preview_image(event)" >
                        
                        
                      
                        </div>
                       
                        
                        
                        <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                      
                        <p>Preview Image</p>
                        
                        
                        
                        <img id="output_image"/>
                        </div>
                        </div>
                        
                        
                   
                       
                    
                        
                        <div class="form-group">
                        <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                        <p><span class="first_name"><span class="wpcf7-form-control-wrap fname"><label class="">Select Class</label><select class="form-control" name="a" id="fname"  required>
                        <option value="">Select Class</option>
                        <option value="Play Group">Play Group</option>
                        <option value="Nursery">Nursery</option>
                        <option value="LKG">LKG</option>
                        <option value="UKG">UKG</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                        <option value="VI">VI</option>
                        <option value="VII">VII</option>
                        <option value="VIII">VIII</option>
                        <option value="IX">IX</option>
                        <option value="X">X</option>
                        <option value="XII">XI</option>
                        <option value="XII">XII</option>
                        </select>
                        
                        
                        </span></span></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p><span class="last_name"><span class="wpcf7-form-control-wrap lname"><label class="">Select Student Name</label><input type="text" class="form-control" id="lname"  name="b" required></span></span></p>
                        </div>
                        </div>
                        
                        
                        
                        
                        <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Date Of Birth</label><input type="date" name="c" class="form-control" id="company"  required></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Blood Group</label><input type="text" name="d" class="form-control" id="email_id"  required="TRUE"></span></span></p>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Select Gender</label><select name="e" class="form-control" id="company"  required>
                                                            <option value="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Others">Others</option>
                                                        </select>



                                                        </span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Select Religion</label><select input type="text" name="f" class="form-control" id="email_id">
														
														 <option value="">Select Religion</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Muslim">Muslim</option>
															<option value="Buddhist">Buddhist</option>
															<option value="Christian">Christian</option>
															<option value="Sikh">Sikh</option>
                                                           
                                                        </select>
                                                        </span></span></p>
                                                    </div>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Select Caste</label><select input type="text" name="g" class="form-control" id="company" >
                                                            
                                                           <option value="">Select Caste</option>
                                                            <option value="General">General</option>
                                                            <option value="SC">SC</option>
															<option value="ST">ST</option>
															<option value="OBC">OBC</option>
        
															
                                                           
                                                        </select>
                                                            
                                                            
                                                        </span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Father Name</label><input type="text" name="h" class="form-control" id="email_id" ></span></span></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Mobile No.</label><input type="text" name="i" class="form-control" id="company" ></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Occupation</label><input type="text" name="j" class="form-control" id="email_id" ></span></span></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Monthly Income</label><input type="text" name="k" class="form-control" id="company"  required></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Service/Business</label><input type="text" name="l" class="form-control" id="email_id"  required></span></span></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Name Of the Company/Concern</label><input type="text" name="m" class="form-control" id="company" ></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Address With Contact No.</label><input type="text" name="n" class="form-control" id="email_id" ></span></span></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-12"  style="marging:30px 0; background: #f5f5f5; padding:18px 0;">
                                                
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Mother'S Name</label><input type="text" name="o" class="form-control"   required></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Mobile No.</label><input type="text" name="p" class="form-control"  required></span></span></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Occupation</label><input type="text" name="q" class="form-control" required></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Monthly Income</label><input type="text" name="r" class="form-control"  ></span></span></p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Service/Business</label><input type="text" name="s" class="form-control" ></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Name Of The Company/Concern</label><input type="text" name="t" class="form-control"></span></span></p>
                                                    </div>
                                                </div>
                                                
                                               <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Address With Contact No.</label><input type="text" name="u" class="form-control"></span></span></p>
                                                    </div>
                                               
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Email Address</label><input type="text" name="uv" class="form-control" required></span></span></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                </div>
                                               
                                                
                                                 <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Full Present Address</label><input type="text" name="v" class="form-control" ></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Full Permanent Address</label><input type="text" name="w" class="form-control"></span></span></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Emergency Contact Person with Phone No.</label><input type="text" name="x" class="form-control"></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Name Of The Childs House Physician And Details</label><input type="text" name="y" class="form-control"></span></span></p>
                                                    </div>
                                                </div>
                                                


                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 half_col">
                                                        <p><span class="first_name"><span class="wpcf7-form-control-wrap company"><label class="">Student Suffering From Any Disability:</label><input type="text" name="z" class="form-control"></span></span></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                                                        <p><span class="last_name"><span class="wpcf7-form-control-wrap email"><label class="">Additional Information(If Any)</label><input type="text" name="aa" class="form-control"></span></span></p>
                                                    </div>
                                                </div>
                                                
                    
                    <div class="send_section"><input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit btn btn-success" name="submit"><span class="ajax-loader"></span>
                                                </div>
                    
                    
                    
                    
                    </form>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    </div>
                </div>
                <!--LeftSide-->
				
              


                
                <?php include "aside.php"; ?>
                
				
                
                
			</div>
		</div>
        
        
        
        
        
        </section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
           



        <?php include "all-modal.php"; ?>
        <?php include "footer.php"; ?>







        <!--ScrollNews-->
        <script>
            jQuery.fn.liScroll = function(settings) {
            settings = jQuery.extend({
            travelocity: 0.03
            }, settings);		
            return this.each(function(){
            var $strip = jQuery(this);
            $strip.addClass("newsticker")
            var stripHeight = 1;
            $strip.find("li").each(function(i){
            stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
            });
            var $mask = $strip.wrap("<div class='mask'></div>");
            var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");								
            var containerHeight = $strip.parent().parent().height();	//a.k.a. 'mask' width 	
            $strip.height(stripHeight);			
            var totalTravel = stripHeight;
            var defTiming = totalTravel/settings.travelocity;	// thanks to Scott Waye		
            function scrollnews(spazio, tempo){
            $strip.animate({top: '-='+ spazio}, tempo, "linear", function(){$strip.css("top", containerHeight); scrollnews(totalTravel, defTiming);});
            }
            scrollnews(totalTravel, defTiming);				
            $strip.hover(function(){
            jQuery(this).stop();
            },
            function(){
            var offset = jQuery(this).offset();
            var residualSpace = offset.top + stripHeight;
            var residualTime = residualSpace/settings.travelocity;
            scrollnews(residualSpace, residualTime);
            });			
            });	
            };

            $(function(){
            $("ul#ticker01").liScroll();
            });
        </script>
        <!--ScrollNews-->




        <script src="js/lightbox-plus-jquery.min.js"> </script>
        <!--====== Javascripts & Jquery ======-->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>





    </body>
</html>