<?php 
ob_start();
error_reporting(0);
$page = "home";
include"conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Burdwan Holy Child School</title>
	
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
	<link rel="stylesheet" type="text/css" media="all" href="css/responsiveCarousel.min.css"> 
<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link href="css/lightbox.css" rel="stylesheet" type="text/css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  
  
  
  
<script src="js/jquery-latest.min.js"></script>


<link href="css/popup.css" rel="stylesheet" />
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});

});

</script>


</head>
<body>
    
<div class='popup'>
<div class='cnt223'>
<img src='images/x.png' alt='quit' class='x' id='x' />
<img src="images/popup.jpg" style="width: 100%; height: 100%;">
</div>
</div>

<!--PopUpWindow-->   
    
    
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include "header.php"; ?>


	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="img/hero-slider/1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero-slider/2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero-slider/3.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero-slider/4.jpg"></div>
            
		</div>
	</section>
    
    
    
	<!-- Hero section end -->


	<!-- Notice  -->
<!-- 	<section class="counter-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-6">
					<marquee behavior="alternate" hight="20" scrollamount="05" style="font-size:20px; color:#fff; letter-spacing:1px;">Admission Going On from Nursery to Class IX</marquee>
				</div>
				
                
			</div>
		</div>
	</section> -->
	<?php include "scroll-notice.php"; ?>
	<!-- Notice -->


	<!-- Services section -->
	<section class="service-section spad2">
		<div class="container services">
			<div class="section-title text-center">
				<h3 style="color: #020031">About The School</h3>
				<p>Opportunities are the launch pads, which propel a person towards greater heights of success. By providing opportunities that promote social, emotional, cultural, mental and physical growth, we at Burdwan Holy Child School strive to enhance our students' potential and personality into one of an all-rounded individual, a contributing member to society and the nation at large.</p>
			</div>
			<div class="row">
				
                <div class="col-lg-4 col-sm-6 service-item">
					<div class="box-1 box-11">
                    <div class="service-icon">
						<img src="img/services-icons/1.png" alt="1">
					</div>
					<div class="service-content">
						<h4>Early Years</h4>
						<p>It caters to the specific needs of young learners in a safe and nurturing family environment, within the larger canvas.</p>
					</div>
				</div>
                </div>
                
				
                <div class="col-lg-4 col-sm-6 service-item">
                <div class="box-2 box-12">
					<div class="service-icon">
						<img src="img/services-icons/2.png" alt="1">
					</div>
					<div class="service-content2">
						<h4>Elementary School</h4>
						<p>We facilitate an atmosphere and ambience that celebrates these differences and backgrounds in a warm and nurturing environment.</p>
					</div>
				</div>
                </div>
                
				<div class="col-lg-4 col-sm-6 service-item">
                <div class="box-1 box-11">
					<div class="service-icon">
						<img src="img/services-icons/3.png" alt="1">
					</div>
					<div class="service-content">
						<h4>Middle School</h4>
						<p>It serves as a bridge between Elementary School and High School and has a long-term impact on a student's readiness for future</p>
					</div>
				</div>
                </div>
                
                
				<div class="col-lg-4 col-sm-6 service-item">
                <div class="box-2 box-12">
					<div class="service-icon">
						<img src="img/services-icons/4.png" alt="1">
					</div>
					<div class="service-content2">
						<h4>High School</h4>
						<p>There is a constant effort to uphold, inculcate, and nurture values and principles that foster holistic development in our students.</p>
					</div>
				</div>
                </div>
                
                
				<div class="col-lg-4 col-sm-6 service-item">
                <div class="box-1 box-11">
					<div class="service-icon">
						<img src="img/services-icons/5.png" alt="1">
					</div>
					<div class="service-content">
						<h4>Curriculum & Exams</h4>
						<p>Prepare students for life by enabling them to develop an informed curiosity and a lasting passion for learning.</p>
					</div>
				</div>
                </div>
                
				<div class="col-lg-4 col-sm-6 service-item">
                <div class="box-2 box-12">
					<div class="service-icon">
						<img src="img/services-icons/6.png" alt="1">
					</div>
					<div class="service-content2">
						<h4>Activity Hub</h4>
						<p>Children need a platform to unleash their creativity, to understand and appreciate Indian and Global culture and preserve it...</p>
					</div>
				</div>
                </div>
                
                
			</div>
		</div>
	</section>
	<!-- Services section end -->

	
	<!-- Enroll section -->
	<section class="enroll-section spad set-bg" data-setbg="img/enroll-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title text-white">
						<h3>Co-Curricular</h3>
						<p>Get started with us to explore the exciting</p>
					</div>
					<div class="enroll-list text-white">
						<div class="enroll-list-item">
							<span>1</span>
							<h5>Visual Arts</h5>
							<p>A wide range of courses are offered in the performing arts</p>
						</div>
						<div class="enroll-list-item">
							<span>2</span>
							<h5>Adventure & Field Trip</h5>
							<p>Students are given opportunity to participate Adventure Trip..</p>
						</div>
						<div class="enroll-list-item">
							<span>3</span>
							<h5>Safety & Secrity</h5>
							<p>A reliable security system with professional security personnel, a completely fenced campus</p>
						</div>
					</div>
				</div>
                
                
				<div class="col-lg-6">
					<div class="section-title text-white">
						<h3>&nbsp;</h3>
						<p>&nbsp;</p>
					</div>
					<div class="enroll-list text-white">
						<div class="enroll-list-item">
							<span>4</span>
							<h5>SPORTS</h5>
							<p>Champions are made from something they have deep inside of them</p>
						</div>
						<div class="enroll-list-item">
							<span>5</span>
							<h5>Music</h5>
							<p>Children can make beautiful music is less significant..</p>
						</div>
						<div class="enroll-list-item">
							<span>6</span>
							<h5>Experiential learning</h5>
							<p>Teach me and I remember. Involve me and I learn</p>
						</div>
					</div>
				</div>
                
                
                
			</div>
            
		</div>
	</section>
	<!-- Enroll section end -->

































	<!-- Courses section -->
	<section class="courses-section spad2">
		<div class="container">
			<div class="section-title text-center">
				<h3 style="color: #020031">Recent Event Gallery</h3>
				<p>Building a better world, one course at a time</p>
			</div>
			<div class="row">
				
                
		
			<div class="news_panel_inner">
	<div class="container">
    	
    	<div id="w">
        <nav class="slidernav">
        <div id="navbtns" class="clearfix">
        <a href="#" class="previous"><img src="images/arrow_left.png" alt="" /></a>
        <a href="#" class="next"><img src="images/arrow_right.png" alt="" /></a>
        </div>
        </nav>
        <div class="crsl-items gallery" data-navigation="navbtns">
        <div class="crsl-wrap">
        
        
