<?php 
ob_start();
error_reporting(0);
include"conn.php";
?>
<!--AsidePart-->
				<div class="col-lg-3 col-sm-6 service-item">
                
                
                <!--Box1-->
                    <div class="box-3">
                    
                    <h4>Important Notice</h4>
                    <span class="notice-board">
                    <div class="holder">
                    <ul id="ticker01">
                        <marquee direction="up" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                     <?php  
                $notice=mysqli_query($con,"select * from `notice` order by id desc");
               while($row=mysqli_fetch_array($notice))
                    {                     
                      $c++; 
                      ?>
                    <li><a href='<?php echo $row[file]; ?>'><?php echo $row[title]; ?></a><br><span><?php echo $row[date]; ?></span></li>
                    <?php   }
                  ?>
                  </marquee>
                    <!-- <li><a href="#">End up doing is adding some code</a><br><span>30/7/2018</span></li>
                    <li><a href="#">The code that you want to run</a><br><span>21/7/2018</span></li> -->
                    
                    
                    </ul>
                    </div>
                    </span>
                    
                    </div>
                <!--Box1-->
                
                
                
                <!--Box2-->
                  <div class="box-6 marging-top">
                    
                    <h4>Latest Gallery</h4>
                    <img src="img/gallery/LI.jpg" alt="gallery" class="img-responsive">
                <!--Box2-->
                </div>
                <!--AsidePart-->
                
                
                
                <!--Box3-->
                  <div class="box-1 marging-top">
                    
                    <h4>Visitor Counter</h4>
                    <div class="aside-white"><!-- Start of CuterCounter Code -->
<img src="http://www.cutercounter.com/hit.php?id=19602&nd=6&style=12" border="0" alt="visitor counter">
<!-- End of CuterCounter Code --></div>
                    
                    </div>
                <!--Box3-->
                
                
                
                
                <!--Box4-->
                  <div class="box-5 marging-top">
                    
                    <h4>Affiliation</h4>
                    <div class="aside-white">
                    <img src="img/icselogo.png" alt="Icse Logo" class="img-responsive">
                    </div>
                    </div>
                <!--Box4-->
                
                
                
                </div>
                <!--AsidePart-->