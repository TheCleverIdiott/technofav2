<?php 
ob_start();
error_reporting(0);
$page = "alumni";
include"conn.php";
?>

 <!-- Notice  -->
	
		
			
					
                     <section class="counter-section noticebg">
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-md-6">
					<marquee behavior="alternate" hight="20" scrollamount="05" >
                  <?php  
                $snotice=mysqli_query($con,"select * from `snotice` order by id desc");
               while($row=mysqli_fetch_array($snotice))
                    {                     
                     
                      ?>
                  <a style="font-size:20px; color:#fff; letter-spacing:1px;" href="<?php echo $row[file]; ?>"><?php echo $row[title]; ?></a>&nbsp; &nbsp;
               <?php
                  }?>
				
				</marquee>
                  </div>
                  </div>
                  </div>
                  </section>
                   
                
			
		
	
	<!-- Notice -->