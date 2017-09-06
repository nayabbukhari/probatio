<?php
session_start();
include("connection.php");
 $user=$_SESSION['user'];
 $query = mysqli_query($con,"select * from pia_login where email='".$user."'") ;
				while($row = mysqli_fetch_array($query) ) 
				
				{
				$permissions=$row['permissions'];
               $permission = explode(',',$permissions);

if (in_array("Apple", $permission))
{
echo "Match found";
}
else
{
  echo "Match not found";
}


				?> 	

<aside class="fixed skin-6">
    <div class="sidebar-inner scrollable-sidebar">
      <div class="size-toggle"> <a class="btn btn-sm" id="sizeToggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm"> <i class="fa fa-power-off"></i> </a> </div>
      <!-- /size-toggle 
      <div class="user-block clearfix"> <img src="<?php echo $row['path']; ?>" alt="User Avatar">
        <div class="detail"> <strong><?php echo $user; ?></strong>
          <ul class="list-inline">
            <li><a href="#">Profile</a></li>
          </ul>
        </div>
      </div>-->
      <!-- /user-block -->
      <div class="main-menu">
        <ul>
       <?php
			//******************************************************Dashborad menu********************************************************************
            if (in_array("Dashboard", $permission))
            {
            //echo "Match found";
            ?>
            <li > <a href="dashboard.php"> <span class="menu-icon"> <img style="margin-left: -10px; margin-right: -10px; width: 36px;" src="img/Dashboard.png"  /></span> <span class="text"> Dashboard </span> <span class="menu-hover"></span> </a> </li>
            <?php
            }
            else
            {
            // echo "Match not found";
            }
			//******************************************************Dashborad menu********************************************************************
		   if (in_array("Users Management", $permission))
{
//echo "Match found";
?>
 <li class="openable"> <a href="#"> <span class="menu-icon"> <i class="fa fa-group fa-lg"></i> </span> <span class="text">Users Management</span> <span class="menu-hover"></span> </a>
            <ul class="submenu">
                         <li><a href="user_list.php"><span class="submenu-label">Users Management</span></a></li>
                         <li><a href="permissions.php"><span class="submenu-label">Permissions & Roles</span></a></li>
             <li><a href="login_history.php"><span class="submenu-label">Login history</span></a></li>
            </ul>
          </li>
<?php
}
else
{
  //echo "Match not found";
}

?>
     <li class="active" > <a href="profile.php"> <span class="menu-icon"> <i class="fa fa-edit fa-lg"></i> </span> <span class="text">Profile</span> <span class="menu-hover"></span> </a></li>    
          
              </ul>
      </div>
      <!-- /main-menu --> 
    </div>
    <!-- /sidebar-inner --> 
  </aside>
  <?php
  }
  ?>
