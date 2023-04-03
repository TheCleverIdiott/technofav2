<?php 
ob_start();
 session_start();
  if(isset($_SESSION['login_user']))
  {  ?>
<aside class="main-sidebar hidden-print">
<section class="sidebar">
  
  <!-- Sidebar Menu-->
  <ul class="sidebar-menu">
    <li <?php if($page =="dashboard"){?> class="active" <?php } ?>><a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
    <li <?php if($page =="snotice"){?> class="active" <?php } ?>><a href="snotice.php"><i class="fa fa-bell-o"></i><span>Sliding Notice</span></a></li>
    <li <?php if($page =="notice"){?> class="active" <?php } ?>><a href="notice.php"><i class="fa fa-bell-o"></i><span>Notice</span></a></li>
    <li <?php if($page =="folder"){?> class="active" <?php } ?>><a href="gallery2.php"><i class="fa fa-picture-o"></i><span>Folder Image</span></a></li>
    <li <?php if($page =="gallery"){?> class="active" <?php } ?>><a href="gallery.php"><i class="fa fa-picture-o"></i><span>Gallery Image</span></a></li>
    <li <?php if($page =="career3"){?> class="active" <?php } ?>><a href="teaching_staff.php"><i class="fa fa-bell-o"></i><span>Teaching Staff Entry</span></a></li> 
    <li <?php if($page =="career4"){?> class="active" <?php } ?>><a href="non_teaching_staff.php"><i class="fa fa-bell-o"></i><span>Non Teaching Staff Entry</span></a></li>    
    <li <?php if($page =="career"){?> class="active" <?php } ?>><a href="alumni.php"><i class="fa fa-bell-o"></i><span>Alumni Student Entry</span></a></li>
    <!-- <li <?php if($page =="career2"){?> class="active" <?php } ?>><a href="career2.php"><i class="fa fa-bell-o"></i><span>Enquire Details</span></a></li> -->
    
    
    
    
    
    
    <!--<li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Virtual Gallery</span><i class="fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="create_block.php"><i class="fa fa-circle-o"></i> Create Block</a></li>
        <li><a href="create_gallery.php"><i class="fa fa-circle-o"></i> Create Gallery</a></li>
        <li><a href="create_section.php"><i class="fa fa-circle-o"></i> Create Section</a></li>
        <li><a href="upload_photo.php"><i class="fa fa-circle-o"></i> Upload Photo</a></li>
      </ul>
    </li>-->
    
    
    
  </ul>
</section>
</aside>
<?php
 } else {
   header("location:index.php?msg=3");
} ?> 