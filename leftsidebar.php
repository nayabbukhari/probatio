<?php
ob_start();
if(isset($_REQUEST[session_name()])) {
    // There is a session already available
  }else{
    //session_name('crc');
    //session_start();   
    //include("connection.php");
 }
ob_flush();

//include("connection.php");
$user=$_SESSION['user'];
$users=get_record_sql("select * from pia_login where email='$user'");
$permissions=$users[0]->permissions;
$permission = explode(',',$permissions);
//var_dump($permission);

//if(in_array("Apple", $permission)){

echo   '<aside class="fixed skin-6">';
echo   '<div class="sidebar-inner scrollable-sidebar">
        <div class="size-toggle">'; 

      //logout code
echo    '<br /><a class="btn btn-sm" id="sizeToggle"> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span></a> 
        <a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm"> 
        <i class="fa fa-power-off"></i> </a>';
         
echo    '</div>
        <div class="user-block clearfix"> <img src="';

echo    $users[0]->path;
echo    '"alt="User Avatar">
        <div class="detail"> <strong>';
echo    $users[0]->username;
echo    '</strong>
        <ul class="list-inline">
        <li><a href="profile.php">Profile</a></li>
        </ul></div>
        </div>
        <!-- /user-block -->
        <div class="main-menu">
        <ul>';

			//******************************************************Dashborad menu********************************************************************
if(in_array("Dashboard", $permission)){
echo       '<li class=""> <a href="dashboard.php"> <span class="menu-icon"> <img style="width: 36px;" src="img/Dashboard.png"  /> </span> <span class="text"> Dashboard </span> <span class="menu-hover"></span> </a> </li>';
}
			//******************************************************Dashborad menu********************************************************************
			
			//******************************************************Prospects menu********************************************************************
			
if(in_array("Prospects", $permission)){
echo    ' <li class=""> <a href="prospects.php"> <span class="menu-icon"> <img style="width: 36px;" src="img/Prospects 3.png"  /> </span> <span class="text"> Prospects </span> <span class="menu-hover"></span> </a> </li>';
}
			//******************************************************Prospects menu********************************************************************
			//****************************************************** User Management menu********************************************************************
if (in_array("User Management", $permission)){
echo        '<li class=""> <a href="user_management.php"> <span class="menu-icon"> <i class="fa fa-tasks fa-lg"></i> </span> <span class="text"> Work Plan</span> <span class="menu-hover"></span> </a></li>';
}
            //****************************************************** Work Plan menu********************************************************************			
		
		if (in_array("Work Plan", $permission)){
echo        '<li> <a href="workplan.php"> <span class="menu-icon"> <img style="width: 33px; " src="img/New Icons/Work Plan.png"  /> </span> <span class="text"> Work Plan</span> <span class="menu-hover"></span> </a></li>';
}
			//****************************************************** Deals menu********************************************************************
			//****************************************************** History menu********************************************************************
if (in_array("History", $permission)){
echo        '<li > <a href="history.php"> <span class="menu-icon"> <img style=" width: 36px;" src="img/History.png"  />  </span> <span class="text">History</span> <span class="menu-hover"></span> </a></li>';
}
			//****************************************************** History menu********************************************************************
			//****************************************************** Activities menu********************************************************************
if (in_array("Activities", $permission)){
echo        '<li> <a href="activities.php"> <span class="menu-icon"> <img style="width: 33px; " src="img/New Icons/Work Plan.png"  /> </span> <span class="text"> Activities</span> <span class="menu-hover"></span> </a></li>';
}
//****************************************************** Activities menu********************************************************************
//****************************************************** Commissions menu********************************************************************
if (in_array("Commissions", $permission)){
echo        '<li> <a href="#"> <span class="menu-icon"> <img style=" width: 36px;" src="img/Commissions.png"  /> </span> <span class="text"> Commissions </span> <span class="menu-hover"></span> </a> </li>';
}
//****************************************************** Commissions menu********************************************************************
//****************************************************** Document Managemen menu********************************************************************
if (in_array("Document Management", $permission)){
echo        '<li> <a href="files.php"> <span class="menu-icon"><img style=" width: 36px;" src="img/Last icon.png"  />  </span> <span class="text">Files </span> <span class="menu-hover"></span> </a> </li>';
}
//****************************************************** Document Managemen********************************************************************
//****************************************************** People menu********************************************************************
if (in_array("People", $permission)){
echo        '<li> <a href="people.php"> <span class="menu-icon">  <img style=" width: 36px;" src="img/People.png"  />  </span> <span class="text"> People </span> <span class="menu-hover"></span> </a></li>';
}

//****************************************************** People menu********************************************************************
//****************************************************** Scholaris menu********************************************************************
if (in_array("Scholaris", $permission)){
echo    '<li> <a href="user_management.php"> <span class="menu-icon">  <img style="width: 36px;" src="img/Scholaris.png"  /></span> <span class="text"> Scholaris </span><span class="menu-hover"></span> </a> </li>';
}
//****************************************************** Scholaris menu********************************************************************
echo    '<li class="openable"> <a href="#"> <span class="menu-icon">  <img style="width: 36px;" src="img/Corporate Policies.png"  /></span> <span class="text"> Corporate Policies </span> <span class="menu-hover"></span> </a>';
		  //****************************************************** Email Notifications menu********************************************************************
if (in_array("Email Notifications", $permission)){
echo        '<ul class="submenu">
            <li> <a href="email_notifications.php"> <span class="submenu-label"> <i class="fa fa-envelope fa-lg"></i>  Email Notifications</span>  <span class="menu-hover"></span> </a> </li></ul>';
}
//****************************************************** Email Notifications menu********************************************************************
echo        '</div>
            <!-- /main-menu --> 
            </div>
            <!-- /sidebar-inner --> 
            </aside>';
?>