<?php  
                	$folder_image=mysqli_query($con,"select * from `folder_image` order by id desc LIMIT 6");
               		while($row=mysqli_fetch_array($folder_image))
                    {                     
                     
                      ?>

<div class="crsl-item">
<div class="mission">

<div class="left_image_panel">

                    <img src="<?php echo $row[file]; ?>" class="img-responsive"><br>
                    
</div>

</div>
</div>

<?php
                     } ?>


</div>
</div>
</div>
</div>
</div>
			
		
	
                
             	   
                
                    <!-- course item -->
                    <div class="col-lg-4 col-md-6 course-item">
                    
                    </div>
                    <!-- course item -->
                    
                    
                    
                
                
                
                
				
                </div>
				</div> 
                
                
                
                
                
			</div>
		</div>
	</section>
	<!-- Courses section end-->


	<!-- Fact section -->
	<section class="fact-section spad set-bg" data-setbg="img/fact-bg.jpg">
		<div class="container">
			<h4>First Day at School!</h4>
            <h3>ARE YOU READY ?</h3>
            <p>Opportunities are the launch pads, which propel a person towards greater heights of success. By providing opportunities that promote social, emotional, cultural, mental and physical growth, we at Burdwan Holy Child School strive to enhance our students' potential and personality into one of an all-rounded individual, a contributing member to society and the nation at large.</p>
		</div>
	</section>
	<!-- Fact section end-->



<!--OnlineQuery-->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
 <!--OnlineQuery-->
<!-- Modal --> 


<?php include "footer.php"; ?>





	
<script src="js/lightbox-plus-jquery.min.js"> </script>

	<!--====== Javascripts & Jquery ======-->

	<script src="js/owl.carousel.min.js"></script>
	
	<script src="js/main.js"></script>
    
    
  
    <script type="text/javascript" src="js/responsiveCarousel.min.js"></script> 
<script type="text/javascript">
$(function(){
	
  
  
   $('.crsl-items').carousel({
	autoRotate: 4000,  
    visible: 3,
    itemMinWidth: 245,
    itemEqualHeight: 370,
    itemMargin: 30,
  });
  
  $("a[href=#]").on('click', function(e) {
    e.preventDefault();
  });
});
</script>
	
</body>
</html>